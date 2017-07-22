<?php

class Vndr_Usc_Block_Adminhtml_System_Config_Form_Field_City extends Mage_Core_Block_Html_Select
{
    public function _toHtml()
    {
        $options = Mage::getSingleton('vndr_usc/system_config_source_city')
            ->toOptionArray();
        $this->setOptions($options);
 
        return parent::_toHtml();
    }
    
    public function setInputName($value) 
    {
        return $this->setName($value);  
    }
}
