<?php

use Bcs\Backend\AliasBackend;

// Update the 'attributes' values for the 'alias' field so we can add in 'variant_fixed'
$GLOBALS['TL_DCA']['tl_iso_product']['fields']['alias']['attributes'] = array
(
    'legend' => 'general_legend',
    'fixed' => true,
    'variant_fixed'=>true,
    'systemColumn'=>true
);


$GLOBALS['TL_DCA']['tl_iso_product']['fields']['alias']['save_callback'] = array
(
    array('Bcs\Backend\AliasBackend', 'save'),
);
