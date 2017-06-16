<?php
/**
 * Created by PhpStorm.
 * User: duc
 * Date: 12/08/2015
 * Time: 09:45
 */
class Mdg_Featured_Model_System_Config_Source_Dropdown_Effect
{

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(

            array('value' => 'slow', 'label'=>Mage::helper('adminhtml')->__('Slow')),
            array('value' => 'fast', 'label'=>Mage::helper('adminhtml')->__('Fast')),
            array('value' => 'animation', 'label'=>Mage::helper('adminhtml')->__('Animation')),
        );
    }

}
