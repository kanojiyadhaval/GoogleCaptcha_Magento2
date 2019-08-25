<?php
/**
 * web-vision GmbH
 *
 * NOTICE OF LICENSE
 *
 * <!--LICENSETEXT-->
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.web-vision.de for more information.
 *
 * @category    WebVision
 * @package     WebVision/Googlecaptcha
 * @copyright   Copyright (c) 2001-2018 web-vision GmbH (http://www.web-vision.de)
 * @license     <!--LICENSEURL-->
 * @author      Dhaval Kanojiya <dhaval@web-vision.de>
 */
 
namespace WebVision\Googlecaptcha\Helper;

use Magento\Store\Model\ScopeInterface;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    const MODULE_ENABLED = 'recaptcha/settings/enabled';
    const CAPTCHA_URL = 'recaptcha/settings/url';
    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $storeManager;

    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * Data constructor.
     *
     * @param \Magento\Framework\App\Helper\Context $context
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {
        parent::__construct($context);
        $this->storeManager = $storeManager;
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * Is the module enabled in configuration.
     *
     * @return bool
     */
    public function isEnabled()
    {
        return $this->getStoreConfig(self::MODULE_ENABLED);
    }

    /**
     * The recaptcha site url.
     *
     *
     * @return string
     */
    public function getCaptchaUrl()
    {
        return $this->getStoreConfig(self::CAPTCHA_URL);
    }
    
    /**
     * The recaptcha site config.
     *
     *
     * @return string
     */
    public function getStoreConfig($path)
    {
        $store = $this->getStoreId();
        return $this->scopeConfig->getValue($path, ScopeInterface::SCOPE_STORE, $store);
    }

    /**
     * The store id.
     *
     *
     * @return string
     */
    public function getStoreId()
    {
        return $this->storeManager->getStore()->getStoreId();
    }
}
?>