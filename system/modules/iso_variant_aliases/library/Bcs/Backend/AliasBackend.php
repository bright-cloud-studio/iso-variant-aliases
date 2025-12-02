<?php

namespace Bcs\Backend;

use Isotope\Backend\Product\Alias;

use Contao\Backend;
use Contao\Database;
use Contao\DataContainer;
use Contao\Input;
use Contao\StringUtil;

class AliasBackend extends Alias
{

    public function save($varValue, DataContainer $dc)
    {
        // Perform the default Isotope save() function
        $varValue = parent::save($varValue, $dc);
        
        // If we have a PID, this is a variant, append the SKU to make the alias unique
        if($dc->activeRecord->pid != 0) {
            
            // If the original alias doesnt already contain a lowercase version of the SKU
            if(!str_contains($varValue, strtolower($dc->activeRecord->sku))) {
                // append the lowercase SKU to the alias, after an underscore
                $varValue .= "_" . strtolower($dc->activeRecord->sku);
            }
        }

        return $varValue;
    }
}
