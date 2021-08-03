<template>
  <v-flex fluid class="register-container">
    <p class="note">
      Please note: User accounts are deactivated if your application is
      submitted within 14 days.<br />
      Contact your Symmetry Agent for a new invitation if you would like to
      continue.
    </p>
    <v-row>
      <v-col>
        <s-text-input
          label="Name *"
          placeholder="Mike"
          comment="First"
        ></s-text-input>
      </v-col>
      <v-col>
        <s-text-input
          label=""
          placeholder="Mighty"
          comment="Last"
        ></s-text-input>
      </v-col>
    </v-row>
    <v-row>
      <v-col>
        <s-text-input
          label="Email *"
          placeholder="mike@littlerhino.io"
          comment="Enter Email"
        ></s-text-input>
      </v-col>
      <v-col>
        <s-text-input
          label=""
          placeholder="mike@littlerhino.io"
          comment="Confirm Email"
        ></s-text-input>
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="12" sm="6">
        <s-text-input
          label="Invitation Code *"
          name="invitation_code"
          placeholder="39898"
          comment="please enter the invitation code that was sent with your email"
          checked
        ></s-text-input>
      </v-col>
    </v-row>
    <v-row>
      <v-col>
        <s-text-input
          label="Create Password *"
          placeholder="mike@littlerhino.io"
          comment="Enter Password"
          password
        ></s-text-input>
      </v-col>
      <v-col>
        <s-text-input
          label=""
          placeholder="mike@littlerhino.io"
          comment="Confirm Password"
          password
        ></s-text-input>
      </v-col>
    </v-row>
    <v-row>
      <v-col>
        <v-btn depressed color="primary" @click="goTo('portal')">
          REGISTER
        </v-btn>
      </v-col>
    </v-row>
    <v-row>
      <v-col>
        <p class="policy">
          By registering, you agree to our <a>Terms and Conditions</a> and that
          you have read our <a>Privacy Policy</a>.
        </p>
      </v-col>
    </v-row>
  </v-flex>
</template>

<script>
import STextInput from "@/components/base/STextInput";

export default {
  name: "SymmetryRegister",
  components: {
    STextInput,
  },
  data() {
    return {};
  },
  computed: {},
  watch: {},
  methods: {
    goTo(link) {
      this.$router.push(link);
    },
  },
};
</script>

<style lang="sass" scope>
.register-container
  padding: 30px
  width: 100%
  display: flex
  flex-direction: column
  justify-content: center

  .col
    display: flex
    align-items: center
    justify-content: center

  .note
    margin: 50px
    font-size: 20px
    text-align: center
    color: #3f3f3f
    line-height: 40px
</style>
