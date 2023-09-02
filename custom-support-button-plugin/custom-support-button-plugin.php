<?php
/*
Plugin Name: Custom Support Button
Description: Add a custom support button to your posts.
Version: 1.0
Author: Iro
*/

function custom_support_button($atts) {
    $atts = shortcode_atts(
        array(
            'count' => true,
        ),
        $atts
    );

    $output = '<div class="custom-support-button">';
    $output .= '<button class="support-button">' . esc_html__('応援してるよ', 'custom-support-button-domain') . '</button>';

    if ($atts['count']) {
        $output .= '<span class="support-count">0</span>';
    }
    $output .= '<span class="thank-you-message"></span>';
    $output .= '</div>';

    return $output;
}
add_shortcode('support_button', 'custom_support_button');

function custom_support_button_enqueue_scripts() {
    wp_enqueue_style('custom-support-button-style', plugin_dir_url(__FILE__) . 'css/style.css');
    wp_enqueue_script('custom-support-button-script', plugin_dir_url(__FILE__) . 'js/script.js', array('jquery'), '1.0', true);
    wp_localize_script('custom-support-button-script', 'custom_support_button_vars', array(
        'thank_you_message' => "応援ありがとうございます!\n励みになります！"
    ));
}
add_action('wp_enqueue_scripts', 'custom_support_button_enqueue_scripts');




