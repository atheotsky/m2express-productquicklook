<?php
/**
 * Copyright © Magento2Express. All rights reserved.
 * @author: <mailto:contact@magento2express.com>.
 */

namespace M2express\ProductQuickLook\Controller\Display;

use Magento\Framework\App\Action\Context;
use Magento\Framework\Json\Helper\Data;
use Magento\Catalog\Model\ProductFactory;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $jsonHelper;
    protected $_productFactory;

    public function __construct(Context $context, Data $jsonHelper, ProductFactory $productFactory)
    {
        $this->jsonHelper = $jsonHelper;
        $this->_productFactory = $productFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $product = $this->_productFactory->create()->load($this->getProductId());
        $jsonResult = ["id"=>0,"Name"=>"hello"];
        echo $this->jsonHelper->jsonEncode($product);
    }

    public function getProductId()
    {
        $productId = (int) $this->getRequest()->getParam('id');
        if (!$productId) {
            return 0;
        } else {
            return $productId;
        }
    }
}
