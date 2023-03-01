=== Autocomplete WooCommerce Orders ===
Contributors: quadlayers
Donate link: https://quadlayers.com/portfolio/woocommerce-autocomplete-orders/
Tags: WooCommerce, order, complete, virtual, autocomplete, sagepay, paypal, stripe
Requires at least: 4.7
Requires PHP: 5.6
Tested up to: 6.1
Stable tag: 3.0.4
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
WC requires at least: 4.7.0
WC tested up to: 7.4

Autocomplete your WooCommerce v2+/v3+ orders with ease.

== Presentation ==

[Premium](https://quadlayers.com/portfolio/woocommerce-autocomplete-orders/) | [Documentation](https://quadlayers.com/documentation/woocommerce-autocomplete-orders/) | [Community](https://www.facebook.com/groups/quadlayers/)

== Description ==
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
= The plugin is not working =
Please test the followings:
1. Navigate to WooCommerce > Settings > Autocomplete Orders and ensure that the mode under Autocomplete Orders is not set to off.
2. Navigate to WooCommerce > Settings > Checkout > PayPal and ensure that your "PayPal Email" is the primary email of your [PayPal Account](https://www.paypal.com/myaccount/settings/).
3. Activate [Payment Data Transfer](https://developer.paypal.com/docs/classic/products/payment-data-transfer/#get-started).

== Screenshots ==
1. Set the products as "Virtual" products
2. In your PayPal account browse "Seller preferences" under "Selling Tools"
3. Click on "Instant Payment Notifications"
4. Activate IPN notifications and insert the link as in the picture (using your own domain name)
5. Ensure that your main email is the same email you are using to receive payments
6. Browse WooCommerce > Settings > Extra Options
7. Pick the mode that suits you best

== Changelog ==

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
