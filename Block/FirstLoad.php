<?php
/**
 * Copyright © Magento2Express. All rights reserved.
 * @author: <mailto:contact@magento2express.com>.
 */

namespace M2express\ProductQuickLook\Block;

use M2express\ProductQuickLook\Helper\Data;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class FirstLoad extends Template
{

    protected $helper;

    public function __construct(Context $context, Data $helper)
    {
        $this->helper = $helper;
        parent::_construct($context);
    }

    public function getHomeCategory()
    {
        return $this->helper->getHomeCategory();
    }

    public function getThemeColor()
    {
        return $this->helper->getThemeColor();
    }

    public function getThemeStyle()
    {
        return $this->helper->getThemeColor();
    }

}
