<?php
/**
 * Created by PhpStorm.
 * User: duc
 * Date: 19/08/2015
 * Time: 16:47
 */

class Mdg_Featured_Block_Adminhtml_Featured_Edit extends Mage_Adminhtml_Block_Widget_Form_Container {
    public function __construct(){
        parent::__construct();
        $this->_objectId = 'id';
        $this->_blockGroup = "featured";
        $this->_controller = "adminhtml_featured";
    }

    public function getHeaderText(){
        return Mage::helper('featured')->__('Add Product Featured');
    }
}