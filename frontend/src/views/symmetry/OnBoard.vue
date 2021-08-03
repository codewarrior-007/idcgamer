<template>
  <v-container fluid class="onboard-container">
    <v-container>
      <s-progress-bar
        :value="step + 1"
        :total="totalSteps"
        :description="currentStepTitle"
      ></s-progress-bar>
    </v-container>
    <s-form-page v-bind:key="currentStepKey" v-if="!!data" :data="data" />
    <!-- <v-container v-if="step == 2" class="container-mail">
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
    </v-container> -->
    <v-container>
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
          <v-btn
            depressed
            color="success"
            v-if="step == totalSteps - 1"
            @click="helloSign()"
            :disabled="bGettingSignRequest"
            :loading="bGettingSignRequest"
          >
            Sign Agreement
          </v-btn>
        </v-col>
      </v-row>
    </v-container>
  </v-container>
</template>

<script>
import HelloSign from "hellosign-embedded";

import SProgressBar from "@/components/base/SProgressBar";
import SFormPage from "@/components/form/SFormPage";
import { SFG_ONBOARDING_FLOW_STEPS } from "@/utils/const";

export default {
  name: "SymmetryOnboard",
  components: {
    SProgressBar,
    SFormPage,
  },
  data() {
    return {
      step: null, // 0: personal info, 1: insurance license
      data: {}, // step data retrieved from api

      bGettingSignRequest: false,
    };
  },
  computed: {
    totalSteps() {
      return SFG_ONBOARDING_FLOW_STEPS.length;
    },
    currentStepTitle() {
      return (
        SFG_ONBOARDING_FLOW_STEPS[this.step] &&
        SFG_ONBOARDING_FLOW_STEPS[this.step].label
      );
    },
    currentStepKey() {
      return (
        SFG_ONBOARDING_FLOW_STEPS[this.step] &&
        SFG_ONBOARDING_FLOW_STEPS[this.step].key
      );
    },
  },
  created() {
    this.step = 0;
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
      this.step =
        this.step < SFG_ONBOARDING_FLOW_STEPS.length - 1
          ? this.step + 1
          : this.step;
    },
    previous() {
      this.step = this.step > 0 ? this.step - 1 : this.step;
    },
    helloSign() {
      this.bGettingSignRequest = true;
      this.$admin.http
        .get("/api/sign/view")
        .then((res) => {
          if (res && res.data) {
            const { signUrl, clientId } = res.data;

            if (signUrl && clientId) {
              const client = new HelloSign();

              client.open(signUrl, {
                clientId,
                skipDomainVerification: true,
                locale: HelloSign.locales.EN_US,
                redirectTo: "/portal",
                // container: document.getElementById('hellosign-area')
              });

              client.on("finish", () => {
                console.log("Signing process is finished!");
              });

              client.on("message", ({ type, payload }) => {
                console.log("Message recevied: ", type, payload);
              });
            }
          }
        })
        .catch((err) => console.error(err))
        .finally(() => {
          this.bGettingSignRequest = false;
        });
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
