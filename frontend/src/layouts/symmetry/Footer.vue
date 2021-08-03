<template>
  <v-footer>
    <v-container class="bar">
      <v-icon
        v-if="!$vuetify.breakpoint.xsOnly"
        large
        color="white darken-2"
        @click="toggleFooterMenu()"
      >
        {{ !showMenu ? "mdi-chevron-up" : "mdi-chevron-down" }}
      </v-icon>
      <span
        >COPYRIGHT @ 2021 SYMMETRY FINANCIAL GROUP. ALL RIGHTS RESERVED.</span
      >
      <v-icon
        v-if="$vuetify.breakpoint.xsOnly"
        large
        color="white darken-2"
        @click="scrollTop()"
      >
        mdi-chevron-up
      </v-icon>
    </v-container>
    <v-container
      v-if="showMenu || $vuetify.breakpoint.xsOnly"
      fluid
      class="inner"
      :style="{
        padding: !$vuetify.breakpoint.xsOnly ? '30px 100px' : '20px 30px',
      }"
    >
      <v-row>
        <v-col cols="12" md="4" key="important-links">
          <h4 class="section">Important Links</h4>
          <a
            v-bind:key="index"
            :href="link.url"
            class="link"
            v-for="(link, index) in links"
            >{{ link.title }}</a
          >
        </v-col>
        <v-col cols="12" md="4" key="follow-us">
          <h4 class="section">Follow Us</h4>
          <v-icon key="icon-twitter" class="icon-social" color="white darken-2">
            mdi-twitter
          </v-icon>
          <v-icon
            key="icon-facebook"
            class="icon-social"
            color="white darken-2"
          >
            mdi-facebook
          </v-icon>
          <v-icon
            key="icon-instagram"
            class="icon-social"
            color="white darken-2"
          >
            mdi-instagram
          </v-icon>
          <v-icon
            key="icon-linkedin"
            class="icon-social"
            color="white darken-2"
          >
            mdi-linkedin }}
          </v-icon>
        </v-col>
        <v-col cols="12" md="4" key="better-business-bureau">
          <h4 class="section">Better Business Bureau</h4>
          <v-img :src="images.logo" class="bbb-logo"> </v-img>
        </v-col>
      </v-row>
    </v-container>
  </v-footer>
</template>

<script>
export default {
  name: "SymmetryFooter",
  data() {
    return {
      showMenu: false,

      links: [
        { title: "Who We Are", url: "" },
        { title: "Our Privacy Policy", url: "" },
        { title: "Log Out", url: "" },
      ],
      images: {
        logo: require("@/assets/bbb-logo.png"),
      },
    };
  },
  watch: {
    showMenu(val) {
      if (val) {
        const timerId = setTimeout(() => {
          window.scrollTo({
            left: 0,
            top: document.body.scrollHeight,
            behavior: "smooth",
          });
          if (timerId) clearTimeout(timerId);
        }, 200);
      }
    },
  },
  methods: {
    toggleFooterMenu(force) {
      if (typeof force !== "undefined") this.showMenu = force;
      else this.showMenu = !this.showMenu;
    },
    scrollTop() {
      window.scrollTo({
        left: 0,
        top: 0,
        behavior: "smooth",
      });
    },
  },
};
</script>

<style lang="sass" scoped>
.v-footer
  position: absolute
  top: 100%
  left: 0
  padding: 0
  width: 100%
  z-index: 100
  color: #a9a9a9

  .bar
    margin: 0px
    display: flex
    flex-direction: row
    align-items: center

    .v-icon
      margin-right: 10px
      padding: 5px
      cursor: pointer

      &:hover
        background: grey
        opacity: 0.8
    span
      flex-grow: 1
      font-size: 12px
      line-height: 30px
      text-transform: uppercase
      letter-spacing: 1px

  .inner
    background: #323434
    margin: 0
    color: #fff

    .section
      font-size: 13px
      font-weight: 400
      line-height: 1
      letter-spacing: .5px
      text-transform: capitalize
      border-color: #4cbdf9
      border-width: 0 0 0 3px
      border-style: solid
      padding-left: 15px
      margin: 0 0 20px

    .link
      font-size: 15px
      text-decoration: none
      color: white
      line-height: 30px
      display: block
      text-transform: capitalize

      &:hover
        color: #4cbdf9

    .icon-social
      padding: 15px
      margin-right: 10px
      border: 1px solid #555
      border-radius: 2px

      &:hover
        background: transparent
        color: #46d4fe !important
        border: 1px solid #46d4fe !important

    .bbb-logo
      width: 158px
      height: 62px
      cursor: pointer
</style>
