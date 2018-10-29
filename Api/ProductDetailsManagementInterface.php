<?php


namespace M2express\ProductQuickLook\Api;

interface ProductDetailsManagementInterface
{

    /**
     * GET for productDetails api
     * @param string $pid
     */
    public function getProductDetails($pid);
}
