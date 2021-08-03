import Vue from "vue";
import Vuetify from "vuetify/lib";
import en from "vuetify/es5/locale/en";
import fr from "vuetify/es5/locale/fr";
import de from "vuetify/es5/locale/de";

Vue.use(Vuetify);

export default new Vuetify({
  lang: {
    locales: { en, fr, de },
    current: process.env.VUE_APP_I18N_LOCALE || navigator.language.substr(0, 2),
  },
  theme: {
    options: {
      customProperties: true,
    },
    themes: {
      light: {
        // primary: "#46c3b2",
        primary: "#4cbaf7",
        secondary: "#6ecf93",
        accent: "#9C27b0",
        info: "#00CAE3",
      },
    },
  },
});
