<?php
/**
 * Created by PhpStorm.
 * User: lamx710
 * Date: 9/26/18
 * Time: 09:29
 */

namespace M2express\ProductQuickLook\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use M2express\ProductQuickLook\Helper\Data;

class CustomProduct extends Template
{
    protected $_productCollectionFactory;
    protected $helper;

    public function __construct(Context $context, CollectionFactory $productFactory, Data $helper)
    {
        $this->_productCollectionFactory = $productFactory;
        $this->helper = $helper;
        parent::__construct($context);
    }

    public function getProductCollection()
    {
        $categoryId = $this->helper->getHomeCategory();
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('*')->setPageSize(3);
        $collection->addCategoriesFilter(['in' => $categoryId]);
        return $collection;
    }
}