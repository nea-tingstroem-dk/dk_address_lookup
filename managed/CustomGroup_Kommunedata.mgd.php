<?php
use CRM_DkAddressLookup_ExtensionUtil as E;

return [
  [
    'name' => 'CustomGroup_Kommunedata',
    'entity' => 'CustomGroup',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Kommunedata',
        'title' => E::ts('Kommunedata'),
        'extends' => 'Address',
        'weight' => 18,
        'collapse_adv_display' => TRUE,
        'created_date' => '2025-12-07 00:56:50',
      ],
      'match' => ['name'],
    ],
  ],
  [
    'name' => 'CustomGroup_Kommunedata_CustomField_Kommune',
    'entity' => 'CustomField',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Kommunedata',
        'name' => 'Kommune',
        'label' => E::ts('Kommune'),
        'html_type' => 'Text',
        'text_length' => 64,
        'note_columns' => 60,
        'note_rows' => 4,
        'column_name' => 'kommune_101',
      ],
      'match' => [
        'name',
        'custom_group_id',
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Kommunedata_CustomField_Kommunekode',
    'entity' => 'CustomField',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Kommunedata',
        'name' => 'Kommunekode',
        'label' => E::ts('Kommunekode'),
        'html_type' => 'Text',
        'text_length' => 10,
        'note_columns' => 60,
        'note_rows' => 4,
        'column_name' => 'kommunekode_102',
      ],
      'match' => [
        'name',
        'custom_group_id',
      ],
    ],
  ],
];
