<template>
  <v-container>
    <v-row>
      <v-col cols="12" sm="6">
        <s-select-box
          label="Do you have a resident life insurance license? *"
          v-model="have_insurance_license"
          :items="['Yes', 'No']"
        ></s-select-box>
      </v-col>
    </v-row>

    <div v-if="have_insurance_license == 'No'">
      <v-row>
        <v-col cols="12" sm="6">
          <s-select-box
            label="Have you passed your exam? *"
            v-model="passed_exam"
            :items="['Yes', 'No']"
          ></s-select-box>
        </v-col>
      </v-row>
      <v-row v-if="passed_exam == 'No'">
        <v-col cols="12" sm="6">
          <s-select-box
            label="Are you enrolled in a pre-licensing course? *"
            comment="Upon completion of this application and signing the independent Contract Agreement, your Agency Owner will send you access to receive a discounted rate on a prelicensing course."
            :items="['Yes', 'No']"
          ></s-select-box>
        </v-col>
      </v-row>
      <v-row v-else-if="passed_exam == 'Yes'">
        <v-col>
          <s-drop-image
            label="Please upload proof of having successfully passed your state exam: *"
          ></s-drop-image>
        </v-col>
      </v-row>
    </div>
    <div v-else-if="have_insurance_license == 'Yes'">
      <v-row>
        <v-col cols="12" sm="6">
          <s-text-input
            label="Resident Insurance License Number: *"
          ></s-text-input>
        </v-col>
      </v-row>
      <v-row>
        <v-col cols="12" sm="6">
          <s-text-input label="NPN Number *"></s-text-input>
        </v-col>
      </v-row>
      <v-row>
        <v-col cols="12" sm="6">
          <s-select-box
            label="Resident Insurance License State: *"
            :items="['Yes', 'No']"
          ></s-select-box>
        </v-col>
      </v-row>
      <v-row>
        <v-col cols="12" sm="6">
          <s-date-picker
            noIcon
            label="Resident Insurance License Issued On: *"
          ></s-date-picker>
        </v-col>
      </v-row>
      <v-row>
        <v-col cols="12" sm="6">
          <s-select-box
            label="Doing Business As: "
            comment="If requesting to be contracted in a business entity, you will need to complete the Business Entity section, which will require EIN to continue."
            :items="['Enterpreneur', 'First-Round']"
          ></s-select-box>
        </v-col>
      </v-row>
    </div>
  </v-container>
</template>

<script>
import SSelectBox from "@/components/base/SSelectBox";
import STextInput from "@/components/base/STextInput";
import SDatePicker from "@/components/base/SDatePicker";
import SDropImage from "@/components/base/SDropImage";

export default {
  name: "SymmetryOnboardInsuranceLicense",
  components: {
    SSelectBox,
    STextInput,
    SDatePicker,
    SDropImage,
  },
  data() {
    return {
      have_insurance_license: "",
      passed_exam: "",
    };
  },
  computed: {},
  watch: {},
  methods: {},
};
</script>

<style lang="sass" scope></style>
