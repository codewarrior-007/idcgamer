<template>
  <v-row>
    <v-col cols="12" key="label" class="s-form-section-label">
      <h3>{{ data.label }}</h3>
      <p v-if="!!data.subline">{{ data.subline }}</p>
    </v-col>
    <custom-google-autocomplete
      v-if="toRenderGoogleAutocomplete"
      className="google-autocomplete"
      :options="optionsGoogleAutocomplete"
      @select="selected = $event"
    >
      <div
        slot-scope="{
          inputAttrs,
          inputEvents,
          loading,
          results,
          query,
          selectPrediction,
          hasResults,
        }"
      >
        <span v-if="loading">loading...</span>
        <span v-if="hasResults">We have results here: {{ query }}</span>
        <input type="search" v-bind="inputAttrs" v-on="inputEvents" />
        <div
          v-for="(prediction, index) in results"
          :key="'prediction-' + index"
          @click="selectPrediction(prediction)"
        >
          {{ prediction.description }}
        </div>
      </div>
    </custom-google-autocomplete>
    <v-col
      cols="12"
      :sm="getFieldSize(field.width)"
      v-for="field in data.fields"
      v-bind:key="field.hash"
    >
      <s-form-field
        :data="field"
        :options="options[field.hash] || []"
        :index="index"
        @input="onFieldValueChange"
      >
      </s-form-field>
    </v-col>
  </v-row>
</template>
<script>
import SFormField from "./SFormField";
import { FORM_SECTION_FILL_MODES, FORM_FIELD_SIZES } from "@/utils/const";

export default {
  name: "SFormSection",
  components: {
    SFormField,
  },
  props: {
    data: Object,
    options: Object,
    index: Number,
  },
  data() {
    return {
      optionsGoogleAutocomplete: {
        apiKey: process.env.VUE_APP_GOOGLE_PLACE_AUTOCOMPLETE_API_KEY,
        deepSearch: false,
        cors: true,
        params: {},
        focus: false,
      },
      selected: null,
    };
  },
  computed: {
    toRenderGoogleAutocomplete() {
      return (
        this.data.fill_mode ===
        FORM_SECTION_FILL_MODES.FILLMODE_GOOGLE_AUTOCOMPLETE
      );
    },
    formFieldSizes() {
      return FORM_FIELD_SIZES;
    },
  },
  methods: {
    getFieldSize(sizeValue) {
      if (sizeValue === FORM_FIELD_SIZES.WIDTH_HALF) return 6;
      if (sizeValue === FORM_FIELD_SIZES.WIDTH_THIRD) return 4;
      if (sizeValue === FORM_FIELD_SIZES.WIDTH_FOURTH) return 3;

      return 12;
    },
    onFieldValueChange(payload) {
      this.$emit("input", { ...payload, index: this.index });
    },
  },
};
</script>

<style lang="sass" scope>
.s-form-section-label
  padding-bottom: 0

.google-autocomplete
  border: 2px solid #fff
  padding: 5px
</style>
