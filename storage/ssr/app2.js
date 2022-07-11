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
let nb_proposition_default = 2;
let nb_proposition = document.getElementById("nb_proposition");
let propositions = document.getElementById("propositions");
if (nb_proposition && propositions) {
  let addProposition = function() {
    let nb_proposition2 = document.getElementById("nb_proposition");
    let propositions2 = document.getElementById("propositions");
    let i2 = 1;
    if (nb_proposition2.value < nb_proposition_default) {
      nb_proposition2.innerHTML = nb_proposition_default;
      nb_proposition2.value = nb_proposition_default;
      alert("Il faut au moins " + nb_proposition_default + " propositions de r\xE9ponse pour cr\xE9er une question !");
    }
    propositions2.innerHTML = "";
    while (i2 <= nb_proposition2.value) {
      propositions2.innerHTML += '<label for="reponse_' + i2 + '">R\xE9ponse ' + i2 + '</label><div class="form-item"><input name="reponse_' + i2 + '" type="text" class="admin-question"><input type="checkbox" name="reponse_' + i2 + '_valid" class="valider"></div>';
      i2++;
    }
  };
  let i = 1;
  nb_proposition.value = nb_proposition_default;
  propositions.innerHTML = "";
  while (i <= nb_proposition_default) {
    propositions.innerHTML += '<label for="reponse_' + i + '">R\xE9ponse ' + i + '</label><div class="form-item"><input name="reponse_' + i + '" type="text" class="admin-question"><input type="checkbox" name="reponse_' + i + '_valid" class="valider"></div>';
    i++;
  }
  nb_proposition.addEventListener("change", function() {
    addProposition();
  });
}
const validator = document.querySelectorAll(".validate");
for (let i = 0; i < validator.length; i++) {
  validator[i].addEventListener("click", function(event) {
    event.preventDefault();
    const choice = confirm(this.getAttribute("data-confirm"));
    if (choice) {
      this.form.submit();
    }
  });
}
window.Alpine = Alpine__default["default"];
Alpine__default["default"].start();
