<?php

/**
* Bright Cloud Studio's Keap Integration
*
* @copyright  2022 Bright Cloud Studio
* @package    keap_integration
* @license    GNU/LGPL
* @filesource
*/

 /* Extend the tl_user palettes */
foreach ($GLOBALS['TL_DCA']['tl_member']['palettes'] as $k => $v) {
    $GLOBALS['TL_DCA']['tl_member']['palettes'][$k] = str_replace('groups;', 'groups;{meetings_legend},meeting_options;', $v);
}
    
/* Add fields to tl_user */
$GLOBALS['TL_DCA']['tl_member']['fields']['meeting_options'] = array
(
    'sql'                     => "varchar(255) NOT NULL default ''",
    'label'                   => &$GLOBALS['TL_LANG']['tl_member']['meeting_options'],
    'inputType'               => 'checkbox',
    'options'                 => array('misc_billing' => 'Misc. Billing', 'misc_travel_expenses' => 'Misc. Travel Expenses', 'editing_services' => 'Editing Services', 'manager' => 'Manager', 'parking' => 'Parking', 'test_late_cancel_first' => 'First Test Late Cancel', 'test_late_cancel_additional' => 'Additional Test Late Cancel'),								
    'eval'                    => array('multiple'=>true, 'mandatory'=>false,'tl_class'=>'clr') 
);
