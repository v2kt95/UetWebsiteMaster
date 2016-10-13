<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đơn từ | Biểu mẫu - Đại học công nghệ</title>
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css_uet/style_form.css" />
</head>  
<style type="text/css">
    .uet-a:active {
       color: blue;
    }
/*    a:visited {
        color:red;
    }*/
</style>                                                                                                                                                                                                                        
<?php
/**
 * Template Name: form page
 */

get_header(); 
?>
<body >
    <?php 
        global $wpdb;
            $forms = $wpdb->get_results( "SELECT * FROM wp_form");
    ?>
    <div class="contact-body">    
        <!-- <div class="contact-container"> -->
            <div class="content" border="1" style="margin-top: -35px;">
                <form method="post">
                    <div class="form-group ">
                        <label class="lbl-select" for="sel1">Danh sách đơn từ : </label></br/>
                            <?php 
                            function my_mb_ucfirst($str) {
                                $fc = mb_strtoupper(mb_substr($str, 0, 1));
                                echo $fc.mb_substr($str, 1);
                            }
                            foreach ($forms as $frm) {
                                $today = date("Y-m-d");
                                $startTime = $frm->startTime; //from db
                                $endTime = $frm->endTime;
                                
                                $today_time = strtotime($today);
                                $start_time = strtotime($startTime);
                                $end_time = strtotime($endTime);
                                if($frm->status == 1){      
                            ?>
                                <ul>
                                    <li>
                                        <a class="uet-a" href="uetdemo/nhap-truong-don-tu?id=<?php echo $frm->id;?>"><?php echo" ";$formName =  $frm->formName; echo my_mb_ucfirst($formName); ?></a>
                                    </li>
                                </ul>
                                    
                            <?php      
                                }  
                            }
                            ?>
                    </div>
                </form>
            </div>
        <!-- </div> -->
    </div>
</body>
<?php 
    get_footer(); 
?>
</html>
