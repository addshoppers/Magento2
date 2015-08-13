<?php
/**
 * Copyright © 2015 AddShoppers.com
 * @autor eduedeleon
 * */
namespace Addshoppers\Connector\Block;

/**
 * AddShoppersConnector Page Block
 * Roi render block
 */
class Roi extends \Magento\Framework\View\Element\Template
{
   /**
     * @var \Magento\Checkout\Model\Session
     */
    protected $_checkoutSession;

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
        \Magento\Checkout\Model\Session $checkoutSession,
        \Addshoppers\Connector\Helper\Data $addshoppersConnectorData,
        array $data = []
    ) {
        parent::__construct($context, $data);

        $this->_checkoutSession          = $checkoutSession;
        $this->_addshoppersConnectorData = $addshoppersConnectorData;
    }

    /**
     * Render block html if AddShoppers Connector in enabled
     *
     * @return string
     */
    protected function _toHtml()
    {
        return $this->_addshoppersConnectorData->isAddshopperConnectorActive() ? parent::_toHtml() : '';
    }

    /**
     * @return \Magento\AddshoppersConnector\Helper\Data
     */
    public function getHelper()
    {
        return $this->_addshoppersConnectorData;
    }

    /**
     * Get order Id
     * @return String
     * @author edudeleon
     * @date   2015-08-07
     */
    public function getOrderId()
    {
        return $this->_checkoutSession->getLastRealOrderId();
    }

    /**
     * Get order amount (subtotal)
     * @return Float
     * @author edudeleon
     * @date   2015-08-07
     */
    public function getAmount()
    {
        //Get last order from session
        $order = $this->_checkoutSession->getLastRealOrder();
        return number_format($order->getSubtotal(), 2);
    }
}
