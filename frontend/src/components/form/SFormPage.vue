<template>
  <v-container class="s-form-page-container">
    <h2>{{ data.label }}</h2>
    <p v-if="!!data.subline">{{ data.subline }}</p>
    <hr />
    <v-container
      v-for="(section, index) in data.sections"
      :key="`${index}-${getKeyConstraint(section)}`"
      :style="{ display: `${canShowSection(section) ? 'flex' : 'none'}` }"
      class="s-form-section-container"
    >
      <s-form-section
        v-for="repeatIndex in getRepeatRange(section)"
        :key="repeatIndex"
        :data="section"
        :options="options"
        :index="repeatIndex"
        class="s-form-section"
        @input="onFieldValueChange"
      />
    </v-container>
  </v-container>
</template>

<script>
import SFormSection from "./SFormSection";
import {
  FORM_FIELD_TYPES,
  FORM_FIELD_AUTOSAVE_DURATION,
  FORM_FIELD_CONDITION_ACTION_TYPES,
} from "@/utils/const";
import {
  compare,
  isValueIdentical,
  extractObjectToArray,
} from "@/utils/helper";
import { setWithExpiry, getWithExpiry } from "@/utils/storage";
import { FORM_OPTION_TTL } from "@/utils/const";

export default {
  name: "SFormPage",
  components: {
    SFormSection,
  },
  props: {
    data: Object,
  },
  data() {
    return {
      values: {}, // current form values
      dumpValues: {}, // saved form values

      options: {}, // option array for selectbox within the page

      timerIdAutoSaver: null,
      timerIdAutoSaverPrev: null,
    };
  },
  computed: {},
  watch: {
    data(newData) {
      if (!newData || !newData.sections) {
        this.values = {};
        return;
      }

      const hashOptionArray = [];

      newData.sections.map((section) => {
        if (!section.fields || !Array.isArray(section.fields)) return;

        this.values = section.fields.reduce((obj, field) => {
          if (field.type === FORM_FIELD_TYPES.TYPE_SELECT) {
            if (!hashOptionArray.includes(field.hash))
              hashOptionArray.push(field.hash);
          }

          if (field.value)
            return {
              ...obj,
              [field.hash]: extractObjectToArray(field.value),
            };

          return obj;
        }, this.values);
      });

      this.dumpValues = JSON.parse(JSON.stringify(this.values));

      this.loadOptions(hashOptionArray);

      this.timerIdAutoSaver = setTimeout(
        this.saveValues,
        FORM_FIELD_AUTOSAVE_DURATION
      );
    },
  },
  beforeDestroy() {
    if (this.timerIdAutoSaver) clearTimeout(this.timerIdAutoSaver);
    if (this.timerIdAutoSaverPrev) clearTimeout(this.timerIdAutoSaverPrev);
  },
  methods: {
    loadOptions(hashOptionArray) {
      const key = JSON.stringify(hashOptionArray);
      const savedData = getWithExpiry(key);

      if (savedData) {
        this.options = savedData;
      } else {
        this.$admin.http
          .post("/api/field/options", {
            hash: hashOptionArray,
          })
          .then((res) => {
            if (res && res.data) {
              this.options = res.data;
              setWithExpiry(key, res.data, FORM_OPTION_TTL);
            }
          })
          .catch((err) => {
            this.options = {};
            setWithExpiry(key, {}, FORM_OPTION_TTL);
            console.error(err);
          });
      }
    },
    getRepeatRange(section) {
      if (!section) return [];

      const conditionsToRepeat =
        section.conditions &&
        section.conditions.filter(
          (c) =>
            c.action === FORM_FIELD_CONDITION_ACTION_TYPES.ACTION_REPEAT_DATE
        );
      if (conditionsToRepeat && conditionsToRepeat[0]) {
        // only consider first repeat condition
        let counter = 0;
        let ret = [0];

        const { field, type, value } = conditionsToRepeat[0];
        const targetValueArray = Array.isArray(this.values[field])
          ? this.values[field]
          : [this.values[field]];

        while (targetValueArray.length > counter) {
          if (compare(targetValueArray[counter], type, value))
            ret.push(++counter);
          else break;
        }

        return ret;
      }

      // no conditon => default single section
      return [0];
    },
    canShowSection(section) {
      if (!section) return false;

      if (section.conditions) {
        for (let i = 0; i < section.conditions.length; i++) {
          const { action, field, type, value } = section.conditions[i];
          const res = compare(
            Array.isArray(this.values[field])
              ? this.values[field][0]
              : this.values[field],
            type,
            value
          );

          if (action === FORM_FIELD_CONDITION_ACTION_TYPES.ACTION_SHOW && !res)
            return false;
          if (action === FORM_FIELD_CONDITION_ACTION_TYPES.ACTION_HIDE && res)
            return false;
        }

        return true;
      }
    },
    getKeyConstraint(section) {
      let key = "x";

      if (section.conditions) {
        for (let i = 0; i < section.conditions.length; i++) {
          key = key + section.conditions[i].field;
        }
      }

      return key;
    },
    onFieldValueChange(payload) {
      if (!payload || !payload.hash) return;

      const hashVal = this.values[payload.hash];
      const previousValue = Array.isArray(hashVal)
        ? hashVal[payload.index]
        : hashVal;

      if (previousValue === payload.value) return;

      if (payload.index) {
        if (Array.isArray(hashVal)) hashVal[payload.index] = payload.value;
        else {
          this.values[payload.hash] = [hashVal];
          this.values[payload.hash][payload.index] = payload.value;
        }
      } else {
        if (Array.isArray(hashVal)) hashVal[payload.index] = payload.value;
        else this.values[payload.hash] = payload.value;
      }

      this.$forceUpdate();
    },
    saveValues() {
      let fieldsToSave = [];
      Object.keys(this.values).map((hash) => {
        if (
          !this.dumpValues[hash] ||
          !isValueIdentical(this.dumpValues[hash], this.values[hash])
        ) {
          fieldsToSave.push({ hash, value: this.values[hash] });
        }
      });

      const resumeSaving = () => {
        if (this.timerIdAutoSaverPrev) clearTimeout(this.timerIdAutoSaverPrev);
        this.timerIdAutoSaverPrev = this.timerIdAutoSaver;
        this.timerIdAutoSaver = setTimeout(
          this.saveValues,
          FORM_FIELD_AUTOSAVE_DURATION
        );
      };

      let saveCounter = 0;
      if (!fieldsToSave.length) {
        resumeSaving();
        return;
      }

      fieldsToSave.map((f) => {
        this.$admin.http
          .post("/api/field/save", f)
          .then(() => {
            if (Array.isArray(f.value))
              this.dumpValues[f.hash] = extractObjectToArray(
                Object.assign({}, f.value)
              );
            else this.dumpValues[f.hash] = f.value;
          })
          .catch((err) => console.error(err))
          .finally(() => {
            saveCounter = saveCounter + 1;

            if (saveCounter === fieldsToSave.length) {
              resumeSaving();
            }
          });
      });
    },
  },
};
</script>

<style lang="sass" scope>
.s-form-page-container
  .s-form-section-container
    display: flex
    flex-direction: column
    padding-top: 30px
</style>
