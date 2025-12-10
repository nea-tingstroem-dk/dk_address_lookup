/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */

CRM.$(function ($) {
  dawaAutocomplete.dawaAutocomplete($("#address_1_street_address")[0], {
    select: function (selected) {
      fetch(selected.data.href)
        .then(response => response.json())
        .then(json => {
          let addr = json.adgangsadresse;
          $("#address_1_postal_code").val(addr.postnummer.nr).trigger("change");
          $("#address_1_city").val(addr.postnummer.navn).trigger("change");
          $("#address_1_supplemental_address_1").val(addr.supplerendebynavn).trigger("change");
          let adresse = json.adgangsadresse.vejstykke.adresseringsnavn + " " + json.adgangsadresse.husnr;
          if (json.etage) {
            adresse += ", " + json.etage + ".";
          }
          if (json.dør) {
            adresse += " " + json.dør;
          }
          $("#address_1_street_address").val(adresse).trigger("change");
          $("#address_1_geo_code_1").val(addr.adgangspunkt.koordinater[0]).trigger("change");
          $("#address_1_geo_code_2").val(addr.adgangspunkt.koordinater[1]).trigger("change");
          $("[data-crm-custom='Kommunedata:Kommunekode']").val(addr.kommune.kode).trigger("change");
          $("[data-crm-custom='Kommunedata:Kommune']").val(addr.kommune.navn).trigger("change");
        });
    }
  });
});

