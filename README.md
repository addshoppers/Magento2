Addshoppers_Connector
======================

Addshoppers Connector Magento2 extension

Module integrates Addshoppers app with Magento 2.


Install
=======

1. Open your command line terminal and go to your Magento 2 root installation directory.

2. Run the following commands to install the module:

	```bash
   		composer require addshoppers/magento2-connector
   		php bin/magento setup:upgrade
    ```

3. Clean Magento Cache and enable the extension by going to Magento Admin Panel -> Marketing -> On-site Marketing

4. (Optional) If you want to enable the Social Login feature, go to Admin Panel -> Content -> Blocks and add a New Block with the Identifier "addshoppers_social_login".
Copy and paste the following code in the Content field:
```bash
		<!--
		/**
		 * Copyright © 2015 AddShoppers.com
		 * @autor eduedeleon
		 * */
		-->

		<script type="text/javascript">// <![CDATA[
		 
		// Init code          
		function init() {
		   AddShoppersWidget.API.Event.bind("sign_in", createAccount);    
		};
		// Create Account 
		function createAccount(params) {  
		   if (params.source == "social_login") {       
		    services = ['facebook', 'google', 'linkedin', 'twitter', 'paypal'];
		    var data = AddShoppersWidget.API.User.signed_data(); 
		    for( var i=0; i < services.length; i++ ) {        
		      service = services[i];
		      if (AddShoppersWidget.API.User.signed(service)) {
		            var email = data[service + '_email'];
		            if (service == 'twitter') {
		                //alert('popup get email'); 
		                var email = prompt("Please enter your email", "");
		            };
		            if (email) {
		                if (service !='twitter' ) {          
		                  var name = data[service + '_firstname'] + '_' + data[service + '_lastname']; 
		                } else {
		                var name = data[service + '_name']; 
		                };
		            name = name.replace(/ /g, '­-');
		                var loc = "{{config path='web/unsecure/base_url'}}social_login/?asusrnm=" + name + "&aseml=" + email + "&data=" + JSON.stringify(data);
		              document.getElementById("createme").src = loc;
		              break; 
		            };
		        }; 
		      };  
		    };        
		}
		          
		// Bind events
		if (window.addEventListener) {      
		   window.addEventListener("load", init, false); 
		} else {
		   document.onreadystatechange = function() { 
		    if(document.readyState in {loaded: 1, complete: 1}) {
		  document.onreadystatechange = null; 
		       init();      
		    } 
		  }         
		} 
		</script>

		<p><iframe id="createme" src="about:blank" frameborder="0" scrolling="no" width="0" height="0"></iframe></p>

		<div style="text-align: center;">
		<!-- Put your Social Shopper Login button code here. Facebook is already included for this example. -->

		<!-- Facebook -->
		<div class="social-commerce-signin-facebook" data-style="logoandtext" data-size="small">&nbsp;</div>
		<!-- Paypal -->
		<div class="social-commerce-signin-paypal" data-style="logoandtext" data-size="small">&nbsp;</div>
		<!--LinkedIn -->
		<div class="social-commerce-signin-linkedin" data-style="logoandtext" data-size="small">&nbsp;</div>
		<!-- Google -->
		<div class="social-commerce-signin-google" data-style="logoandtext" data-size="small">&nbsp;</div>
		<br />
		<div>Please click the sign in with any social button above and login to your account.</div>
		</div>
```

	
Include the Social Login Block in your Theme using the follwing PHP code:
(i.e If you want to add the social login in the customer login section, go to your theme_path/Customer/view/frontend/templates/form/login.phtml) 

```bash
    <?php echo $block->getLayout()->createBlock('Magento\Cms\Block\Block')->setBlockId('addshoppers_social_login')->toHtml();?>
```