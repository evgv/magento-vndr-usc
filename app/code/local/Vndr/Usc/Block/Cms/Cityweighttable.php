<?php

Use Vndr_Usc_Helper_Data as uscHelper;

//Use Vndr_Usc_Model_System_Config_Source_City as sourceCity;

class Vndr_Usc_Block_Cms_Cityweighttable extends Mage_Core_Block_Template
{
    /**
     * @var Vndr_Usc_Helper_Data 
     */
    private $helper;
    
    /**
     * City/weight table data
     * @var array 
     */
    private $cityweighttable = array();
    
    public function _construct()
    {
        $this->helper = Mage::helper('vndr_usc');
    }

    /**
     * Retrieve city weight table data
     * @todo refactor
     * @return array
     */
    public function getCityweighttable()
    {
        if(
            empty($this->cityweighttable) &&
            $this->helper->isActive()
        ) {
            
            $citiesArray = Mage::getSingleton('vndr_usc/system_config_source_city')->toArray();
            $weightArray = Mage::getSingleton('vndr_usc/system_config_source_weight')->toArray();

            $this->cityweighttable = unserialize(Mage::getStoreConfig(uscHelper::XML_PATH_CITY_WEIGHT_TABLE));
            
            foreach($this->cityweighttable as $key => $value) {
                $this->cityweighttable[$key]['weight'] = $weightArray[$value['weight']];
                $this->cityweighttable[$key]['city']   = $citiesArray[$value['city_id']];
            }
        }
        
        return $this->cityweighttable;
    }

    protected function _toHtml()
    {
        if ($this->helper->isActive()) {
            return parent::_toHtml();
        }
        
        return '';
    }
}
