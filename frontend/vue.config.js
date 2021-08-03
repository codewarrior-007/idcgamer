module.exports = {
  transpileDependencies: ["vuetify"],
  pluginOptions: {
    i18n: {
      locale: "en",
      fallbackLocale: "en",
      localeDir: "locales",
      enableInSFC: false,
    },
  },
  devServer: {
    proxy: {
      '/api/': {
          // target: process.env.DEV_SERVER_PROXY_NOPORT ? 'http://localhost' : 'http://localhost:8000' ,
          target: 'http://sfgonboarding.test',
          changeOrigin: true,
          logLevel: 'debug'
      }
    },

    disableHostCheck: true,
  },
};
