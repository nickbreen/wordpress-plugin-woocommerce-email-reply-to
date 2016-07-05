<?php
/**
 * Plugin Name: WooCommerce email Reply-To
 * Version: 1.0.0
 * Description: Adds a Reply-To header to new_order emails using the customer's address.
 * Author: nickbreen
 * Author URI: https://github.com/nickbreen
 * Plugin URI: https://github.com/nickbreen/wordpress-plugin-woocommerce-email-reply-to
 * Text Domain: wordpress-plugin-woocommerce-email-reply-to
 * Domain Path: /languages.
 */
add_filter('woocommerce_email_headers', function ($headers, $email_id, $object) {
    if ('new_order' == $email_id && $object->billing_email) {
        $headers .= sprintf(
            "Reply-To: \"%s %s\" <%s>\r\n",
            $object->billing_first_name,
            $object->billing_last_name,
            $object->billing_email
        );
    }

    return $headers;
}, 10, 3);
