import Vue from "vue";
import VueRouter from "vue-router";
import symmetry from "./symmetry";

// import AuthLayout from "@/layouts/Auth";
// import SampleForm from "@/views/SampleForm";
// import Login from "@/views/auth/Login";
// import i18n from "@/i18n";
// import admin from "./admin";

const originalPush = VueRouter.prototype.push;
VueRouter.prototype.push = function push(location) {
  return originalPush.call(this, location).catch((err) => err);
};

Vue.use(VueRouter);

const routes = [
  symmetry,
  /*admin,
  {
    path: "",
    redirect: "login",
    component: AuthLayout,
    children: [
      {
        path: "/login",
        name: "login",
        component: Login,
        meta: {
          title: i18n.t("routes.login"),
        },
      },
    ],
  },*/
];

export default new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes,
});
