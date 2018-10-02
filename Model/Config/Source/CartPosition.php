<?php
/**
 * Copyright © Magento2Express. All rights reserved.
 * @author: <mailto:contact@magento2express.com>.
 */
namespace M2express\ProductQuickLook\Model\Config\Source;

class CartPosition implements \Magento\Framework\Option\ArrayInterface
{

    public function toOptionArray()
    {
        return [['value' => 'top', 'label' => __('top')],
            ['value' => 'right', 'label' => __('right')],
            ['value' => 'bottom', 'label' => __('bottom')],
            ['value' => 'left', 'label' => __('left')]];
    }

    public function toArray()
    {
        return ['top' => __('top'),'right' => __('right'),'bottom' => __('bottom'),'left' => __('left')];
    }
}