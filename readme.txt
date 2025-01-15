=== Autocomplete WooCommerce Orders ===
Contributors: quadlayers
Donate link: https://quadlayers.com/products/woocommerce-autocomplete-orders/
Tags: WooCommerce, Order Autocomplete, Virtual Products, Payment Integration
Requires at least: 4.7
Requires PHP: 5.6
Tested up to: 6.7
Stable tag: 3.3.8
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
WC requires at least: 4.0
WC tested up to: 9.5

Enhance your WooCommerce store with Autocomplete Orders. Automatically complete orders after payment, perfect for virtual goods and subscriptions.

== Description ==

Enhance your WooCommerce store's efficiency with the Autocomplete WooCommerce Orders plugin. Automatically set orders to "Completed" upon payment confirmation, streamlining your sales process and reducing administrative overhead. Ideal for stores handling virtual goods, subscriptions, or any physical products.

[Premium](https://quadlayers.com/products/woocommerce-autocomplete-orders/) | [Documentation](https://quadlayers.com/documentation/woocommerce-autocomplete-orders/) | [Community](https://www.facebook.com/groups/quadlayers/)

== Presentation ==
Install this plugin and automatically complete your WooCommerce orders automatically. This plugin is compatible with WooCommerce 2 and 3+ and works with all major payment providers including PayPal, SagePay and Stripe.

* Paid orders of virtual products only: orders containing "Virtual" products only will be completed upon successful payment.
* All paid orders of any product: orders of any product (even physical) will be turned to "Completed" upon successful payment.
* All orders: each and every order will turn to "Completed" irrespective of the payment status.

Please note that enabling this plugin against all orders can allow the user to access the product before it has been paid for.

== Installation ==
1. Upload the plugin\'s folder to the `/wp-content/plugins/` directory or install it through the plugin installer
2. Activate the plugin through the \'Plugins\' menu in WordPress
3. Navigate to WooCommerce > Settings > Autocomplete Orders in your Dashboard
4. Select from the dropdown how you want your orders to be autocompleted
5. Activate Payment Data Transfer from your seller preferences on PayPal and copy the identity token that will appear into WooCommerce > Settings > Checkout > PayPal > PayPal Identity Token.

== WooCommerce Autocomplete Orders Premium ==

The premium version of WooCommerce Autocomplete Orders plugin offer you a wide range of extra features that allows a full controll of the autocomplete orders process.

> * Autocomplete orders for Direct bank transfer payment method
> * Autocomplete orders for Check payments method
> * Autocomplete orders for Cash on delivery payment method
> * Autocomplete orders for Cash on delivery orders with downloadable products

== Frequently Asked Questions ==
= Why isn't the plugin working? =
Please test the followings:
1. Navigate to WooCommerce > Settings > Autocomplete Orders and ensure that the mode under Autocomplete Orders is not set to off.
2. Navigate to WooCommerce > Settings > Checkout > PayPal and ensure that your "PayPal Email" is the primary email of your [PayPal Account](https://www.paypal.com/myaccount/settings/).
3. Activate [Payment Data Transfer](https://developer.paypal.com/docs/classic/products/payment-data-transfer/#get-started).
= What payment gateways are supported by this plugin? =
The plugin supports all major payment gateways that are compatible with WooCommerce. However, this plugin will only complete paid orders of the gateways that call the `woocommerce_payment_complete()` or `$order->payment_complete()` methods. Most payment methods, like PayPal and credit cards, will trigger this action. Since shipping and access to the products shouldn’t happen until payment is received, orders that haven’t been paid won’t be automatically completed. This means our plugin won’t automatically complete an order if your gateway is unable to recognize when a payment has been received.

== Screenshots ==
1. Set the products as "Virtual" products
2. In your PayPal account browse "Seller preferences" under "Selling Tools"
3. Click on "Instant Payment Notifications"
4. Activate IPN notifications and insert the link as in the picture (using your own domain name)
5. Ensure that your main email is the same email you are using to receive payments
6. Browse WooCommerce > Settings > Extra Options
7. Pick the mode that suits you best

== Changelog ==

= 3.3.8 =
* WooCommerce compatibility

= 3.3.7 =
* WooCommerce compatibility

= 3.3.6 =
* WooCommerce compatibility

= 3.3.5 =
* WooCommerce compatibility

= 3.3.4 =
* Update dependencies 

= 3.3.3 =
* WooCommerce compatibility

= 3.3.2 =
* WooCommerce compatibility

= 3.3.1 =
* WooCommerce compatibility

= 3.3.0 =
* WooCommerce compatibility

= 3.2.1 =
* WooCommerce compatibility

= 3.2.0 =
* WooCommerce compatibility

= 3.1.9 =
* FIx PHP errors

= 3.1.8 =
* WooCommerce compatibility

= 3.1.7 =
* WooCommerce compatibility

= 3.1.6 =
* Update portfolio link

= 3.1.4 =
* WooCommerce compatibility

= 3.1.3 =
* WooCommerce compatibility
* WordPress compatibility

= 3.1.2 =
* WooCommerce compatibility

=  3.1.1 = 
* WooCommerce HPOS compatibility
* WooCommerce COT compatibility

= 3.1.0 =
* PHP errors

= 3.0.9 =
* WooCommerce compatibility

= 3.0.8 =
* WooCommerce compatibility

= 3.0.6 =
* WooCommerce compatibility

= 3.0.5 =
* Composer packages update

= 3.0.4 =
* Composer packages update

= 3.0.3 =
* Composer packages update
* Language package update

= 3.0.2 =
* Composer packages update
* WooCommerce compatibility

= 3.0.0 =
* Refactor

= 2.0.3 =
* WooCommerce compatibility

= 2.0.2 =
* WooCommerce compatibility

= 2.0.1 =
* WooCommerce compatibility

= 2.0.0 =
* Premium compatibility

= 1.6.1 =
* WordPress compatibility

= 1.6.0 =
* WooCommerce compatibility

= 1.5.9 =
* WooCommerce compatibility

= 1.5.8 =
* WooCommerce compatibility

= 1.5.7 =
* WooCommerce compatibility

= 1.5.6 =
* WooCommerce compatibility

= 1.5.5 =
* Fixed php error

= 1.5.4 =
* WooCommerce compatibility

= 1.5.2 =
* QuadLayers dashboard widget

= 1.5.1 =
* WordPress compatibility

= 1.5.0 =
* WordPress compatibility

= 1.4.9 =
* WordPress compatibility

= 1.4.7 =
* WordPress compatibility

= 1.4.6 =
* WordPress compatibility

= 1.4.5 =
* WordPress compatibility

= 1.4.4 =
* QuadLayers widget cache

= 1.4.3 =
* WordPress compatibility

= 1.4.2 =
* WordPress compatibility

= 1.4.1 =
* New Telegram add to suggestions tab

= 1.4.0 =
* Fixed php error

= 1.3.9 =
* QuadLayers dashboard widget

= 1.3.8 =
* WordPress compatibility

= 1.3.7 =
* WooCommerce compatibility

= 1.3.6 =
* WooCommerce compatibility

= 1.3.5 =
* WooCommerce compatibility

= 1.3.4 =
* Fixed i18n

= 1.3.3 =
* Fixed i18n

= 1.3.2 =
* New documentation links

= 1.3.1 =
* Fixed bug where plugin didn't recognise 'off' mode

= 1.3.0 =
* Re-worked entire module to make automatically completing orders much more streamlined

= 1.2.2 =
* Added logic back in for automatically completing Virtual orders

= 1.2.1 =
* Reverted some core logic. It looks like this isn't working for some other gateways. A fix has also been pushed for Virtual orders

= 1.2.0 =
* Altered logic to make sure that only paid (processing/completed) orders are marked

= 1.1.0 =
* Minor information updates and compatibility checks

= 1.0.0 =
* Initial release
