"use strict";
var _ = require("lodash");
var axios = require("axios");
var Alpine = require("alpinejs");
function _interopDefaultLegacy(e) {
  return e && typeof e === "object" && "default" in e ? e : { "default": e };
}
var ___default = /* @__PURE__ */ _interopDefaultLegacy(_);
var axios__default = /* @__PURE__ */ _interopDefaultLegacy(axios);
var Alpine__default = /* @__PURE__ */ _interopDefaultLegacy(Alpine);
window._ = ___default["default"];
window.axios = axios__default["default"];
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
window.Alpine = Alpine__default["default"];
Alpine__default["default"].start();
