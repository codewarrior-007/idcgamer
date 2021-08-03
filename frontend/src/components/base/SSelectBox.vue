<template>
  <v-flex>
    <span v-if="!noLabel" class="text-label">{{ label || "&nbsp;" }}</span>
    <v-select
      :items="items"
      :placeholder="placeholder"
      v-model="selected"
      :messages="comment"
      hide-details="auto"
      item-text="label"
      item-value="value"
      outlined
    ></v-select>
  </v-flex>
</template>

<script>
export default {
  name: "SSelectBox",
  props: {
    noLabel: Boolean,
    label: String,
    placeholder: String,
    comment: String,
    items: Array,
    default: String,
  },
  data() {
    return {
      selected: this.default || "",
    };
  },
  watch: {
    selected(val) {
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
