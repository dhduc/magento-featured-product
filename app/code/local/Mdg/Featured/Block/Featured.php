<?php

/**
 * Created by PhpStorm.
 * User: duc
 * Date: 11/08/2015
 * Time: 09:50
 */
class Mdg_Featured_Block_Featured extends Mage_Core_Block_Template
{
    /**
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

//    protected function _afterToHtml($html)
//    {
//        return $html . '<div>Killroy was here</div>';
//    }

    /**
     * @return get all featured product
     */

    public function getFeatured()
    {
        $number_product = Mage::getStoreConfig('featured_config/general/number_product');
        $sort = $this->getSortBy();
        $attribute = $sort['attribute'];
        $sort_by = $sort['sort_by'];
        $product_collection = Mage::getModel('catalog/product')->getCollection()
            ->addAttributeToSelect('*')
            ->addAttributeToFilter('is_featured', '1')
            ->setPageSize($number_product)
            ->addAttributeToSort($attribute, $sort_by);
       if ($this->checkCategory() && $this->getCurrentCategory() != null) {
            $product_collection->addCategoryFilter($this->getCurrentCategory());
        }
        return $product_collection;

    }

    /**
     * @return title
     */

    public function getTitle()
    {
        $title = Mage::getStoreConfig('featured_config/general/header_title');
        return $title;
    }

    /**
     * @return current route
     */
    public function getCurrentRoute()
    {
        $route_name = Mage::app()->getRequest()->getRouteName();
        return $route_name;
    }

    /**
     * @return current category
     */

    public function getCurrentCategory()
    {
        $current_category = Mage::registry('current_category');
        return $current_category;
    }

    /**
     * @check CMS page
     */

    public function checkCmsPage()
    {
        $routeName = Mage::app()->getRequest()->getRouteName();
        $identifier = Mage::getSingleton('cms/page')->getIdentifier();
        $listPage = explode(',', Mage::getStoreConfig('featured_config/cms/cms_page'));


        if ($routeName == 'cms' && in_array($identifier, $listPage)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return CMS column
     */
    public function getCmsColumn()
    {
        $column = Mage::getStoreConfig('featured_config/cms/cms_column');
        return $column;
    }

    /**
     * @return CMS position
     */

    public function getCmsPosition()
    {
        $position = Mage::getStoreConfig('featured_config/cms/cms_position');
        return $position;
    }

    /**
     * @check is category
     */

    public function checkCategory()
    {
        if (!$this->checkCmsPage()) {
            $current_category = Mage::registry('current_category')->getId();
            $listCategory = explode(',', Mage::getStoreConfig('featured_config/catalog/categories'));
            if (in_array($current_category, $listCategory)) {
                return true;
            } else {
                return false;
            }
        }
    }

    /**
     * @return category column
     */
    public function getCategoryColumn()
    {
        $column = Mage::getStoreConfig('featured_config/catalog/category_column');
        return $column;
    }

    /**
     * check display product name
     */

    public function checkDisplayName(){
        $flag = Mage::getStoreConfig('featured_config/action/visible_name');
        if($flag) return true;
        else return false;
    }

    /**
     * check display product price
     */

    public function checkDisplayPrice(){
        $flag = Mage::getStoreConfig('featured_config/action/visible_price');
        if($flag) return true;
        else return false;
    }

    /**
     * @return sort by
     */

    public function getSortBy(){
        $sort = Mage::getStoreConfig('featured_config/sort/sort_by');
        $arg = array('attribute' => '', 'sort_by' => '');
        switch($sort){
            case 'date_newest': $arg['attribute'] = 'created_at'; $arg['sort_by'] = 'asc'; break;
            case 'date_oldest': $arg['attribute'] = 'created_at'; $arg['sort_by'] = 'desc'; break;
            case 'name_az': $arg['attribute'] = 'name'; $arg['sort_by'] = 'asc'; break;
            case 'name_za': $arg['attribute'] = 'name'; $arg['sort_by'] = 'desc'; break;
            case 'price_in': $arg['attribute'] = 'price'; $arg['sort_by'] = 'asc'; break;
            case 'price_de': $arg['attribute'] = 'price'; $arg['sort_by'] = 'desc'; break;
        }
        return $arg;
    }

    /**
     * Number item
     */
    public function setNumberItem(){
        $number = Mage::getStoreConfig('featured_config/slider/number_item');
        $script = "(function($) { $(function(){
            var jcarousel = $('.jcarousel');
            jcarousel
            .on('jcarousel:reload jcarousel:create', function () {
                /**
                 * Comment for config slider
                 */
                var carousel = $(this),
                    width = carousel.innerWidth();

                if (width >= 600) {
                    width = width / ".$number.";
                } else if (width >= 350) {
                    width = width / 2;
                }

                carousel.jcarousel('items').css('width', Math.ceil(width) + 'px');
            })
            .jcarousel({
                wrap: 'circular'
            });
        });
        })(jQuery);";
        return $script;
    }
    /**
     * Slider Effect
     */
    public function getEffect()
    {
        $effect = Mage::getStoreConfig('featured_config/slider/effect');
        $script = "$(function(){ $('.jcarousel').jcarousel({";
        switch ($effect) {
            case 'slow':
                $script .= "animation: 'slow' ";
                break;
            case 'fast':
                $script .= "animation: 'fast' ";
                break;
            case 'animation':
                $script .= "animation: {
                            duration: 400,
                            easing:   'linear',
                            complete: function() {
                            }}";
                break;
        }
        $script .= " });});";
        return $script;
    }

}