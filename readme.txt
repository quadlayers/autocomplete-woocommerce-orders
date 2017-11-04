=== Autocomplete WooCommerce Orders ===
Contributors: LiamMcArthur
Tags: WooCommerce, order, complete, virtual, autocomplete
Tested up to: 4.8
Stable tag: 3.2.0
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html

Autocomplete your WooCommerce orders with ease.

== Description ==
Install this plugin and automatically complete your WooCommerce orders automatically.
   
* Paid orders of virtual products only: orders containing "Virtual" products only will be completed upon successful payment.  
* All paid orders of any product: orders of any product (even physical) will be turned to "Completed" upon successful payment.  
* All orders: each and every order will turn to "Completed" irrespective of the payment status.
      
Please be aware that the third mode allows the customer to access the product immediately before the payment is completed.    

== Installation ==
1. Upload the plugin\'s folder to the `/wp-content/plugins/` directory or install it through the integrated plugin installer    
1. Activate the plugin through the \'Plugins\' menu in WordPress     
1. Navigate to WooCommerce > Settings > Extra Options in your Dashboard
1. Select from the dropdown how you want your orders to be autocompleted
1. Activate Payment Data Transfer from your seller preferences on PayPal and copy the identity token that will appear into WooCommerce > Settings > Checkout > PayPal > PayPal Identity Token.

== Frequently Asked Questions ==
= The plugin is not working =
Please test the followings:
1. Navigate to WooCommerce > Settings > Extra Options and ensure that the mode under Autocomplete Orders is not set to off.
2. Navigate to WooCommerce > Settings > Checkout > PayPal and ensure that your "PayPal Email" is the primary email of your [PayPal Account](https://www.paypal.com/myaccount/settings/).
3. Activate Payment Data Transfer from your [seller preferences](https://www.paypal.com/?cmd=_profile-website-payments&CALL_FORM_UPDATE=false) on PayPal and copy the identity token that will appear into WooCommerce > Settings > Checkout > PayPal > PayPal Identity Token.

= SSL Error =
An update that PayPal rolled out a few months ago introduced this issue in WooCommerce for many users. Please follow this thread and the recommendation enclosed: https://wordpress.org/support/topic/ssl-error-for-paypal/

== Screenshots ==
1. Set the products as "Virtual" products
2. In your PayPal account browse "Seller preferences" under "Selling Tools"
3. Click on "Instant Payment Notifications"
4. Activate IPN notifications and insert the link as in the picture (using your own domain name)
5. Ensure that your main email is the same email you are using to receive payments
6. Browse WooCommerce > Settings > Extra Options
7. Pick the mode that suits you best

== Changelog ==

= 1.0.0 =
* Initial release