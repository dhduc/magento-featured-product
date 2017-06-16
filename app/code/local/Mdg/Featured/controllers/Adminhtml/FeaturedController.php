<?php
/**
 *
 */
class Mdg_Featured_Adminhtml_FeaturedController extends Mage_Adminhtml_Controller_Action {
    public function indexAction()
    {
        $this->loadLayout()->_setActiveMenu('product_featured')
            ->_title($this->__('Product Featured'));
        $this->renderLayout();
    }

    public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('featured/adminhtml_featured_grid')->toHtml()
        );
    }

    public function newAction(){
        $this->loadLayout();
        $this->renderLayout();
    }

}