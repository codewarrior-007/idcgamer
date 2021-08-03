<template>
  <v-container fluid width="100%" class="menu-stack">
    <v-list-item>
      <v-list-item-content
        class="sidebar-logo"
        :style="{
          paddingLeft: !$vuetify.breakpoint.xsOnly ? '20px' : '0px',
          maxWidth: !$vuetify.breakpoint.xsOnly ? '300px' : '200px',
        }"
      >
        <v-img :src="images.logo" @click="goTo('/')"></v-img>
      </v-list-item-content>
      <v-icon large @click="toggleSidebar()" class="sidebar-close">{{
        showMenu ? "mdi-close" : "mdi-menu"
      }}</v-icon>
    </v-list-item>

    <v-list dense nav class="items" v-if="showMenu">
      <v-list-item-group v-model="model" mandatory color="indigo">
        <v-list-item
          v-for="item in items"
          :key="item.text"
          link
          @click="goTo(item.link)"
          aria-selected="true"
          class="menu-content"
        >
          <v-list-item-icon>
            <v-icon>{{ item.icon }}</v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title>{{ item.text }}</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list-item-group>
    </v-list>
  </v-container>
</template>

<script>
export default {
  name: "SymmetryMenuStack",
  props: {
    items: Array,
    mode: String,
  },
  components: {},
  data() {
    return {
      showMenu: false,
      model: 1,
      images: {
        logo: require("@/assets/sfg-logo.png"),
      },
    };
  },
  methods: {
    goTo(link) {
      this.showMenu = false;
      this.$router.push(link);
    },
    toggleSidebar() {
      this.showMenu = !this.showMenu;
    },
  },
};
</script>

<style lang="sass" scoped>
.menu-stack
  position: relative
  overflow: visible
  box-shadow: 0 0 20px 0 rgb(0 0 0 / 10%)

  .sidebar-close
    position: absolute
    top: 15px
    right: 10px
    z-index: 20

  .sidebar-logo
    cursor: pointer
    max-width: 300px

    &:hover
      opacity: 0.7

    &.v-image__image
      background-size: contain


  .menu-content
    padding-top: 5px !important
    padding-bottom: 5px !important
    padding-left: 30px !important
    border-bottom: 1px solid #E9EEE3
    margin-bottom: 0px !important

    .v-list-item__title
      font-size: 15px !important
      line-height: 1

    .v-list-item__icon
      margin-right: 15px !important

  .items
    position: absolute
    left: 0
    width: 100%
    top: 100%
    z-index: 100
</style>
