<template>
  <v-flex>
    <span class="description">
      Step {{ value }} Of {{ total }} - {{ description }}
    </span>
    <div class="progressbar-canvas">
      <div class="bar">
        <v-img
          :src="images.back"
          :style="{ width: `${(value / total) * 100}%` }"
        >
          {{ ((value / total) * 100).toFixed(2) }} %
        </v-img>
      </div>
    </div>
  </v-flex>
</template>

<script>
export default {
  name: "SProgressBar",
  props: {
    value: Number,
    total: Number,
    description: String,
  },
  data() {
    return {
      images: {
        back: require("@/assets/progress-back.png"),
      },
    };
  },
};
</script>

<style lang="sass" scope>

.description
  color: darkgray
  padding-left: 5px

.progressbar-canvas
  margin-top: 5px
  height: 45px
  background-color: #dfdfdf
  color: #2f2f2f
  padding: 8px
  border-radius: 23px

  & .bar
    border-radius: 20px
    width: 100%
    height: 100%
    color: white
    font-size: 12px
    background: darkgray
    overflow: hidden

    & .v-image
      display: flex
      align-items: center
      justify-content: center
      text-align: center
      height: 100%
      color: white
      font-size: 12px
      object-fit: contain
</style>
