<?php


$GLOBALS['TL_DCA']['tl_iso_product']['fields']['alias']['attributes'] = array
(
    'legend' => 'general_legend',
    'fixed' => true,
    'inherit' => true,
    'variant_fixed'=>true,
    'systemColumn'=>true
);



    
/*
$GLOBALS['TL_DCA']['tl_member']['fields']['meeting_options'] = array
(
    'sql'                     => "varchar(255) NOT NULL default ''",
    'label'                   => &$GLOBALS['TL_LANG']['tl_member']['meeting_options'],
    'inputType'               => 'checkbox',
    'options'                 => array('misc_billing' => 'Misc. Billing', 'misc_travel_expenses' => 'Misc. Travel Expenses', 'editing_services' => 'Editing Services', 'manager' => 'Manager', 'parking' => 'Parking', 'test_late_cancel_first' => 'First Test Late Cancel', 'test_late_cancel_additional' => 'Additional Test Late Cancel'),								
    'eval'                    => array('multiple'=>true, 'mandatory'=>false,'tl_class'=>'clr') 
);
*/
