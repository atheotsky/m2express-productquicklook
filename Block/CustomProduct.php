<?php
/**
 * Copyright © Magento2Express. All rights reserved.
 * @author: <mailto:contact@magento2express.com>.
 */

namespace M2express\ProductQuickLook\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use M2express\ProductQuickLook\Helper\Data;
use Magento\Catalog\Block\Product\ImageBuilder;

class CustomProduct extends Template
{
    protected $_productCollectionFactory;
    protected $helper;
    protected $imageBuilder;


    public function __construct(
        Context $context,
        CollectionFactory $productFactory,
        Data $helper,
        ImageBuilder $imageBuilder
    ) {
        $this->_productCollectionFactory = $productFactory;
        $this->helper = $helper;
        $this->imageBuilder = $imageBuilder;
        parent::__construct($context);
    }

    public function getProductCollection()
    {
        $categoryId = $this->helper->getHomeCategory();
        $collection = $this->_productCollectionFactory->create();
        $collection->addCategoriesFilter(['eq' => $categoryId]);
        $collection->addAttributeToSelect('*')->setPageSize(3);
        $collection->addAttributeToFilter('visibility', \Magento\Catalog\Model\Product\Visibility::VISIBILITY_BOTH);
        $collection->getSelect()->orderRand();

        return $collection;
    }

    public function getImage($product, $imageId, $attributes = [])
    {
        return $this->imageBuilder->setProduct($product)
            ->setImageId($imageId)
            ->setAttributes($attributes)
            ->create();
    }

    public function getModuleConfig()
    {
        return $this->helper;
    }
}
