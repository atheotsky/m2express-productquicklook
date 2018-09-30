<?php
/**
 * Copyright © Magento2Express. All rights reserved.
 * @author: <mailto:contact@magento2express.com>.
 */

namespace M2express\ProductQuickLook\Controller\Display;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class View extends \Magento\Catalog\Controller\Product
{
    protected $viewHelper;
    protected $resultForwardFactory;
    protected $resultPageFactory;
    protected $template;

    public function __construct(
        Context $context,
        \Magento\Catalog\Helper\Product\View $viewHelper,
        \Magento\Framework\Controller\Result\ForwardFactory $resultForwardFactory,
        PageFactory $resultPageFactory
    ) {
        $this->viewHelper = $viewHelper;
        $this->resultForwardFactory = $resultForwardFactory;
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        // Get product ID from request
        $productId = (int) $this->getRequest()->getParam('id');

        // Prepare helper and params
        $params = new \Magento\Framework\DataObject();

        // Render page
        try {
            $page = $this->resultPageFactory->create();
            $this->viewHelper->prepareAndRender($page, $productId, $this, $params);
            return $page;
        } catch (\Magento\Framework\Exception\NoSuchEntityException $e) {
            echo "Product not found";
        } catch (\Exception $e) {
            echo "Product not found";
        }
    }
}