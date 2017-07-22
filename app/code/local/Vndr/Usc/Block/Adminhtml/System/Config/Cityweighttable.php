<?php

class Vndr_Usc_Block_Adminhtml_System_Config_Cityweighttable extends Mage_Adminhtml_Block_System_Config_Form_Field_Array_Abstract
{
    protected $_itemCityRenderer;
    protected $_itemWeigthRenderer;
 
    public function _prepareToRender()
    {
        $this->addColumn('city_id', array(
            'label'    => Mage::helper('vndr_usc')->__('City'),
            'renderer' => $this->_getCityRenderer()
        ));
        $this->addColumn('weight', array(
            'label'    => Mage::helper('vndr_usc')->__('Weight'),
            'renderer' => $this->_getWeightRenderer()
        ));
 
        $this->_addAfter = false;
        $this->_addButtonLabel = Mage::helper('vndr_usc')->__('Add');
    }
    
    protected function  _getCityRenderer() 
    {
        if ( !$this->_itemCityRenderer ) {
            $this->_itemCityRenderer = $this->getLayout()->createBlock(
                'vndr_usc/adminhtml_system_config_form_field_city', 
                '',
                array('is_render_to_js_template' => true)
            );
        }
        return $this->_itemCityRenderer;
    }
 
    protected function  _getWeightRenderer() 
    {
        if ( !$this->_itemWeigthRenderer ) {
            $this->_itemWeigthRenderer = $this->getLayout()->createBlock(
                'vndr_usc/adminhtml_system_config_form_field_weight', 
                '',
                array('is_render_to_js_template' => true)
            );
        }
        return $this->_itemWeigthRenderer;
    }
    
 
    protected function _prepareArrayRow(Varien_Object $row)
    {
        if($row->getData('city_id')) {
            $row->setData(
                'option_extra_attr_' . $this->_getCityRenderer()->calcOptionHash($row->getData('city_id')),
                'selected="selected"'
            );
        }
        
        if($row->getData('weight')) {
            $row->setData(
                'option_extra_attr_' . $this->_getWeightRenderer()->calcOptionHash($row->getData('weight')),
                'selected="selected"'
            );
        }
    }
}
