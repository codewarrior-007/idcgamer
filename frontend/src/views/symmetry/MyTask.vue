<template>
  <v-container fluid class="mytask-container" justify="center">
    <v-icon large color> mdi-check-circle-outline </v-icon>
    <h2>No pending tasks</h2>
  </v-container>
</template>

<script>
export default {
  name: "SymmetryMyTask",
  components: {},
  data() {
    return {};
  },
  computed: {},
  watch: {},
  methods: {},
};
</script>

<style lang="sass" scope>
.mytask-container
  display: flex
  flex-direction: column
  align-items: center
  justify-content: center

  .v-icon
    width: 120px
    height: 120px
    font-size: 120px !important
    margin-top: 100px
    margin-bottom: 50px
    margin-right: 10px
    color: lightgray

  h2
    font-size: 28px
    color: lightgray
    font-weight: 400
</style>
