<template>
  <v-col cols="12">
    <s-text-input
      v-if="data.type === formFieldTypes.TYPE_TEXT"
      :label="data.label"
      :noLabel="!data.label"
      :placeholder="data.placeholder"
      v-model="value"
      :extra="data.type"
      :default="defaultValue"
    />

    <s-text-input
      v-else-if="data.type === formFieldTypes.TYPE_EMAIL"
      :label="data.label"
      :noLabel="!data.label"
      :placeholder="data.placeholder"
      v-model="value"
      :extra="data.type"
      :default="defaultValue"
    />
    <s-text-input
      v-else-if="data.type === formFieldTypes.TYPE_SSN"
      :label="data.label"
      :noLabel="!data.label"
      :placeholder="data.placeholder"
      v-model="value"
      :extra="data.type"
      :default="defaultValue"
    />
    <s-text-input
      v-else-if="data.type === formFieldTypes.TYPE_PHONE"
      :label="data.label"
      :noLabel="!data.label"
      :placeholder="data.placeholder"
      v-model="value"
      :extra="data.type"
      :default="defaultValue"
    />

    <s-text-input
      v-else-if="data.type === formFieldTypes.TYPE_PASSWORD"
      password
      :label="data.label"
      :noLabel="!data.label"
      :placeholder="data.placeholder"
      v-model="value"
      :extra="data.type"
      :default="defaultValue"
    />

    <s-date-picker
      v-else-if="data.type === formFieldTypes.TYPE_DATE"
      :label="data.label"
      :noLabel="!data.label"
      :placeholder="data.placeholder"
      v-model="value"
      :default="defaultValue"
    />

    <s-select-box
      v-else-if="data.type === formFieldTypes.TYPE_SELECT"
      :label="data.label"
      :noLabel="!data.label"
      :placeholder="data.placeholder"
      :items="options"
      v-model="value"
      :default="defaultValue"
    />

    <s-text-area
      v-else-if="data.type === formFieldTypes.TYPE_TEXTAREA"
      :label="data.label"
      :noLabel="!data.label"
      :placeholder="data.placeholder"
      v-model="value"
      :default="defaultValue"
    />
    <s-text-area
      v-else-if="data.type === formFieldTypes.TYPE_HTML"
      :label="data.label"
      :noLabel="!data.label"
      :placeholder="data.placeholder"
      v-model="value"
      :default="defaultValue"
    />

    <s-drop-image
      :id="data.hash"
      v-else-if="data.type === formFieldTypes.TYPE_UPLOAD"
      :label="data.label"
      v-model="value"
    />

    <s-check-box
      v-else-if="data.type === formFieldTypes.TYPE_CHECKBOX"
      :label="data.label"
      v-model="value"
      :default="defaultValue"
    />

    <s-signature
      v-else-if="data.type === formFieldTypes.TYPE_SIGNATURE"
      :label="data.label"
      v-model="value"
      :default="defaultValue"
    />
  </v-col>
</template>
<script>
import STextInput from "@/components/base/STextInput";
import STextArea from "@/components/base/STextArea";
import SSelectBox from "@/components/base/SSelectBox";
import SDatePicker from "@/components/base/SDatePicker";
import SDropImage from "@/components/base/SDropImage";
import SSignature from "@/components/base/SSignature";
import SCheckBox from "@/components/base/SCheckBox";
import { FORM_FIELD_TYPES } from "@/utils/const";
import { extractObjectToArray } from "@/utils/helper";

export default {
  name: "SFormField",
  components: {
    STextInput,
    STextArea,
    SSelectBox,
    SDatePicker,
    SDropImage,
    SCheckBox,
    SSignature,
  },
  props: {
    data: Object,
    index: Number,
    options: Array,
  },
  data() {
    return {
      value: "",
    };
  },
  computed: {
    defaultValue() {
      const val = extractObjectToArray(this.data.value);
      if (!Array.isArray(val) && !this.index) return val;

      return val[this.index] || "";
    },
    formFieldTypes() {
      return FORM_FIELD_TYPES;
    },
  },
  watch: {
    value(val) {
      this.$emit("input", { hash: this.data.hash, value: val });
    },
  },
};
</script>

<style lang="sass" scope></style>
