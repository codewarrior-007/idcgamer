import Vue from "vue";
import VueI18n from "vue-i18n";
import { mergeDeep } from "@/utils/helper";

Vue.use(VueI18n);

function loadLocaleMessagesStatic() {
  const locales = require.context(
    "./locales",
    true,
    /[A-Za-z0-9-_,\s]+\.json$/i
  );
  const messages = {};
  locales.keys().forEach((key) => {
    if (key.includes("messages.json")) return;

    const matched = key.match(/([A-Za-z0-9-_]+)\./i);
    if (matched && matched.length > 1) {
      const locale = matched[1];
      messages[locale] = locales(key);
    }
  });
  return messages;
}

function loadLocaleMessagesLaravel() {
  const all = require("./locales/messages.json");

  const messages = {};

  Object.keys(all).map((mixKey) => {
    const locale = mixKey.split(".")[0];
    const key = mixKey.split(".")[1];

    if (!messages[locale]) messages[locale] = {};

    messages[locale][key] = all[mixKey];
  });

  return messages;
}

function loadLocaleMessages() {
  return mergeDeep({}, loadLocaleMessagesStatic(), loadLocaleMessagesLaravel());
}

export default new VueI18n({
  locale: process.env.VUE_APP_I18N_LOCALE || "en",
  fallbackLocale: process.env.VUE_APP_I18N_FALLBACK_LOCALE || "en",
  messages: loadLocaleMessages(),
});
