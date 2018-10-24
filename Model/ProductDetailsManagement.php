<?php

namespace M2express\ProductQuickLook\Model;

use M2express\ProductQuickLook\Api\ProductDetailsManagementInterface;
use Magento\Catalog\Model\ProductFactory;
use Magento\Framework\Json\Helper\Data;

class ProductDetailsManagement implements ProductDetailsManagementInterface
{
    protected $producFactory;
    protected $jsonHelper;

    public function __construct(ProductFactory $productFactory, Data $jsonHelper)
    {
        $this->producFactory = $productFactory;
        $this->jsonHelper = $jsonHelper;
    }

    /**
     * {@inheritdoc}
     */
    public function getProductDetails($pid)
    {
        $productId = (int) $pid;
        if (!$productId) {
            return "No product ID exist";
        } else {
            $product = $this->producFactory->create()->load($productId);
            return $product;
        }
    }
}