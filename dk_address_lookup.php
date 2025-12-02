<?php
declare(strict_types = 1);

// phpcs:disable PSR1.Files.SideEffects
require_once 'dk_address_lookup.civix.php';
// phpcs:enable

use CRM_DkAddressLookup_ExtensionUtil as E;

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function dk_address_lookup_civicrm_config(\CRM_Core_Config $config): void {
  _dk_address_lookup_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function dk_address_lookup_civicrm_install(): void {
  _dk_address_lookup_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function dk_address_lookup_civicrm_enable(): void {
  _dk_address_lookup_civix_civicrm_enable();
}
/**
 * Implements hook_civicrm_buildProfile().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hooks/hook_civicrm_buildProfile
 */
function dk_address_lookup_civicrm_buildProfile($profileName) {
  if ($profileName === "name_and_address") {
    Civi::resources()->addStyleFile('dk_address_lookup', 'css/dk_address_lookup.css', [
      'region' => 'html-header',
      'weight' => 1000,
      ]);
    Civi::resources()->addStyleFile('dk_address_lookup', 'css/dawa-autocomplete2.css', [
      'region' => 'html-header',
      'weight' => 1000,
      ]);
    Civi::resources()->addScriptFile('dk_address_lookup', 'js/dawa-autocomplete2.min.js',
      [
        'weight' => 100,
      ]);
    Civi::resources()->addScriptFile('dk_address_lookup', 'js/address_lookup_profile.js',
      [
        'weight' => 110,
      ]);
  }
}


/**
 * Implements hook_civicrm_buildForm().
 *
 * Set a default value for an event price set field.
 *
 * @param string $formName
 * @param CRM_Core_Form $form
 */
function dk_address_lookup_civicrm_buildForm($formName, $form) {
  if ($formName === 'CRM_Contact_Form_Inline_Address') {
    Civi::resources()->addStyleFile('dk_address_lookup', 'css/dawa-autocomplete2.css', [
      'region' => 'html-header',
      'weight' => 1000,
      ]);
    Civi::resources()->addScriptFile('dk_address_lookup', 'js/dawa-autocomplete2.min.js',
      [
        'weight' => 100,
      ]);
    Civi::resources()->addScriptFile('dk_address_lookup', 'js/address_lookup_form.js',
      [
        'weight' => 110,
      ]);    
  }
}
