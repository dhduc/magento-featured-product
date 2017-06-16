<?php
/**
 * Created by PhpStorm.
 * User: duc
 * Date: 11/08/2015
 * Time: 09:27
 */
$installer = $this;
$setup = new Mdg_Featured_Model_Resource_Setup('core_setup');
$installer->startSetup();
/**
 * Add attribute
 */
$setup->addAttribute('catalog_product', 'is_featured', array(
    'group' => 'General',
    'input' => 'boolean',
    'type' => 'int',
    'default' => '0',
    'label' => 'is_Featured',
    'backend' => '',
    'visible' => 1,
    'required' => 0,
    'user_defined' => 1,
    'searchable' => 1,
    'filterable' => 1,
    'comparable' => 1,
    'visible_on_front' => 1,
    'visible_in_advanced_search' => 0,
    'is_html_allowed_on_front' => 0,
    'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
));
$installer->endSetup();