<?php

namespace M2express\ProductQuickLook\Model;

use M2express\ProductQuickLook\Api\ProductDetailsManagementInterface;
use Magento\Catalog\Model\ProductFactory;
use Magento\Framework\Json\Helper\Data;
use Magento\Catalog\Helper\Image;

class ProductDetailsManagement implements ProductDetailsManagementInterface
{
    protected $producFactory;
    protected $jsonHelper;
    protected $_imageHelper;

    public function __construct(ProductFactory $productFactory, Data $jsonHelper, Image $imageHelper)
    {
        $this->producFactory = $productFactory;
        $this->jsonHelper = $jsonHelper;
        $this->_imageHelper = $imageHelper;
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
            $returnData = [];
            $galleryArr = [];
            $product = $this->producFactory->create()->load($productId);
            $gallery = $product->getMediaGalleryImages();
            foreach ($gallery as $image) {
                $galleryArr[] = ['small_image_url' =>
                    $this->_imageHelper->init($product, 'product_small_image')
                        ->setImageFile($image->getFile())
                        ->resize(300)
                        ->getUrl(), 'medium_image_url' =>
                    $this->_imageHelper->init($product, 'product_page_image_medium_no_frame')
                        ->setImageFile($image->getFile())
                        ->resize(500)
                        ->getUrl(), 'large_image_url' =>
                    $this->_imageHelper->init($product, 'product_page_image_large_no_frame')
                        ->setImageFile($image->getFile())
                        ->getUrl()];
            }
            $productData = $product->toArray();
            $returnData = ['response' => $productData, 'gallery'=> $galleryArr];
            $returnData = $this->jsonHelper->jsonEncode($returnData);
            return $returnData;
        }
    }
}