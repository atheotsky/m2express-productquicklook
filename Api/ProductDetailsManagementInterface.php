<?php


namespace M2express\ProductQuickLook\Api;

interface ProductDetailsManagementInterface
{

    /**
     * GET for productDetails api
     * @param string $pid
     * @return \ArrayObject
     */
    public function getProductDetails($pid);
}
