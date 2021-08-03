export const PAGE_TITLES = {
  register: {
    title: "New Agent Registeration",
    subtitle:
      "Please Confirm The Information Below And Click 'Register' To Activate Your Account",
  },
  portal: {
    title: "Symmetry Financial Group",
    subtitle: "Onboarding Portal",
  },
  onboard: {
    title: "Onboarding Application",
    subtitle: "Please Complete The Application Form Below",
  },
  my_task: {
    title: "My Tasks",
    subtitle: "View & Manage Your Assigned Tasks",
  },
};

export const SFG_ONBOARDING_FLOW_STEPS = [
  {
    label: "Personal Information",
    key: "personal-information",
    subline: "",
  },
  {
    label: "Insurance License Information",
    key: "license-information",
    subline:
      "Please complete the following information about your current insurance licensing.",
  },
  {
    label:
      "Legal Questions and Responses/Explanations for Contracting and Appointment Requests",
    key: "legal-information",
    subline:
      "Please answer the following questions. If you answer YES to any question, provide a full, detailed explanation including specific dates.",
  },
  {
    label: "Address History",
    key: "address-history",
    subline:
      "Please provide your address history for the past 7 years. Gaps of more than 1 month may require a written explanation.",
  },
  {
    label: "Anti-Money Laundering",
    key: "aml-certification",
    subline: "",
  },
  {
    label: "Financial Industry Regulatory Authority (FINRA)",
    key: "finra-licensing",
    subline: "",
  },
  {
    label: "Errors & Omissions (E&O) Insurance",
    key: "eo-insurance",
    subline: "",
  },
  {
    label: "SuranceBay Signature Agreement",
    key: "surance-bay-agreement",
    subline: "",
  },
];

export const FORM_SECTION_FILL_MODES = {
  FILLMODE_MANUAL: "manual",
  FILLMODE_GOOGLE_AUTOCOMPLETE: "google_autocomplete",
};

export const FORM_FIELD_TYPES = {
  TYPE_TEXT: "text",
  TYPE_EMAIL: "email",
  TYPE_PASSWORD: "password",
  TYPE_PHONE: "phone",
  TYPE_SSN: "ssn",

  TYPE_SELECT: "select",

  TYPE_DATE: "date",

  TYPE_HTML: "html",
  TYPE_TEXTAREA: "textarea",

  TYPE_UPLOAD: "upload",
  TYPE_CHECKBOX: "checkbox",

  TYPE_SIGNATURE: "signature",
};

export const FORM_FIELD_SIZES = {
  WIDTH_FULL: "full-width",
  WIDTH_HALF: "half-width",
  WIDTH_THIRD: "third-width",
  WIDTH_FOURTH: "third-fourth",
};

export const FORM_FIELD_CONDITION_ACTION_TYPES = {
  ACTION_SHOW: "show",
  ACTION_HIDE: "hide",
  ACTION_REPEAT_DATE: "repeat",
};

export const FORM_FIELD_CONDITION_OPERATORS = {
  TYPE_EQUALS: "=",
  TYPE_MORE_THAN: ">",
  TYPE_LESS_THAN: "<",
};

export const FORM_FIELD_CONDITION_DATES = {
  DATE_FIELD_7_YEARS_PRIOR: "-7 years",
  DATE_FIELD_1_YEAR_PRIOR: "-1 year",
};

export const FORM_FIELD_AUTOSAVE_DURATION = 2000;

export const FORM_OPTION_TTL = 60 * 60; // 60 mins

export const FILE_UPLOAD_FILEBIN = "https://httpbin.org/post";
export const FILE_UPLOAD_CHUNKSIZE = 1024 * 1024 * 1;
