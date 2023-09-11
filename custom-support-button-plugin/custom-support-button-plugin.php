<?php
/*
Plugin Name: Custom Support Button
Description: Add a custom support button to your posts.
Version: 1.0
Author: Iro
*/

// カスタムサポートボタンのショートコードを定義
function custom_support_button($atts) {
    // ショートコードの属性を設定
    $atts = shortcode_atts(
        array(
            'count' => true, // カウントを表示するかどうか
        ),
        $atts
    );

    // サポートボタンのHTMLを生成
    $output = '<div class="custom-support-button">';
    $output .= '<button class="support-button">' . esc_html__('応援してるよ', 'custom-support-button-domain') . '</button>';

    // カウントを表示する場合はカウントを追加
    if ($atts['count']) {
        $output .= '<span class="support-count">0</span>';
    }

    // ユーザーに表示される感謝メッセージの領域を追加
    $output .= '<span class="thank-you-message"></span>';
    $output .= '</div>';

    return $output;
}
add_shortcode('support_button', 'custom_support_button'); // [support_button] ショートコードを登録

// スタイルシートとスクリプトをエンキューする関数を定義
function custom_support_button_enqueue_scripts() {
    // スタイルシートをエンキュー
    wp_enqueue_style('custom-support-button-style', plugin_dir_url(__FILE__) . 'css/style.css');

    // JavaScriptをエンキュー
    wp_enqueue_script('custom-support-button-script', plugin_dir_url(__FILE__) . 'js/script.js', array('jquery'), '1.0', true);

    // JavaScriptに渡す変数をローカライズ
    wp_localize_script('custom-support-button-script', 'custom_support_button_vars', array(
        'thank_you_message' => "応援ありがとうございます!\n励みになります！"
    ));
}
add_action('wp_enqueue_scripts', 'custom_support_button_enqueue_scripts'); // スクリプトとスタイルをエンキューするアクションを登録
