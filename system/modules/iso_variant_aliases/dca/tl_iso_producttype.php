<?php

// Update the 'default' value for 'variant_attributes' so we can set 'alias' to be a default field
$GLOBALS['TL_DCA']['tl_iso_producttype']['fields']['variant_attributes']['default'] = array
(
    array('name'=>'alias', 'enabled'=>1),
);
