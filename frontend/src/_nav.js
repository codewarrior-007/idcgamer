export const navAdmin = (i18n, admin) => [
  {
    icon: "mdi-view-dashboard",
    text: i18n.t("menu.dashboard"),
    link: "/",
  },
  { divider: true },
  admin.getResourceLink("users"),
  admin.getResourceLink("books"),
];

export const navSymmetry = (i18n) => [
  {
    icon: "mdi-calendar-check",
    text: i18n.t("menu.my_task"),
    link: "my_task",
  },
  {
    icon: "mdi-square-edit-outline",
    text: i18n.t("menu.onboarding_application"),
    link: "onboard",
  },
  {
    icon: "mdi-timer-sand",
    text: i18n.t("menu.application_status"),
    link: "onboard",
  },
  {
    icon: "mdi-logout",
    text: i18n.t("menu.log_out"),
    link: "/",
  },
];
