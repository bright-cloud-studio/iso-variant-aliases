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

    /**
     * Autogenerate a product alias if it has not been set yet
     * @param mixed
     * @param DataContainer
     * @return string
     * @throws \Exception
     */
    public function save($varValue, DataContainer $dc)
    {
        $autoAlias = false;
        $varValue  = (string) $varValue;

        // Generate alias if there is none
        if ('' === $varValue) {
            $autoAlias = true;
            $act       = Input::get('act');

            if ('edit' === $act || 'overrideAll' === $act) {
                $varValue = (string) (Input::post('name') ?: Input::post('sku'));
            } elseif ('editAll' === $act) {
                $varValue = (string) (Input::post('name_'.$dc->id) ?: Input::post('sku_'.$dc->id));
            }
        }

        if ('' === $varValue) {
            $varValue = (string) ($dc->activeRecord->name ?: $dc->activeRecord->sku);
        }

        if ('' === $varValue) {
            $varValue = $dc->id;
        }

        $varValue = StringUtil::standardize(strip_tags($varValue));

        $objAlias = Database::getInstance()
            ->prepare('SELECT id FROM tl_iso_product WHERE id=? OR alias=?')
            ->execute($dc->id, $varValue)
        ;

        // Check whether the product alias exists
        if ($objAlias->numRows > 1) {
            if (!$autoAlias) {
                throw new \OverflowException(sprintf($GLOBALS['TL_LANG']['ERR']['aliasExists'], $varValue));
            }

            $varValue .= '.' . $dc->id;
        }

        return $varValue;
    }
}
