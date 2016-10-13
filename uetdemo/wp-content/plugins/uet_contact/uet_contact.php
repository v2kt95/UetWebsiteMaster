<?php
/**
 * Created by PhpStorm.
 * User: LQuy
 * Date: 8/6/2016
 * Time: 12:05 AM
 * Plugin Name: UET Contact
wp_re
 * Author URI:
 * Description: Đây là Plugin contact form dành riêng cho Đại học Công nghệ
 * Tags: UET
 * Version: 1.4
 */
global $uet_db_version;
$uet_db_version = '1.0';
add_action('plugins_loaded', 'create_table');
add_action('plugins_loaded', 'contact_uet');
wp_register_script('prefix_bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js');
wp_enqueue_script('prefix_bootstrap');
wp_register_style('prefix_bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');
wp_enqueue_style('prefix_bootstrap');
// wp_register_script('prefix_jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js');
// wp_enqueue_script('prefix_jquery');
function create_table()
{
    global $wpdb;
    global $uet_db_version;
    $table_name = $wpdb->prefix . 'contact';
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE $table_name(
                  id INT(8) NOT NULL AUTO_INCREMENT,
                  name VARCHAR(50) NOT NULL,
                  email VARCHAR(50) NOT NULL,
                  content text NOT NULL,
                  status INT(8) NOT NULL DEFAULT 0,
                  UNIQUE KEY id(id)
                ) $charset_collate; ";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
    add_option('uet_db_version', $uet_db_version);
}
function contact_uet(){
    add_options_page( 'UET Contact', 'UET Contact', 'manage_options', 'my-unique-identifier', 'uet_contact' );
}
function display_status($status){
    if($status == 1) echo "đã duyệt";
    else echo "chưa duyệt";
}
function uet_contact()
{
    if (!current_user_can('manage_options')) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }
    global $wpdb;
    // if (isset($_GET['id'])) {
    //     $wpdb->query($wpdb->prepare("DELETE FROM wp_contact WHERE id = %d", $_GET['id']));
    // }
	if (isset($_POST['duyetbutton'])) {
	        $wpdb->query($wpdb->prepare("UPDATE wp_contact SET status = 1 WHERE id = %d", $_POST['holdid']));
	}

    $results = $wpdb->get_results('SELECT * FROM wp_contact', OBJECT);
?>

<form method="post" name="frm">

<div style="font-weight: bold;font-size:16pt;font-family: 'Roboto', sans-serif;">
    Quản Lý Thư Từ Thắc Mắc
</div><br>
<div class="table-responsive">
    <?php
         // code phan trang 
        $pagenum = isset( $_GET['pagenum'] ) ? absint( $_GET['pagenum'] ) : 1;
        $limit = 10; // number of rows in page           
        $offset = ( $pagenum - 1 ) * $limit; 
        $total = $wpdb->get_var( "SELECT COUNT(`id`) FROM `wp_contact`" );
        $num_of_pages = ceil( $total / $limit );
        $entries = $wpdb->get_results( "SELECT * FROM wp_contact LIMIT $offset, $limit" );
    ?>
    <table class="wp-list-table widefat fixed striped pages"  style="width:99%; font-weight:bold">
            <tr  style="color:#337ab7;font-size:12pt;border: solid 0.1px #f2f2f2;background-color: #fff">
                <th style="text-align:center;font-weight: normal;color : #337ab7;width:50px;">STT</th>
                <th style="text-align:center;font-weight: normal;color : #337ab7;width:150px;">Họ tên</th>
                <th style="font-weight: normal;color : #337ab7;text-align:center;">Địa chỉ email</th>
                <th style="text-align:center;font-weight: normal;color : #337ab7">Nội dung thư</th>
                <th style="text-align:center;font-weight: normal;color : #337ab7;width:150px;">Trạng thái</th>
                <th style="text-align:center;font-weight: normal;color : #337ab7;width:150px;">Chức năng</th>
                <th style="text-align:center;font-weight: normal;color : #337ab7;width:150px;">Trả lời</th>
            </tr>
        <?php
        $count = 0;
        $stt = 1;
        function my_mb_ucfirst($str) {
            $fc = mb_strtoupper(mb_substr($str, 0, 1));
            echo $fc.mb_substr($str, 1);
        }
        foreach($entries as $value){
            if($count % 2 != 0){
                echo '<tr style=" color: #337ab7; background-color:  #fff">';
            }
            else{
                echo '<tr style="; color: #337ab7; background-color: #f2f2f2">';
            }
            ?>
                <td style="width:50px;text-align:center;"><?= $value-> id ?></td>
                <td style="text-align:center;color : #337ab7"><?php $name = $value-> name; my_mb_ucfirst($name);?></td>
                <td style="text-align:center;color : #337ab7"><?= $value-> email?></td>
                <td style="text-align:center;color : #337ab7"><?= $value-> content?></td>
                <td style="width:150px;text-align:center;color : #337ab7"><?= display_status($value-> status) ?></td>

                <td style="text-align: center;"><input style="color : #337ab7;font-weight:bold;" type="submit" class="btn btn-default btn-md duyet<?php echo $value->status ?>" onclick="getidandreturn('<?php echo $value->id?>')" name="duyetbutton" value="Duyệt thư"/></td>

                <td style="width:150px;text-align:center;"><button type="button" class="btn btn-info btn-md" style="font-weight:bold;" data-toggle="modal" data-target="#myModal" onclick="dialog('<?php echo $value->name?>','<?php echo $value->email?>','<?php echo $value->content?>')" >Phản hồi</button></td>
            </tr>
            <?php
            $stt++;
            $count ++;
        }
        ?>
        <input type="hidden" id="holdid" name="holdid" value=""/>
        </table>
        <div class="pagination" style="float:right; margin-right:75px;">
        <li><a class="page-link" href="/uetdemo/wp-admin/admin.php?page=my-unique-identifier&pagenum=1" aria-hidden="true" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>
            <?php
                if($num_of_pages >2){
                    if($pagenum == 1){
                        echo '<li class="page-item" ><a class="page-link" style="margin-left:3px; background-color:#f2f2f2;" href="/uetdemo/wp-admin/admin.php?page=my-unique-identifier&pagenum=1">1</a></li>';
                        for($i = 2;$i<= 3; $i++)
                        {
                            echo '<li class="page-item" ><a class="page-link" style="margin-left:3px;" href="/uetdemo/wp-admin/admin.php?page=my-unique-identifier&pagenum='.$i.'">'.$i.'</a></li>';
                        }
                    }
                    elseif ($pagenum > 1 && $pagenum < $num_of_pages) {
                        for($i = $pagenum - 1;$i<= $pagenum+1; $i++)
                        {
                            if($i == $pagenum){
                                echo '<li class="page-item"><a class="page-link" style="margin-left:3px;background-color:#f2f2f2;" href="/uetdemo/wp-admin/admin.php?page=my-unique-identifier&pagenum='.$i.'">'.$i.'</a></li>';
                            }
                            else{
                                echo '<li class="page-item"><a class="page-link" style="margin-left:3px;" href="/uetdemo/wp-admin/admin.php?page=my-unique-identifier&pagenum='.$i.'">'.$i.'</a></li>'; 
                            }
                        }
                    }
                    else{
                        for($i = $pagenum - 2;$i<= $pagenum; $i++)
                        {
                            if($i == $pagenum){
                                echo '<li class="page-item"><a class="page-link" style="margin-left:3px;background-color:#f2f2f2;" href="/uetdemo/wp-admin/admin.php?page=my-unique-identifier&pagenum='.$i.'">'.$i.'</a></li>';
                            }
                            else{
                                echo '<li class="page-item"><a class="page-link" style="margin-left:3px;" href="/uetdemo/wp-admin/admin.php?page=my-unique-identifier&pagenum='.$i.'">'.$i.'</a></li>'; 
                            }
                        }
                    } 
                }
                else{
                    if($num_of_pages == 2){
                        for($i = 1; $i<= 2; $i++)
                        {
                            if($i == $pagenum){
                                echo '<li class="page-item"><a class="page-link" style="margin-left:3px;background-color:#f2f2f2;" href="/uetdemo/wp-admin/admin.php?page=my-unique-identifier&pagenum='.$i.'">'.$i.'</a></li>';
                            }
                            else{
                                echo '<li class="page-item"><a class="page-link" style="margin-left:3px;" href="/uetdemo/wp-admin/admin.php?page=my-unique-identifier&pagenum='.$i.'">'.$i.'</a></li>'; 
                            }
                        }  
                    }
                    else{
                        echo '<li class="page-item"><a class="page-link" style="margin-left:3px;background-color:#f2f2f2;" href="/uetdemo/wp-admin/admin.php?page=my-unique-identifier&pagenum=1">1</a></li>';
                    }
                }
                
                echo'<li ><a class="page-link" style="margin-left:3px;" href="/uetdemo/wp-admin/admin.php?page=my-unique-identifier&pagenum='.$num_of_pages.'" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>'; ?>
    </div>
</div>
</form>
    <script>
        jQuery(window).load(function() {
            jQuery(".duyet1").prop('disabled', true);
        });
	 	function getidandreturn(id){
            jQuery("#holdid").val(id);
        }
        function dialog(name,email,content){
            jQuery("#name").text(name);
            jQuery("#email").text(email);
            jQuery("#content").text(content);
            jQuery("#emailSender").val(email);
        }
    </script>
    <!-- Trigger the modal with a button -->
    
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" style="font-family:'Roboto', sans-serif;margin-left: 25px;margin-right: 25px;">
            <div style="font-size:13pt;font-weight:bold;color:#337ab7;text-align:center;margin-top: 10px;">Trả Lời Thư</div><br>
            <label style="color:#337ab7;font-weight:normal">Họ tên: 
                <span style = "font-weight:bold;margin-left: 20px;color:black"id= "name" class="modal-title"></span>
            </label><br>
            <label style="color:#337ab7;font-weight:normal">Địa chỉ email:
                <span style = "font-weight:bold;margin-left: 20px;color:black" id="email"></span>
            </label><br>
			
			
			
			<label style="color:#337ab7;font-weight:normal">Nội dung thư:
                <span style = "font-weight:bold;margin-left: 20px;color:black" id ="content" ></span>
            </label><br>
		  
			<div style="color:#337ab7;font-weight:bold; text-align:center;">Phản hồi</div>
			<label style="color:#337ab7;font-weight:normal">Nhập tiêu đề:</label>
                <textarea style="font-weight:bold;width:100% ;border-radius:4px;color:black" placeholder="Nhập tiêu đề" rows = 2 style="width:100%" name="mail_title"></textarea>
			
               
                <label style="color:#337ab7;font-weight:normal">Nội dung phản hồi</label>
                <textarea style="font-weight:bold;width:100% ;border-radius:4px;color:black" placeholder="Nhập nội dung" rows = 8 style="width:100%" name="send_content"></textarea>
            <div class="modal-footer">
			   <input type="submit" class="btn btn-default" name="send_email" value="Gửi" id="uet_send_email" style="color : #337ab7;font-weight:bold;"/>
               <button style="color : #337ab7;font-weight:bold;" type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
           </div>
           <input type="hidden" id="emailSender" name="emailSender" value=""/>
           </form>
        </div>
      </div>
    </div>
    <?php
    if(isset($_POST['send_email'])){
        $subject = $_POST['mail_title'];
        $body = $_POST['send_content'];
        $email = $_POST['emailSender'];
    ?>
    <?php
    require_once "Mail.php";
    ?>

    <?php
    $from = '<luongquy0810@gmail.com>';
    $to = $email;
//	echo $to;
//	die("Dung chuong trinh");
    $headers = array(
    'From' => $from,
    'To' => $to,
    'Subject' => $subject
);

$smtp = Mail::factory('smtp', array(
    'host' => 'ssl://smtp.gmail.com',
    'port' => '465',
    'auth' => true,
    'username' => 'haha08101997@gmail.com',
    'password' => 'Dell08101997'
));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
    echo('<p>' . $mail->getMessage() . '</p>');
} else {
    echo('<p>Message successfully sent!</p>');
}

?>

<?php
    }  
}
?>
