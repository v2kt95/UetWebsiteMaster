<?php
/**
 * Created by SublineText.
 * User: Vuongdz
 * Date: 8/12/2016
 * Time: 12:05 AM
 * Plugin Name: UET Static
wp_re
 * Author URI:
 * Description: Đây là Plugin thống kê dành riêng cho Đại học Công nghệ
 * Tags: UET
 * Version: 1.4
 */
global $uet_db_version;
$uet_db_version = '1.0';
add_action('plugins_loaded', 'static_uet');
 wp_register_script('prefix_bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js');
 // wp_register_script('prefix_bootstrap', 'wp-content/plugins/uet_survey/bootstrap/js/bootstrap.min.js');
 wp_enqueue_script('prefix_bootstrap');
 wp_register_style('prefix_bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');
 // wp_register_style('prefix_bootstrap', 'wp-content/plugins/uet_survey/bootstrap/css/bootstrap.min.css');
 wp_enqueue_style('prefix_bootstrap');
 // wp_register_script('prefix_jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js');
 // wp_enqueue_script('prefix_jquery');


function static_uet(){
    add_options_page( 'UET Static', 'UET Static', 'manage_options', 'my-unique-identifiersix', 'uet_static' );
}
function getAnswerStatic($qid){
    global $wpdb;
    $answers =  $wpdb->get_results("SELECT * FROM wp_answer WHERE surveyquestionid = '$qid' ", OBJECT);
    return $answers;
}
function countAnswerSubmit($ansid){
    global $wpdb;
    $submitCount= $wpdb->get_var( "SELECT COUNT(answer_id) AS answersubmit FROM wp_survey_submit_answer WHERE answer_id= '$ansid' ");
    return $submitCount;
}
function getGroupStarttimeEndtime(){
    global $wpdb;
    $times =  $wpdb->get_results("SELECT * FROM `wp_surveyquestion` GROUP BY startTime,endTime ",OBJECT);
    return $times;
}
function uet_static()
{
    if (!current_user_can('manage_options')) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }
    global $wpdb;
    $questions =  $wpdb->get_results("SELECT * FROM wp_surveyquestion WHERE status = 1 ", OBJECT);
      //code php for set active or deactive each element and get all result 
    $question =  $wpdb->get_results("SELECT * FROM wp_surveyquestion WHERE id = 1 ", OBJECT);
     //code php for set active or deactive each element
    // echo $question[0]->contentquestion;
    $answers = getAnswerStatic(1);
    $times = getGroupStarttimeEndtime();
    // echo count($times);
    // echo "</br>"; 
    // echo $times[1]->startTime;
    // echo $times[1]->endTime;
    $max = 0;
    for ($i=0; $i < count($times); $i++) { 
        $starttime = $times[$i]->startTime;
        $endtime = $times[$i]->endTime;
        $countq = $wpdb->get_var( "SELECT COUNT(`id`) FROM `wp_surveyquestion` WHERE  startTime = '$starttime' AND endTime = '$endtime' " );
        if($countq > $max){
            $max = $countq;
        }
    }
?> 
    <!--code php for change many state of question -->
   

<!--code html and php for show data question and answer-->
<div style="margin-bottom: 50px;font-weight: bold;font-size: 16pt;font-family: 'Roboto', sans-serif; ">
    Thống kê câu hỏi khảo sát
</div>
<table class="wp-list-table widefat fixed striped pages"  style="width: 99%; ">
    <!-- <tr style="cursor: pointer;"> -->
    <th style="width:9%;color:#337ab7;">Thời gian</th>
    <th colspan="<?php echo $max ?>" style="text-align: center;color:#337ab7;">Câu hỏi</th>
    <?php
        for ($i=0; $i < count($times); $i++) { 
            $starttime = $times[$i]->startTime;
            $endtime = $times[$i]->endTime;
            $questions =  $wpdb->get_results("SELECT * FROM wp_surveyquestion WHERE startTime = '$starttime' AND endTime = '$endtime' ", OBJECT);
    ?>
    <tr id="tr<?php echo $i?>">
        <td style="color:#337ab7;">
            <label>StartTime : <?php echo $times[$i]->startTime ?></label>
            <label>EndTime : <?php echo $times[$i]->endTime ?></label>
        </td>
    <?php
            for ($j=0; $j < count($questions); $j++) {
               $answers = getAnswerStatic($questions[$j]->id); 
    ?>    



        <td style="text-align: center;color : #337ab7">
            <div class="panel panel-default">
              <div class="panel-heading" onclick="" style="color:#337ab7;"><label><?php echo $questions[$j]->contentquestion ?></label></div>
              <div class="panel-body" id="panel<?php echo $questions[$j]->id ?>" style="margin-bottom: -10px; padding: 5px">
    <?php
        $maxans = 0;
        for ($k=0; $k < count($answers); $k++) {
            if ($maxans < countAnswerSubmit($answers[$k]->id)) {
                $maxans = countAnswerSubmit($answers[$k]->id);
            }
        }
        for ($k=0; $k < count($answers); $k++) {
             $percent = (countAnswerSubmit($answers[$k]->id)/$maxans)*100; 
    ?> 
            <?php echo $answers[$k]->answer ?>
            <div class="container " style="width: 90%;display: table;table-layout: fixed;">
              <div class="progress" >
			  <?php if($percent == 0){?>
                <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="color: #32373c; width:<?php echo $percent ?>%";display: table-cell;">
                  <?php echo countAnswerSubmit($answers[$k]->id) ?>
			  <?php }else{ ?>
				  <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="color: white; width:<?php echo $percent ?>%";display: table-cell;">
				  <?php echo countAnswerSubmit($answers[$k]->id) ?>
			  <?php } ?>
                </div>
              </div>
            </div>
    <?php
            }
    ?>

              </div>
            </div>
        </td>
    <?php
            }
    ?>
    </tr>
    <?php
        }
    ?>
</table>
<!--code html and php for show data question and answer-->
<!--code javascript for all -->
<script>

 // jQuery(window).load(function() {
 //            jQuery(".panel-body").css("display", "none");
 //        });
</script>
<!--code javascript for all -->

<?php   
}
