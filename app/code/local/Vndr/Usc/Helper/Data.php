<?php

class Vndr_Usc_Helper_Data extends Mage_Core_Helper_Abstract
{
    const XML_PATH_IS_ACTIVE         = 'usc/general/active';
    const XML_PATH_CITY_WEIGHT_TABLE = 'usc/general/city_weight_table';
    
    /**
     * Retrieve isActive flag for extension in system configuration
     * @return boolean
     */
    public function isActive()
    {
        return Mage::getStoreConfigFlag(self::XML_PATH_IS_ACTIVE);
    }
}
