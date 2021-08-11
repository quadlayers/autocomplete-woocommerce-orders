<?php

/**
 * ACO Admin
 *
 * @author   LiamMcArthur
 * @category ACO
 * @package  Autocomplete Woocommerce Orders
 * @since    1.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class ACO_Admin
{
    public $id = 'silkwave_aco';

    function __construct()
    {
        if (is_admin()) {
            //add settings tab
            add_filter('woocommerce_settings_tabs_array', array(
                $this,
                'silkwave_woocommerce_settings_tabs_array'
            ), 50);
            //show settings tab
            add_action('woocommerce_settings_tabs_' . $this->id, array(
                $this,
                'silkwave_show_settings_tab'
            ));
            //save settings tab
            add_action('woocommerce_update_options_' . $this->id, array(
                $this,
                'silkwave_update_settings_tab'
            ));
            //add tabs select field
            add_action('woocommerce_admin_field_' . $this->id, array(
                $this,
                'show_' . $this->id . '_field'
            ), 10);
            //save tabs select field
            add_action('woocommerce_update_option_' . $this->id, array(
                $this,
                'save_' . $this->id . '_field'
            ), 10);

            include_once(ACO_PLUGIN_DIR . 'controller/suggestions.php');
        }
        add_filter('woocommerce_payment_complete_order_status', array($this, 'silkwave_autocomplete_orders'), -1, 2);
    }

    public function silkwave_autocomplete_orders($order_status, $order_id)
    {

        $mode = get_option('wc_' . $this->id . '_mode');

        switch ($mode) {
            case 'off':
                $order_status = 'processing';
                break;
            case 'all':
            case 'paid':
                $order_status = 'completed';
                break;
            case 'virtual':
                $order = wc_get_order($order_id);

                if ($order && $order_status === 'processing' && in_array($order->get_status(), ['pending', 'on-hold', 'failed'], true)) {

                    $virtual = false;
                    $items = $order->get_items();

                    if (count($items) > 0) {
                        foreach ($items  as $item) {
                            if (is_callable([$item, 'get_product'])) {
                                $product = $item->get_product();
                            } elseif (is_callable([$order, 'get_product_from_item'])) {
                                $product = $order->get_product_from_item($item);
                            } else {
                                $product = null;
                            }

                            if (!$product->is_virtual()) {
                                $virtual = false;
                                break;
                            }
                            $virtual = true;
                        }
                    }
                    if ($virtual) {
                        $order_status = 'completed';
                    }
                }
                break;
        }
        return $order_status;
    }

    function silkwave_register_plugin_links($links, $file)
    {
        $base = plugin_basename(__FILE__);
        if ($file == $base) {
            $links[] = '<a href="admin.php?page=wc-settings&tab=silkwave_aco">' . __('Settings', 'autocomplete-woocommerce-orders') . '</a>';
        }

        return $links;
    }

    function silkwave_woocommerce_settings_tabs_array($settings_tabs)
    {
        $settings_tabs[$this->id] = __('Autocomplete Orders', 'autocomplete-woocommerce-orders');

        return $settings_tabs;
    }

    function silkwave_show_settings_tab()
    {

        $settings = $this->silkwave_get_settings();

        include_once dirname(__FILE__) . '/view/backend/page.php';
    }

    function silkwave_update_settings_tab()
    {
        woocommerce_update_options($this->silkwave_get_settings());
    }

    function silkwave_get_settings()
    {
        $settings = array(
            'section_title' => array(
                'name' => __('Autocomplete Orders', 'autocomplete-woocommerce-orders'),
                'type' => 'title',
                'desc' => 'Activate the plugin selecting one option from the menu',
                'id'   => 'wc_' . $this->id . '_section_title'
            ),
            'title'         => array(
                'name'     => __('Mode', 'autocomplete-woocommerce-orders'),
                'type'     => 'select',
                'desc'     => __('Specify how you want the plugin to work.', 'autocomplete-woocommerce-orders'),
                'desc_tip' => true,
                'default'  => 'off',
                'id'       => 'wc_' . $this->id . '_mode',
                'css'      => 'height:auto;',
                'options'  => array(
                    'off'     => 'Off',
                    'virtual' => 'Paid orders of virtual products only',
                    'paid'    => 'All paid orders of any product',
                    'all'     => 'Any order (paid or unpaid)',
                )
            ),
            'section_end'   => array(
                'type' => 'sectionend',
                'id'   => 'wc_' . $this->id . '_section_end'
            )
        );

        return apply_filters('wc_' . $this->id . '_settings', $settings);
    }
}

new ACO_Admin();

add_filter('silkwave_register_plugin_links', 'plugin_row_meta', 10, 2);
