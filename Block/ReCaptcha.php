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
 
namespace WebVision\Googlecaptcha\Block;

use \Magento\Framework\View\Element\Template;
use \Magento\Framework\View\Element\Template\Context;
use \Magento\Store\Model\StoreManagerInterface;
use \WebVision\Googlecaptcha\Helper\Data;
/**
 * Custom Block
 *
 * @api
 * @since 100.0.2
 */
class ReCaptcha extends Template
{
    /**
     * Data constructor.
     *
     * @param \Magento\Framework\App\Helper\Context $context
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param \WebVision\Googlecaptcha\Helper\Data $helperData
     */
    public function __construct(Context $context, StoreManagerInterface $storeManager, Data $helperData)
    {        
        $this->_storeManager = $storeManager;
        $this->_helperData = $helperData;
        parent::__construct($context);
    }
    
    /**
     * The recaptcha site enabled.
     *
     *
     * @return string
     */
	public function isEnabled()
    {
        return $this->_helperData->isEnabled();
    }
    
    /**
     * The recaptcha site url.
     *
     *
     * @return string
     */
    public function getCaptchaUrl()
    {
        return $this->_helperData->getCaptchaUrl();
    }
}