/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */

CRM.$(function ($, ) {
  dawaAutocomplete.dawaAutocomplete($("#street_address-1")[0], {
    select: function (selected) {
      fetch(selected.data.href)
        .then(response => response.json())
        .then(json => {
          let addr = json.adgangsadresse;
          $("#postal_code-1").val(addr.postnummer.nr);
          $("#postal_code-1").trigger("change");
          $("#city").val(addr.postnummer.navn);
          $("#city").trigger("change");
          $("#supplemental_address_1-Primary").val(addr.supplerendebynavn);
          $("#supplemental_address_1-Primary").trigger("change");
          let adresse = json.adgangsadresse.vejstykke.adresseringsnavn + " " + json.adgangsadresse.husnr;
          if (json.etage) {
            adresse += ", " + json.etage + ".";
          }
          if (json.dør) {
            adresse += " " + json.dør;
          }
          $("#street_address-1").val(adresse);
          $("#street_address-1").trigger("change");
          $("#geo_code_1-Primary").val(addr.adgangspunkt.koordinater[0]);
          $("#geo_code_2-Primary").val(addr.adgangspunkt.koordinater[1]);
          $("#custom_79").val(addr.kommune.kode + " " + addr.kommune.navn);
          console.log('Valgt adresse: ' + addr.adressebetegnelse);
        });
      console.log('Valgt adresse: ' + selected.tekst);
    }
  });
});

