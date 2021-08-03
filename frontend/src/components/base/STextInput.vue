<template>
  <v-flex>
    <span v-if="!noLabel" class="text-label">{{ label || "&nbsp;" }}</span>
    <v-text-field
      outlined
      :name="name"
      :placeholder="placeholder"
      :append-outer-icon="checked ? 'mdi-check' : ''"
      :type="!password ? 'text' : 'password'"
      :messages="comment"
      hide-details="auto"
      v-model="value"
      v-mask="mask"
    ></v-text-field>
  </v-flex>
</template>

<script>
import { FORM_FIELD_TYPES } from "@/utils/const";

export default {
  name: "STextInput",
  props: {
    noLabel: Boolean,
    label: String,
    name: String,
    placeholder: String,
    comment: String,
    checked: Boolean,
    password: Boolean,
    extra: String,
    default: String,
  },
  data() {
    return {
      value: "" || this.default,
    };
  },
  computed: {
    mask() {
      if (this.extra === FORM_FIELD_TYPES.TYPE_SSN) {
        return "###-##-####";
      }
      if (this.extra === FORM_FIELD_TYPES.TYPE_PHONE) {
        return "(###) ###-####";
      }
      return "";
    },
  },
  watch: {
    value(val) {
      this.$emit("input", val);
    },
  },
};
</script>

<style lang="sass" scope>
.text-label
  font-weight: 700
  color: black

.v-input
  margin-top: 5px !important
</style>
