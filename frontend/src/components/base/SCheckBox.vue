<template>
  <v-flex>
    <v-checkbox
      outlined
      :name="name"
      :label="label"
      :messages="comment"
      hide-details="auto"
      v-model="value"
    ></v-checkbox>
  </v-flex>
</template>

<script>
export default {
  name: "SCheckBox",
  props: {
    label: String,
    name: String,
    comment: String,
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
