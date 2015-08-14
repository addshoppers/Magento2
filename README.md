Addshoppers_Connector
======================

Addshoppers Connector Magento2 extension

Module integrates Addshoppers app with Magento 2


Install
=======

1. Go to Magento2 root folder

2. Download the package, unzip and move it inside magento_root/app/code/
   
3. In command line, go to magento_root folder and enter following commands to enable module:
	
    php bin/magento module:enable Addshoppers_Connector --clear-static-content
    php bin/magento setup:upgrade

4. Enable and configure Addshoppers Connector in Magento Admin under Stores/Configuration/Addshoppers

5. Create a block in admin panel with id "addshoppers_social_login" and include this block in your theme files using the  following php snippet:
    ```bash
    <?php echo $block->getLayout()->createBlock('Magento\Cms\Block\Block')->setBlockId('addshoppers_social_login')->toHtml();?>
    ```