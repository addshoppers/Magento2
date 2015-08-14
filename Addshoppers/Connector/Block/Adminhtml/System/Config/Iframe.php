<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

// @codingStandardsIgnoreFile

namespace Addshoppers\Connector\Block\Adminhtml\System\Config;

/**
 * Renderer for PayPal banner in System Configuration
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Iframe extends \Magento\Backend\Block\Template implements \Magento\Framework\Data\Form\Element\Renderer\RendererInterface
{
    /**
     * @var string
     */
    protected $_template = 'Magento_Paypal::system/config/fieldset/hint.phtml';

    /**
     * Render fieldset html
     *
     * @param \Magento\Framework\Data\Form\Element\AbstractElement $element
     * @return string
     */
    public function render(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
    	return '<iframe src="https://app.addshoppers.com/merchants" width="100%" height="480" style="border: 0px;"></iframe>'.
        '<br>'.
        '<div style="margin-top:20px; text-align:center;">'.
        '<a href="http://help.addshoppers.com" target="_blank">Help</a> | '.
        '<a href="http://addshoppers.com/privacy" target="_blank">Privacy Policy</a> | '.
        '<a href="http://addshoppers.com/terms" target="_blank">Terms & Conditions</a></div>';
    }
}
