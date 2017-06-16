<?php
/**
 * Created by PhpStorm.
 * User: duc
 * Date: 12/08/2015
 * Time: 09:45
 */
class Mdg_Featured_Model_System_Config_Source_Dropdown_Position
{

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(

            array('value' => 0, 'label'=>Mage::helper('adminhtml')->__('Prepend Block')),
            array('value' => 1, 'label'=>Mage::helper('adminhtml')->__('Append Block')),
        );
    }

}
