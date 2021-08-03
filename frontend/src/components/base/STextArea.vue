<template>
  <v-flex>
    <span v-if="!noLabel" class="text-label">{{ label || "&nbsp;" }}</span>
    <v-textarea
      outlined
      :name="name"
      :placeholder="placeholder"
      :append-outer-icon="checked ? 'mdi-check' : ''"
      :messages="comment"
      hide-details="auto"
      v-model="value"
      :v-mask="mask"
    ></v-textarea>
  </v-flex>
</template>

<script>
export default {
  name: "STextArea",
  props: {
    noLabel: Boolean,
    label: String,
    name: String,
    placeholder: String,
    comment: String,
    checked: Boolean,
    mask: String, // (###) ####-###
  },
  data() {
    return {
      value: "",
    };
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
