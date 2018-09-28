<?php
/**
 * Copyright © Magento2Express. All rights reserved.
 * @author: <mailto:contact@magento2express.com>.
 */

namespace M2express\ProductQuickLook\Controller\Display;

//use Magento\Framework\App\Action\Context;

class Index extends \Magento\Framework\App\Action\Action
{
/*
    public function __construct(Context $context)
    {
        parent::__construct($context);
    }
*/
    public function execute()
    {
        echo "json";
    }

    public function getNext()
    {
        $name = $this->getRequest()->getParam('name');
        return $name;
    }
}
