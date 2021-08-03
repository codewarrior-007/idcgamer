import { compare } from "./helper";

test("compare date", () => {
  expect(compare("2021-07-07", ">", "-1 year")).toBe(true);
});
