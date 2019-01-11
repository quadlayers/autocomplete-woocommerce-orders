[![StyleCI](https://github.styleci.io/repos/109495508/shield?branch=master)](https://github.styleci.io/repos/109495508)
# Autocomplete WooCommerce Orders
Autocomplete any paid orders by simply activating this plugin. If the user sucessfully purchases a product using a payment gateway such as PayPal or eBay, this plugin will automatically complete the order. Orders that are not paid (such as BACS, cheque etc) will be left untouched.

## How does it work?

* Paid orders of virtual products only: orders containing "Virtual" products only will be completed upon successful payment.  
* All paid orders of any product: orders of any product (even physical) will be turned to "Completed" upon successful payment.  
* All orders: each and every order will turn to "Completed" irrespective of the payment status.

## How do I install it?

1. Upload the plugin\'s folder to the `/wp-content/plugins/` directory or install it through the integrated plugin installer    
2. Activate the plugin through the \'Plugins\' menu in WordPress     
3. Navigate to WooCommerce > Settings > Extra Options in your Dashboard
4. Select from the dropdown how you want your orders to be autocompleted
5. Activate Payment Data Transfer from your seller preferences on PayPal and copy the identity token that will appear into WooCommerce > Settings > Checkout > PayPal > PayPal Identity Token.
