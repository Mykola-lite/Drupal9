<?php

/**
 * @file
 * Views hooks.
 */

/**
 * Implements hook_views_data_alter().
 *
 * Alter DB tables defined via hook_views_data().
 */
function handler_views_data_alter(array &$data) {
  $data['node']['handler_created_relative'] = [
    'title' => t('Relative creation date'),
    'field' => [
      'title' => t('Relative creation date'),
      'help' => t('The creation date will be printed as relative date.'),
      'id' => 'handler_created_relative',
    ],
  ];
  $data['node']['handler_two_fields'] = [
    'title' => t('Two fields math operation'),
    'field' => [
      'title' => t('Two fields math operation'),
      'help' => t('Simple math operation between two selected fields.'),
      'id' => 'handler_two_field_math',
      'click sortable' => FALSE,
    ],
  ];
}
