<?php


namespace M2express\ProductQuickLook\Api;

interface ProductDetailsManagementInterface
{

    /**
     * GET for productDetails api
     * @param string $pid
     * @return \Magento\Catalog\Api\Data\ProductInterface
     */
    public function getProductDetails($pid);
}
