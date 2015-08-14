<?php
/**
 * Copyright © 2015 AddShoppers.com
 * @autor eduedeleon
 * */
namespace Addshoppers\Connector\Block;

/**
 * AddShoppersConnector Page Block
 * Social login code block
 */
class Social extends \Magento\Framework\View\Element\Template
{
    /**
     * AddShoppers Connector data
     *
     * @var \Addshoppers\Connector\Helper\Data
     */
    protected $_addshoppersConnectorData = null;

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Addshoppers\Connector\Helper\Data $addshoppersConnectorData
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Addshoppers\Connector\Helper\Data $addshoppersConnectorData,
        array $data = []
    ) {
        $this->_addshoppersConnectorData = $addshoppersConnectorData;
        parent::__construct($context, $data);
    }

    /**
     * Render block html if AddShoppers Connector in enabled
     *
     * @return string
     */
    protected function _toHtml()
    {
        return ($this->getHelper()->isAddshopperConnectorActive() && $this->getHelper()->isSocialLoginEnabled()) ? parent::_toHtml() : '';
    }

    /**
     * @return \Magento\AddshoppersConnector\Helper\Data
     */
    public function getHelper()
    {
        return $this->_addshoppersConnectorData;
    }
   
}
