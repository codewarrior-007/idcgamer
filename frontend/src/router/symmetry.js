import Vue from "vue";
import SymmetryLayout from "@/layouts/symmetry/Main";
import i18n from "@/i18n";
import Error from "@/views/errors/Error404";
import Register from "@/views/symmetry/Register";
import Portal from "@/views/symmetry/Portal";
import OnBoard from "@/views/symmetry/OnBoard";
import MyTask from "@/views/symmetry/MyTask";

/**
 * Error component
 */
Vue.component("Error", Error);

export default {
  path: "/",
  component: SymmetryLayout,
  children: [
    {
      path: "/",
      name: "register",
      component: Register,
      meta: {
        title: i18n.t("routes.register"),
      },
    },
    {
      path: "/portal",
      name: "portal",
      component: Portal,
      meta: {
        title: i18n.t("routes.onboarding_application"),
      },
    },
    {
      path: "/onboard",
      name: "onboard",
      component: OnBoard,
      meta: {
        title: i18n.t("routes.onboarding_application"),
      },
    },
    {
      path: "/my_task",
      name: "my_task",
      component: MyTask,
      meta: {
        title: i18n.t("routes.my_task"),
      },
    },
    {
      path: "*",
      component: Error,
      meta: {
        title: i18n.t("routes.not_found"),
      },
    },
  ],
};
