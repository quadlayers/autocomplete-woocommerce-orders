<?php
/**
 * ACO Admin.
 *
 * @author   LiamMcArthur
 *
 * @category ACO
 *
 * @since    1.0.0
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class ACO_Admin
{
    public $id = 'silkwave_aco';

    public function __construct()
    {
        if (is_admin()) {
            //add settings tab
            add_filter('woocommerce_settings_tabs_array', [
                $this,
                'silkwave_woocommerce_settings_tabs_array',
            ], 50);
            //show settings tab
            add_action('woocommerce_settings_tabs_'.$this->id, [
                $this,
                'silkwave_show_settings_tab',
            ]);
            //save settings tab
            add_action('woocommerce_update_options_'.$this->id, [
                $this,
                'silkwave_update_settings_tab',
            ]);
            //add tabs select field
            add_action('woocommerce_admin_field_'.$this->id, [
                $this,
                'show_'.$this->id.'_field',
            ], 10);
            //save tabs select field
            add_action('woocommerce_update_option_'.$this->id, [
                $this,
                'save_'.$this->id.'_field',
            ], 10);
        }
        add_action('init', [$this, 'silkwave_autocomplete_orders'], 0);
    }

    public function silkwave_autocomplete_orders()
    {
        $mode = get_option('wc_'.$this->id.'_mode');
        if ($mode == 'all') {
            add_action('woocommerce_thankyou', 'silkwave_autocomplete_all_orders');

            function silkwave_autocomplete_all_orders($order_id)
            {
                global $woocommerce;

                if (!$order_id) {
                    return;
                }
                $order = new WC_Order($order_id);
                $order->update_status('completed');
            }
        } elseif ($mode == 'paid') {
            add_filter('woocommerce_payment_complete_order_status', 'silkwave_autocomplete_paid_orders', 10, 2);

            function silkwave_autocomplete_paid_orders($order_status, $order_id)
            {
                $order = new WC_Order($order_id);
                if ($order_status == 'processing' && ($order->get_status() == 'on-hold' || $order->get_status() == 'pending' || $order->get_status() == 'failed')) {
                    return 'completed';
                }

                return $order_status;
            }
        } elseif ($mode == 'virtual') {
            add_filter('woocommerce_payment_complete_order_status', 'silkwave_autocomplete_paid_virtual_orders', 10, 2);

            function silkwave_autocomplete_paid_virtual_orders($order_status, $order_id)
            {
                $order = new WC_Order($order_id);
                if ('processing' == $order_status && ('on-hold' == $order->get_status() || 'pending' == $order->get_status() || 'failed' == $order->get_status())) {
                    $virtual_order = null;
                    if (count($order->get_items()) > 0) {
                        foreach ($order->get_items() as $item) {
                            if ('line_item' == $item['type']) {
                                if (defined('WOOCOMMERCE_VERSION') && version_compare(WOOCOMMERCE_VERSION, '3.0', '<')) {
                                    $_product = $order->get_product_from_item($item);
                                } else {
                                    $_product = $item->get_product();
                                }
                                if (!$_product->is_virtual()) {
                                    $virtual_order = false;
                                    break;
                                } else {
                                    $virtual_order = true;
                                }
                            }
                        }
                    }
                    if ($virtual_order) {
                        return 'completed';
                    }
                }

                return $order_status;
            }
        }
    }

    public function silkwave_register_plugin_links($links, $file)
    {
        $base = plugin_basename(__FILE__);
        if ($file == $base) {
            $links[] = '<a href="admin.php?page=wc-settings&tab=silkwave_aco">'.__('Settings', 'wcAutocompleteOrders').'</a>';
        }

        return $links;
    }

    public function silkwave_woocommerce_settings_tabs_array($settings_tabs)
    {
        $settings_tabs[$this->id] = __('Autocomplete Orders', 'wcAutocompleteOrders');

        return $settings_tabs;
    }

    public function silkwave_show_settings_tab()
    {
        woocommerce_admin_fields($this->silkwave_get_settings());
    }

    public function silkwave_update_settings_tab()
    {
        woocommerce_update_options($this->silkwave_get_settings());
    }

    public function silkwave_get_settings()
    {
        $settings = [
            'section_title' => [
                'name' => __('Autocomplete Orders', 'wcAutocompleteOrders'),
                'type' => 'title',
                'desc' => 'Activate the plugin selecting one option from the menu',
                'id'   => 'wc_'.$this->id.'_section_title',
            ],
            'title'         => [
                'name'     => __('Mode', 'wcAutocompleteOrders'),
                'type'     => 'select',
                'desc'     => __('Specify how you want the plugin to work.', 'wcAutocompleteOrders'),
                'desc_tip' => true,
                'default'  => 'off',
                'id'       => 'wc_'.$this->id.'_mode',
                'css'      => 'height:auto;',
                'options'  => [
                    'off'     => 'Off',
                    'virtual' => 'Paid orders of virtual products only',
                    'paid'    => 'All paid orders of any product',
                    'all'     => 'Any order (paid or unpaid)',
                ],
            ],
            'section_end'   => [
                'type' => 'sectionend',
                'id'   => 'wc_'.$this->id.'_section_end',
            ],
        ];

        return apply_filters('wc_'.$this->id.'_settings', $settings);
    }
}

new ACO_Admin();

add_filter('silkwave_register_plugin_links', 'plugin_row_meta', 10, 2);
