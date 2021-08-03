import {
  FORM_FIELD_CONDITION_DATES,
  FORM_FIELD_CONDITION_OPERATORS,
} from "./const";
import moment from "moment";

export const calcDate = (value, offset) => {
  return moment(value).add(offset.split(" ")[0], offset.split(" ")[1]);
};

export const compare = (value, opr, operand) => {
  if (!value || !operand) return false;

  const isDateCompare = moment(value, "YYYY-MM-DD", true).isValid();

  if (!isDateCompare) {
    if (opr === FORM_FIELD_CONDITION_OPERATORS.TYPE_EQUALS)
      return value == operand;
    if (opr === FORM_FIELD_CONDITION_OPERATORS.TYPE_MORE_THAN)
      return value > operand;
    if (opr === FORM_FIELD_CONDITION_OPERATORS.TYPE_LESS_THAN)
      return value < operand;

    throw "Invalid operand!";
  } else {
    let dateOperand = "";

    if (operand === FORM_FIELD_CONDITION_DATES.DATE_FIELD_7_YEARS_PRIOR)
      dateOperand = moment().add(-7, "years");
    else if (operand === FORM_FIELD_CONDITION_DATES.DATE_FIELD_1_YEAR_PRIOR)
      dateOperand = moment().add(-1, "year");
    else if (moment(operand, "YYYY-MM-DD", true).isValid())
      dateOperand = moment(operand);
    else dateOperand = moment();

    if (opr === FORM_FIELD_CONDITION_OPERATORS.TYPE_EQUALS)
      return moment(value) == dateOperand;
    if (opr === FORM_FIELD_CONDITION_OPERATORS.TYPE_MORE_THAN)
      return moment(value) > dateOperand;
    if (opr === FORM_FIELD_CONDITION_OPERATORS.TYPE_LESS_THAN)
      return moment(value) < dateOperand;

    throw "Invalid operand!";
  }
};

export const isValueIdentical = (val1, val2) => {
  if (typeof val1 !== typeof val2) return false;

  if (!Array.isArray(val1)) return val1 == val2;

  if (val1.length !== val2.length) return false;

  for (let i = 0; i < val1.length; i++) if (val1[i] !== val2[i]) return false;

  return true;
};

export const extractObjectToArray = (obj) => {
  if (typeof obj !== "object") return obj;

  let ret = [];
  Object.keys(obj).map((k) => (ret[k] = obj[k]));

  return ret;
};

export const mergeDeep = (target, ...sources) => {
  if (!sources.length) return target;
  const source = sources.shift();

  if (typeof target === "object" && typeof source === "object") {
    for (const key in source) {
      if (typeof source[key] === "object") {
        if (!target[key]) Object.assign(target, { [key]: {} });
        mergeDeep(target[key], source[key]);
      } else {
        Object.assign(target, { [key]: source[key] });
      }
    }
  }

  return mergeDeep(target, ...sources);
};
