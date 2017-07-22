<?php

class Vndr_Usc_Model_System_Config_Source_Weight
{
    const LESS_THEN_5_KG_KEY     = 'lt_5kg';
    const FROM_5_TO_10_KG_KEY    = '5_to_10kg';
    const GREATER_THEN_10_KG_KEY = 'gt_10kg';
    
    const LESS_THEN_5_KG_VALUE     = 'less then 5kg';
    const FROM_5_TO_10_KG_VALUE    = 'from 5 to 10kg';
    const GREATER_THEN_10_KG_VALUE = 'greater then 10kg';
    
    /**
     * @var array 
     */
    protected $_optionArray;
    
    /**
     * @var array 
     */
    protected $_options;

    /**
     * Retrieve option array array(value => label)
     * @param boolean $isMultiselect
     * @return array
     */
    public function toOptionArray($isMultiselect=false)
    {
        if ( !$this->_optionArray ) {
            foreach (self::getWeightOptions() as $key => $value) {
                $this->_optionArray[] = array(
                    'label' => $value,
                    'value' => $key
                );
            }
        }

        if( ! $isMultiselect ){
            array_unshift($this->_optionArray, array('value'=>'', 'label'=> Mage::helper('vndr_usc')->__('--Please Select--')));
        }

        return $this->_optionArray;
    }

    /**
     * Retrieve options as kay => value
     * @return array
     */
    public function toArray()
    {
        if ( !$this->_options ) {
           $this->_options = $this->getWeightOptions();
        }

        return $this->_options;
    }
    
    /**
     * Retrieve array of weight options
     * 
     * @todo need to refactor (added timely, weight options will move into db in future)
     * @return array
     */
    private static function getWeightOptions()
    {
        return array(
                self::LESS_THEN_5_KG_KEY     => Mage::helper('vndr_usc')->__(self::LESS_THEN_5_KG_VALUE),
                self::FROM_5_TO_10_KG_KEY    => Mage::helper('vndr_usc')->__(self::FROM_5_TO_10_KG_VALUE),
                self::GREATER_THEN_10_KG_KEY => Mage::helper('vndr_usc')->__(self::GREATER_THEN_10_KG_VALUE)
            );
    }
}
