<?php

class Mdg_Featured_Model_System_Config_Source_Dropdown_Cmspage
{
    public function toOptionArray()
    {
//        return Mage::getModel('cms/page')->getCollection()->toOptionArray();

        $pages = Mage::getModel('cms/page')->getCollection()->getData();
        $options = array();
        $i= 0;
        foreach($pages as $key=>$value){
            $options[$i]['label'] = $value['title'];
            $options[$i]['value'] = $value['identifier'];
            $i++;
        }
        return $options;
    }
}