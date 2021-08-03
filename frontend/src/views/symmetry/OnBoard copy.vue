<template>
  <v-container fluid class="onboard-container">
    <v-container v-if="step <= 1">
      <s-progress-bar
        :value="step + 1"
        :total="5"
        description="License Information"
      ></s-progress-bar>
    </v-container>
    <v-container v-if="step <= 1">
      <h3 v-if="step == 0">Personal Information</h3>
      <div v-else-if="step == 1">
        <h3>Insurance License Information</h3>
        <p>
          Please complete the following information about your current insurance
          licensing.
        </p>
      </div>
      <hr />
    </v-container>
    <v-container v-if="step == 2" class="container-mail">
      <h1>Your Progress Has Not Been Saved Yet!</h1>
      <p>
        Please follow the simple instructions below.<br /><br />
        1. Enter your email in the box below. (Type it correctly as you only
        have one chance.)<br /><br />
        2. A link will be sent to your email. You <b>MUST</b> be logged in and
        use this link to return to your saved application.<br /><br />
        3. When ready to complete your application, go to your email and click
        your provided link.
      </p>
      <s-text-input noLabel placeholder="email address"></s-text-input>
      <v-btn depressed color="primary" @click="next()">
        SEND THE LINK TO MY EMAIL ADDRESS
      </v-btn>
    </v-container>
    <v-container v-if="step == 3" class="container-mail">
      <p>
        Success! The link was sent to the following email address:
        mike@littlerhino.io
      </p>
    </v-container>
    <personal-information v-if="step == 0"></personal-information>
    <insurance-license v-if="step == 1"></insurance-license>
    <v-container v-if="step <= 1">
      <v-row>
        <v-col>
          <hr />
        </v-col>
      </v-row>
      <v-row>
        <v-col>
          <v-btn depressed color="primary" @click="previous()">
            PREVIOUS
          </v-btn>
          <v-btn depressed color="primary" @click="next()"> NEXT </v-btn>
          <v-btn depressed color="secondary" @click="goTo('portal')">
            Save and Continue Later
          </v-btn>
        </v-col>
      </v-row>
    </v-container>
  </v-container>
</template>

<script>
import SProgressBar from "@/components/base/SProgressBar";
import PersonalInformation from "./widgets/PersonalInformation";
import InsuranceLicense from "./widgets/InsuranceLicense";
import { SFG_ONBOARDING_FLOW_STEPS } from "@/utils/const";

export default {
  name: "SymmetryOnboard",
  components: {
    PersonalInformation,
    InsuranceLicense,
    SProgressBar,
  },
  data() {
    return {
      step: 0, // 0: personal info, 1: insurance license
      data: null, // step data retrieved from api
    };
  },
  computed: {
    getCurrentStep() {
      return SFG_ONBOARDING_FLOW_STEPS[this.step];
    },
  },
  watch: {
    step(val) {
      if (SFG_ONBOARDING_FLOW_STEPS[val]) {
        this.$admin.http
          .post("/api/viewform", {
            step: SFG_ONBOARDING_FLOW_STEPS[val].key,
          })
          .then((res) => {
            if (res && res.data) {
              this.data = res.data;
            }
          })
          .catch((err) => console.error(err));
      } else {
        this.data = null;
      }
    },
  },
  methods: {
    goTo(link) {
      this.$router.push(link);
    },
    next() {
      this.step = this.step < 3 ? this.step + 1 : this.step;
    },
    previous() {
      this.step = this.step > 0 ? this.step - 1 : this.step;
    },
  },
};
</script>

<style lang="sass" scope>
.onboard-container
  padding: 20px

  .note
    margin: 50px
    font-size: 20px
    text-align: center
    color: #3f3f3f
    line-height: 40px

  hr
    margin-top: 3px
    border: 1px solid #cfcfcf

  .v-btn
    margin-right: 10px
    margin-bottom: 10px

  .container-mail
    display: flex
    flex-direction: column
    align-items: center
    justify-content: center

    h1
      margin-top: 50px
      font-size: 30px

    p
      margin-top: 30px
      margin-bottom: 30px
      font-size: 15px
      line-height: 30px
      text-align: center
</style>
