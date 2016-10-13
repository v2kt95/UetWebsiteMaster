<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nhập đơn từ theo mẫu</title>
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css_uet/style_form.css" />
    
</head>                                                                                                                                                                                                                          
<?php
/**
 * Template Name: input field
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
            <div class="content" border="1">
                <form method="post" style=" margin-top: -50px;">
                <?php   
                function my_mb_ucfirst($str) {
                    $fc = mb_strtoupper(mb_substr($str, 0, 1));
                    echo $fc.mb_substr($str, 1);
                }
                        $selectOption = $_GET['id'];                       
                        if($selectOption != 0){
                            $forms1 =  $wpdb->get_results("SELECT * FROM wp_form WHERE id = '$selectOption' AND status ='1'");
                ?>
                        <div class="panel">
                            <div class="panel-heading" ><strong><?php $formName = $forms1[0]->formName; echo my_mb_ucfirst($formName) ?></strong></div><br/>
                                <div class="input-left" style="width:440px;">
                            <?php
                                global $wpdb;
                                $fields1 =  $wpdb->get_results("SELECT * FROM wp_field WHERE formid = '$selectOption' AND status ='1'");
                                $j = 0;
                                for($i = 0; $i < round(count($fields1)/2); $i++){
                            ?>                           
                                        <div class="panel-body">
                                            <div class="form-group has-primary">
                                                <label for="content"><?php  $content = $fields1[$i]->content; echo my_mb_ucfirst($content) ?>: </label>
                                                <input name="<?php echo $fields1[$i]->id?>" type="text" class="form-control" id="inputSuccess" style =" border: solid 0.1px #e0e0d1;">
                                            </div>
                                        </div>
        <?php                       
                                $j ++;   
                            }
        ?>
                            </div>
                            <div class="input-right" style="width:440px;">   
        <?php
                            for($k = $j; $k < count($fields1); $k++){
        ?>             
                                    <div class="panel-body">
                                        <div class="form-group has-primary">
                                            <label for="content"><?php $content = $fields1[$k]->content; echo my_mb_ucfirst($content) ?>: </label>
                                            <input name="<?php echo $fields1[$k]->id?>" type="text" class="form-control" id="inputSuccess" style =" border: solid 0.1px #e0e0d1;">          
                                        </div>
                                    </div>
        <?php                         
                            }
        ?>                  </div>
                            <div style="clear:both"></div>

                            <div>
                                <!-- <button name="submit" class="btn-submit btn-danger btn-lg" type="submit">GỬI ĐƠN</button> -->
                                <button type="submit" class="btn-submit btn-danger btn-lg" data-toggle="modal" data-target="#myModal">GỬI ĐƠN</button>
                            </div>
                        </div>
                                    
                <?php
                        }
                ?>
                    <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                <!-- Modal content-->
                                    <div class="modal-content" style="height:115px;width: 60%;margin-left: 100px;" >
                                        <div style="text-align:center;margin-top:10px">
                                            <strong >Chúc mừng bạn đã gửi đơn thành công !!!</strong>
                                        </div>
                                        <hr/>
                                            <button type="submit" style="float:right;margin-right:50px;width: 70px" name="confirm" style="color:#337ab7;font-weight:bold" class="btn btn-success">ĐÓNG</button>
                                    </div>

                                </div>
                        </div>
                </form> 
                
                <?php if (isset($_POST['confirm'])){
                    $totalIdField = $wpdb->get_var( "SELECT COUNT(`id`) FROM `wp_form_submit_field`" ); 
                    $totalIDform = $wpdb->get_var( "SELECT COUNT(`id`) FROM `wp_form_submit`" ); 
                    $fields = $wpdb->get_results ( "SELECT * FROM wp_field" );
                    $today = date("Y-m-d");
                    $stt = 1;
                    foreach ($fields as $fld){
                        $inputContent = $_POST["$fld->id"];
                        if(($fld->status == 1) && ($inputContent != "") && ($stt == 1)){
                            $totalIDform ++;
                            $wpdb->query("INSERT INTO wp_form_submit (id, form_id) VALUES ('$totalIDform','$fld->formid')");
                            $stt ++;                        
                        }

                        if(($fld->status == 1) && ($inputContent != "")){
                            $totalIdField++;  
                            $wpdb->query("INSERT INTO wp_form_submit_field (id, field_id, form_submit_id,content,date_create) VALUES ('$totalIdField','$fld->id','$totalIDform','$inputContent', '$today')");
                        }
                    }
                ?>
                    <script type="text/javascript">
                        // alert("Gửi đơn thành công!!!!")
                        window.location = "http://42.113.4.215:8888/uetdemo/don-tu/";

                    </script>

                <?php
                }
                ?>
            </div>
        <!-- </div> -->
    </div>
</body>
<?php 
    get_footer(); 
?>
</html>
