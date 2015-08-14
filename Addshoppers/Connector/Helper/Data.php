<?php
/**
 * Copyright © 2015 AddShoppers.com
 * @autor eduedeleon
 * */
namespace Addshoppers\Connector\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * Config paths for using throughout the code
     */
    const XML_PATH_ACTIVE       = 'addshoppers_connector/account_settings/active';
    const XML_PATH_API_KEY      = 'addshoppers_connector/account_settings/api_key';
    const XML_PATH_SHOP_ID      = 'addshoppers_connector/account_settings/shop_id';
    const XML_PATH_SOCIAL_LOGIN = 'addshoppers_connector/account_settings/social_login';

    /**
     * Verify if module is active
     *
     * @param null|string|bool|int|Store $store
     * @return bool
     */
    public function isAddshopperConnectorActive($store = null)
    {
        return $this->scopeConfig->isSetFlag(self::XML_PATH_ACTIVE, \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $store);
    }

    /**
     * Get Api Key
     * @return String
     * @author edudeleon
     * @date   2015-08-07
     */
    public function getApiKey()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_API_KEY,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Get Shop Id
     * @return String
     * @author edudeleon
     * @date   2015-08-07
     */
    public function getShopId()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_SHOP_ID,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Verify if Social login is enabled
     * @return boolean
     * @author edudeleon
     * @date   2015-08-10
     */
    public function isSocialLoginEnabled(){
        return $this->scopeConfig->getValue(
            self::XML_PATH_SOCIAL_LOGIN,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
}