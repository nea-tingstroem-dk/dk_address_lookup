/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */

CRM.$(function ($, ) {
  dawaAutocomplete.dawaAutocomplete($("#address_1_street_address")[0], {
    select: function (selected) {
      fetch(selected.data.href)
        .then(response => response.json())
        .then(json => {
          let addr = json.adgangsadresse;
          $("#address_1_postal_code").val(addr.postnummer.nr);
          $("#address_1_postal_code").trigger("change");
          $("#address_1_city").val(addr.postnummer.navn);
          $("#address_1_city").trigger("change");
          $("#address_1_supplemental_address_1").val(addr.supplerendebynavn);
          $("#address_1_supplemental_address_1").trigger("change");
          let linjer = addr.adressebetegnelse.split(",");
          $("#address_1_street_address").val(linjer[0]);
          $("#address_1_street_address").trigger("change");
          $("#address_1_geo_code_1").val(addr.adgangspunkt.koordinater[0]);
          $("#address_1_geo_code_2").val(addr.adgangspunkt.koordinater[1]);
          $("#custom_79").val(addr.kommune.kode + " " + addr.kommune.navn);
        });
      console.log('Valgt adresse: ' + selected.tekst);
    }
  });
});

