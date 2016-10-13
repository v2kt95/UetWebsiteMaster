<?php

/**
 * Created by SublineText.
 * User: Vuongdz
 * Date: 8/12/2016
 * Time: 12:05 AM
 * Plugin Name: UET ajax
wp_re
 * Author URI:
 * Description: Đây là Plugin ajax dành riêng cho Đại học Công nghệ
 * Tags: UET
 * Version: 1.4
 */
global $uet_db_version;
$uet_db_version = '1.0';

add_action('plugins_loaded', 'ajax_uet');

wp_register_script('prefix_bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js');
wp_enqueue_script('prefix_bootstrap');

wp_register_style('prefix_bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');
wp_enqueue_style('prefix_bootstrap');


// wp_register_script('prefix_jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js');
// wp_enqueue_script('prefix_jquery');
function ajax_uet(){
    add_options_page( 'UET ajax Manager', 'UET ajax Manager', 'manage_options', 'my-unique-identifierseven', 'uet_ajax' );
}

function sb_add_javascript_admin_footer() 
{ ?>
    <script>
    (function($){
        var data = {
            'action': 'sb_test_ajax',
            'number': jQuery("#inp").val()
        };
         
        // Ke tu phien ban 2.8 thi ajaxurl luong duoc khai bao trong header va tro toi admin-ajax.php
        $.post(ajaxurl, data, function(response){
            alert('Du lieu duoc tra ve tu server: ' + response);
        });
    })(jQuery);
    </script> <?php
}

function sb_test_ajax_callback() {
    $number = $_POST['number'];
    // $number += 10;
    echo $number;
    die();
}

add_action('wp_ajax_sb_test_ajax', 'sb_test_ajax_callback');
add_action('admin_footer', 'sb_add_javascript_admin_footer');
function uet_ajax()
{	
	?>
	<input id="inp" type="text" value = "16"/>

	<?php
}
