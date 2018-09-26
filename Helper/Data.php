<?php
/**
 * Created by PhpStorm.
 * User: lamx710
 * Date: 9/26/18
 * Time: 09:03
 */

namespace M2express\ProductQuickLook\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;

class Data extends AbstractHelper
{
    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

    public function getHomeCategory($scope = ScopeConfigInterface::SCOPE_TYPE_DEFAULT)
    {
        return $this->scopeConfig->getValue(
            'm2express_productquicklook/general/home_category',
            $scope
        );
    }

    public function getThemeColor($scope = ScopeConfigInterface::SCOPE_TYPE_DEFAULT)
    {
        return $this->scopeConfig->getValue(
            'm2express_productquicklook/general/color_of_theme',
            $scope
        );
    }

    public function getThemeStyle($scope = ScopeConfigInterface::SCOPE_TYPE_DEFAULT)
    {
        return $this->scopeConfig->getValue(
            'm2express_productquicklook/general/style_of_theme',
            $scope
        );
    }
}