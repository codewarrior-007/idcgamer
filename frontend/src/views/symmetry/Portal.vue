<template>
  <v-flex fluid class="portal-container" justify="center">
    <div class="welcome">
      <h1>Welcome To Symmetry, Mike!</h1>
      <v-btn depressed color="primary" @click="goTo('onboard')">
        BEGIN MY APPLICATION!
      </v-btn>
      <p>To Begin Onboarding, Make Sure You Have The Following Items:</p>
    </div>
    <v-row>
      <v-col class="info-block">
        <v-icon large color="green lighten-2"> mdi-check-circle </v-icon>
        <v-container fluid>
          <h1>State Insurance License Number <br />(If Licensed)</h1>
          <hr />
          <p>
            To complete your insurance lincense info, you'll need your State
            individual License Number. If you are contracting as a
            <b>Business</b>, you'll need the following:
          </p>
          <ul>
            <li key="1">Business Name</li>
            <li key="2">Employer Identification Number(EIN)</li>
            <li key="3">Business Insurance License#</li>
            <li key="4">A copy of the articles of Incorporation to upload</li>
          </ul>
        </v-container>
      </v-col>
      <v-col class="info-block">
        <v-icon large color="green lighten-2"> mdi-check-circle </v-icon>
        <v-container fluid>
          <h1>Want To Get Paid? We'll Need Your Preferred Banking Info</h1>
          <hr />
          <p>
            You'll need your banking account information to complete the
            Electronic Funds Transfer (EFT) section of this application.<br />
            <b
              >Insurance companies pay you via direct deposit to your account,
              so we need this information to ensure you're set up to receive
              your commission payments.</b
            >
          </p>
          <ul>
            <li key="1">Bank Account Number</li>
            <li key="2">Bank Routing Number</li>
            <li key="3">A voided check OR an EFT authorization letter</li>
          </ul>
        </v-container>
      </v-col>
    </v-row>
  </v-flex>
</template>

<script>
export default {
  name: "SymmetryPortal",
  components: {},
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
.portal-container
  padding: 30px
  width: 100%
  display: flex
  flex-direction: column

  .welcome
    padding: 10px
    background: lightgray
    display: flex
    flex-direction: column
    align-items: center
    justify-content: center

    h1
      line-height: 50px
      margin-bottom: 30px
      text-align: center

    p
      margin-top: 30px
      margin-bottom: 30px
      color: #3f3f3f

  .info-block
    display: flex
    flex-direction: row
    margin-top: 70px

    .v-icon
      width: 50px
      height: 50px
      font-size: 50px !important
      margin-top: 20px
      margin-right: 10px

    h1
      font-size: 38px
      line-height: 50px

    hr
      max-width: 40px
      height: 2px
      border: 1px solid #66c7f7
      margin-top: 10px
      margin-bottom: 10px

    p
      font-size: 18px
      line-height: 30px

    li
      font-size: 16px
      line-height: 25px
</style>
