<template>
  <div>
    <div
      class="header"
      v-if="!!username"
      :style="{ textAlign: $vuetify.breakpoint.smAndDown ? 'center' : 'right' }"
    >
      <v-icon
        v-if="mode === 'temporary'"
        @click="toggleSidebar()"
        class="nav-icon"
        >mdi-menu</v-icon
      >
      Hello, {{ username }}!
    </div>
    <symmetry-menu-stack
      v-if="mode === 'stack'"
      :items="items"
    ></symmetry-menu-stack>
    <div class="title">
      <slot />
    </div>
  </div>
</template>

<script>
import SymmetryMenuStack from "./MenuStack";

export default {
  name: "SymmetryHeader",
  props: {
    username: String,
    mode: String,
    items: Array,
  },
  components: {
    SymmetryMenuStack,
  },
  data() {
    return {};
  },
  methods: {
    toggleSidebar() {
      this.$store.commit("setDrawer", !this.$store.state.layout.drawer);
    },
  },
};
</script>

<style lang="sass" scoped>
.header
  padding-top: 20px
  padding-bottom: 20px
  padding-right: 20px
  position: relative

  .nav-icon
    position: absolute
    top: 0
    left: 0
    width: 50px
    height: 50px
    font-size: 20px
    padding-left: 10px
    padding-top: 10px

.title
  background-color: #4cbaf7
  display: flex
  flex-direction: column
  align-items: center
  justify-content: center
  padding: 30px

  & h1
    color: white
    font-size: 35px
    line-height: 65px

  & hr
    min-width: 50px
    height: 2px
    border: 1px solid #66c7f7

  & h3
    color: #3a5a6d
    font-size: 22px
    line-height: 45px
    font-weight: 450
</style>
