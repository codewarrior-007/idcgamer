import Vue from "vue";
import { VueMaskDirective } from "v-mask";
import VueSignaturePad from "vue-signature-pad";
import CustomGoogleAutocomplete from "vue-custom-google-autocomplete";
import ScrollBar from '@morioh/v-perfect-scrollbar'
import App from "./App.vue";
import router from "./router";
import store from "./store";
import i18n from "./i18n";
import vuetify from "./plugins/vuetify";
import admin from "./plugins/admin";
import "./plugins/base";
import "./plugins/chartist";
import "./plugins/i18n";
import "./sass/overrides.sass";

Vue.use(VueSignaturePad);
Vue.use(CustomGoogleAutocomplete);
Vue.use(ScrollBar);

Vue.directive("mask", VueMaskDirective);
Vue.config.productionTip = false;

new Vue({
  router,
  store,
  i18n,
  vuetify,
  admin,
  render: (h) => h(App),
}).$mount("#app");
