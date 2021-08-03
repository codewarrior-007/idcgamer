<template>
  <v-container>
    <v-row>
      <v-col cols="12" sm="4">
        <s-text-input
          label="Full Legal Name *"
          placeholder="Mike"
          comment="First"
        ></s-text-input>
      </v-col>
      <v-col cols="6" sm="4">
        <s-text-input label="" placeholder="" comment="Middle"></s-text-input>
      </v-col>
      <v-col cols="6" sm="4">
        <s-text-input
          label=""
          placeholder="Mighty"
          comment="Last"
        ></s-text-input>
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="12" sm="6">
        <s-text-input label="Social Security Number *"></s-text-input>
      </v-col>
    </v-row>
    <v-row>
      <v-col>
        <s-date-picker noIcon label="Date Of Birth: *"></s-date-picker>
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="12" sm="6">
        <s-select-box
          label="Gender: *"
          :items="['Mail', 'Female']"
        ></s-select-box>
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="12" sm="6">
        <s-text-input label="Maiden Name"></s-text-input>
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="12" sm="4">
        <s-text-input label="Cell Phone: *"></s-text-input>
      </v-col>
      <v-col cols="12" sm="4">
        <s-text-input label="Home Phone:"></s-text-input>
      </v-col>
      <v-col cols="12" sm="4">
        <s-text-input label="Fax:"></s-text-input>
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="12" sm="6">
        <s-text-input
          label="Email Address *"
          placeholder="mike@littlerhino.io"
          comment="Enter Email"
        ></s-text-input>
      </v-col>
    </v-row>
    <v-row>
      <v-col>
        <s-text-input
          label="Residential Address *"
          comment="Street Address"
        ></s-text-input>
      </v-col>
    </v-row>
    <v-row>
      <v-col>
        <s-text-input noLabel comment="Address Line 2"></s-text-input>
      </v-col>
    </v-row>
    <v-row>
      <v-col>
        <s-text-input noLabel comment="City"></s-text-input>
      </v-col>
      <v-col>
        <s-text-input
          noLabel
          comment="State / Province / Region"
        ></s-text-input>
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="12" sm="6">
        <s-text-input
          label="County of Residence: *"
          placeholder="Example: Buncombe County"
        ></s-text-input>
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="12" sm="6">
        <s-date-picker
          noIcon
          label="Move-In Date*"
          comment="On what date did you move into your current address?"
        ></s-date-picker>
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="12" sm="6">
        <s-select-box
          label="Is your mailing address the same as your residential address? *"
          :items="optionsResidence"
          placeholder="Please select"
        ></s-select-box>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import STextInput from "@/components/base/STextInput";
import SSelectBox from "@/components/base/SSelectBox";
import SDatePicker from "@/components/base/SDatePicker";

export default {
  name: "SymmetryOnboardPersonalInformation",
  components: {
    STextInput,
    SSelectBox,
    SDatePicker,
  },
  data() {
    return {};
  },
  computed: {
    optionsResidence() {
      return [
        {
          label: "YES",
          value: "Yes",
        },
        {
          label: "NO",
          value: "No",
        },
      ];
    },
  },
  watch: {},
  methods: {},
};
</script>

<style lang="sass" scope></style>
