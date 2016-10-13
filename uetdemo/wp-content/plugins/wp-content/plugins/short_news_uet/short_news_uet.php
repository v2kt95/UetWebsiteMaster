<?php
/**
 * Created by PhpStorm.
 * User: Quy
 * Date: 26/09/2016
 * Time: 6:51 CH
 * Plugin Name: UET Short News
 * Author : Luong Van Quy K60CAC
 * Description: Đây là Plugin tạo tin vắn tắt dành riêng cho Đại học Công nghệ
 * Tags: UET
 * Version: 1.0
*/
add_action('plugins_loaded', 'add_option_short_news_uet');

function add_option_short_news_uet(){
    add_options_page('UET short news', 'UET short news', 'manage_options', 'my-unique-identifier', 'tao_custom_post_type');
}

function tao_custom_post_type(){
    if (!current_user_can('manage_options')) {
        wp_die(__('You do not have sufficient permissions to access this page'));
    }
    function tao_custom_post_type() {

        /*
         * Biến $args là những tham số quan trọng trong Post Type
         */
        $args = array(
            //Tham số cấu hình cho custom post type
        );

        register_post_type( 'slug-post-type' , $args ); //Cái slug-post-type rất quan trọng, bạn có thể đặt tùy ý nhưng không có dấu cách, ký tự,...

    }

    add_action( 'init', 'tao_custom_post_type' );
}

