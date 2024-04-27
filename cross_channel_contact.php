<?php

defined('BASEPATH') or exit('No direct script access allowed');

/*
Module Name: Cross Channel Contact
Description: Module For Perfex CRM
Version: 1.0.0
Requires at least: 1.0.*
*/


define('CROSS_CHANNEL_CONTACT_MODULE_NAME', 'cross_channel_contact');

hooks()->add_action('admin_init', 'cross_channel_contact_init_menu_items');
hooks()->add_action('customers_navigation_end', 'customers_navigation_cross_channel_contact');

/**
 * Register activation module hook
 */
register_activation_hook(CROSS_CHANNEL_CONTACT_MODULE_NAME, 'cross_channel_contact_activation_hook');

function cross_channel_contact_activation_hook()
{
    $CI = &get_instance();
    require_once(__DIR__ . '/install.php');
}

/**
 * Register language files, must be registered if the module is using languages
 */
register_language_files(CROSS_CHANNEL_CONTACT_MODULE_NAME, [CROSS_CHANNEL_CONTACT_MODULE_NAME]);

/**
 * Init backup module menu items in setup in admin_init hook
 * @return null
 */
function cross_channel_contact_init_menu_items()
{
    /**
     * If the logged in user is administrator, add custom menu in Setup
     */
    if (is_admin()) {

        $CI = &get_instance();
        $CI->app_menu->add_sidebar_menu_item('cross_channel_contact_menu', [
            'name'     => _l('Cross Channel'),
            'href'     => admin_url('cross_channel_contact'),
            'icon'     => 'fa fa-arrows-alt',
            'position' => 5,
        ]);

        if (has_permission('cross_channel_contact_menu_dashboard', '', 'view')) {
            $CI->app_menu->add_sidebar_children_item('cross_channel_contact_menu', [
                'slug' => 'cross_channel_contact_menu-dashboard',
                'name' => _l('Dashboard'),
                'icon' => 'fa fa-home',
                'href' => admin_url('cross_channel_contact/dashboard'),
                'position' => 1,
            ]);
        }

        if (has_permission('cross_channel_contact_menu_debug_webhook', '', 'view')) {
            $CI->app_menu->add_sidebar_children_item('cross_channel_contact_menu', [
                'slug' => 'cross_channel_contact_menu-debug_webhook',
                'name' => _l('Debug Webhook'),
                'icon' => 'fa fa-home',
                'href' => admin_url('cross_channel_contact/debug_webhook'),
                'position' => 1,
            ]);
        }

    }
}

function customers_navigation_cross_channel_contact()
{
    echo '<li><a href="' . admin_url('cross_channel_contact/cross_channel_contact_client') . '">' . _l('cross_channel_contact_menu') . '</a></li>';
}
