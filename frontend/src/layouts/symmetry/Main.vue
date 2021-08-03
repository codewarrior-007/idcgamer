<template>
  <div>
    <symmetry-header
      :username="username"
      :mode="showMode"
      :items="sidebarMenu"
    >
      <h1>
        {{ title }}
      </h1>
      <hr />
      <h3>
        {{ subtitle }}
      </h3>
    </symmetry-header>
    <transition name="fade" mode="out-in">
      <router-view></router-view>
    </transition>
    <symmetry-footer></symmetry-footer>
  </div>
</template>

<script>
import SymmetryHeader from "./Header";
import SymmetryFooter from "./Footer";
import { navSymmetry as nav } from "../../_nav";
import { PAGE_TITLES } from "@/utils/const";

export default {
  name: "SymmetryMain",
  components: {
    SymmetryHeader,
    SymmetryFooter,
  },
  computed: {
    getCurrentRoute() {
      return this.$route.name;
    },
    sidebarMenu() {
      return this.getCurrentRoute === "register" ? [] : nav(this.$i18n);
    },
    username() {
      return this.getCurrentRoute === "register" ? "" : "Mike";
    },
    title() {
      const route = this.getCurrentRoute;

      if (PAGE_TITLES[route]) return PAGE_TITLES[route].title;

      return "Default Title";
    },
    subtitle() {
      const route = this.getCurrentRoute;

      if (PAGE_TITLES[route]) return PAGE_TITLES[route].subtitle;

      return "Default SubTitle";
    },
    showMode() {
      switch (this.$vuetify.breakpoint.name) {
        case "xs":
        case "sm":
          return "stack";
        case "md":
          return "temporary";
      }
      return "permanent";
    },
  },
  data() {
    return {};
  },
};
</script>

<style lang="sass" scoped>
.s-container
  width: 100%
  margin: 0px

.sidebar
  flex-grow: 0
  padding: 0px
  padding-right: 0px

.main
  padding: 0px
  padding-bottom: 50px
</style>
