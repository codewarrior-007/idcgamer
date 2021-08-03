<template>
  <v-dialog
    ref="dialog"
    v-model="modal"
    :return-value.sync="date"
    persistent
    width="290px"
  >
    <template v-slot:activator="{ on, attrs }">
      <v-container class="s-date-picker-container">
        <span v-if="!noLabel" class="text-label">{{ label || "&nbsp;" }}</span>
        <v-text-field
          v-model="date"
          :messages="comment"
          hide-details="auto"
          :prepend-icon="noIcon ? '' : 'mdi-calendar'"
          readonly
          outlined
          v-bind="attrs"
          v-on="on"
        ></v-text-field>
      </v-container>
    </template>
    <v-date-picker v-model="date" scrollable>
      <v-spacer></v-spacer>
      <v-btn text color="primary" @click="modal = false"> Cancel </v-btn>
      <v-btn text color="primary" @click="$refs.dialog.save(date)"> OK </v-btn>
    </v-date-picker>
  </v-dialog>
</template>

<script>
export default {
  name: "SDatePicker",
  props: {
    noLabel: Boolean,
    noIcon: Boolean,
    label: String,
    comment: String,
    default: String,
  },
  data() {
    return {
      date: this.default || new Date().toISOString().substr(0, 10),
      menu: false,
      modal: false,
      menu2: false,
    };
  },
  watch: {
    date(val) {
      this.$emit("input", val);
    },
  },
};
</script>

<style lang="sass" scope>
.s-date-picker-container
  padding: 0

  & input
    margin-top: 10px

.text-label
  font-weight: 700
  color: black

.v-input
  margin-top: 5px !important
</style>
