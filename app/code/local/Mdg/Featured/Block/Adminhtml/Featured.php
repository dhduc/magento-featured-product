<?php
/**
 * Created by PhpStorm.
 * User: duc
 * Date: 12/08/2015
 * Time: 21:33
 */
class Mdg_Featured_Block_Adminhtml_Featured extends Mage_Adminhtml_Block_Widget_Grid_Container {
    public function __construct(){

        $this->_blockGroup = "featured";
        $this->_controller = "adminhtml_featured";
        $this->_headerText = $this->__('Product Featured');
        //$this->_addButtonLabel = Mage::helper('featured')->__('Select Products');
        parent::__construct();
        //$this->_removeButton('add');
    }
}