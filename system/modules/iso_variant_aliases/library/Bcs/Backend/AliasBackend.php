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
            $varValue .= "-" . $dc->activeRecord->sku;
        }

        return $varValue;
    }
}
