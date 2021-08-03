<template>
  <v-navigation-drawer
    v-model="$store.state.layout.drawer"
    :permanent="mode !== 'temporary'"
    :absolute="mode === 'temporary'"
    :temporary="mode === 'temporary'"
    width="300"
    class="menu-side"
  >
    <v-icon
      v-if="mode === 'temporary'"
      large
      @click="toggleSidebar()"
      class="sidebar-close"
      >mdi-close</v-icon
    >

    <v-list-item>
      <v-list-item-content class="sidebar-logo">
        <v-img :src="images.logo" @click="goTo('/')"></v-img>
      </v-list-item-content>
    </v-list-item>

    <v-list dense nav>
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
  </v-navigation-drawer>
</template>

<script>
export default {
  name: "SymmetryMenuSide",
  props: {
    items: Array,
    mode: String,
  },
  components: {},
  data() {
    return {
      drawer: true,
      model: 1,
      images: {
        logo: require("@/assets/sfg-logo.png"),
      },
    };
  },
  methods: {
    goTo(link) {
      this.$router.push(link);
    },
    toggleSidebar() {
      this.$store.commit("setDrawer", !this.$store.state.layout.drawer);
    },
  },
};
</script>

<style lang="sass" scoped>

.menu-side
  .sidebar-logo
    padding: 16px
    margin-top: 30px
    margin-bottom: 30px
    cursor: pointer

    &:hover
      opacity: 0.7

    &.v-image__image
      background-size: contain

  .sidebar-close
    position: absolute
    top: 10px
    right: 10px
    z-index: 20

  .menu-content
    padding-left: 30px !important
    border-bottom: 1px solid #E9EEE3
    margin-bottom: 0px !important

    .v-list-item__title
      font-size: 15px !important
      line-height: 1

    .v-list-item__icon
      margin-right: 15px !important
</style>
