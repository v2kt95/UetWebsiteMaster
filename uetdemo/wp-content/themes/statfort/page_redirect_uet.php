<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tin tức văn tắt - Đại Học Công Nghệ</title>
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css_uet/style_contact.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/bootstrap_uet/css/bootstrap.min.css" />
</head>
<style type="text/css">
    table, tr, th, td{
        border: none !important;
        cellspacing="-2px";
        cellpadding="-2px";
    }
</style>
<?php
/**
 * Template Name: Tin van tat
 */

get_header();
?>

<body>
<?php
global $wpdb;
$result = $wpdb->get_results("SELECT * FROM wp_posts", OBJECT);?>
<div class="container" style="font-family:'Roboto', sans-serif;width:85%">
    <?php
         // code phan trang 
        $tmp = $result;
        $total = 0;
        for($m = 0;  $m <count($result);$m++){
            $field = get_field('enter', $result[$m]->ID);
            if(!empty($field)){
                $tmp[$total] = $result[$m];
                $total++;
            }
        }

        $pagenum = isset( $_GET['pagenum'] ) ? absint( $_GET['pagenum'] ) : 1;
        $limit = 10; // number of rows in page
        $offset = ( $pagenum - 1 ) * $limit; 
        $num_of_pages = ceil( $total / $limit );           
        for($j = $offset; $j < $offset + $limit; $j++){
            $field = get_field('enter', $tmp[$j]->ID);
            if(!empty($field)){
            ?>
                <article style="border-bottom: 1px solid #e9e9e9;height: 150px;padding: 0 0 22px 0;margin-bottom: 25px;">
                <figure style="float: left; width: 200px; overflow: hidden">
                    <a href="<?php echo $field ?>">
                        <img src="<?= wp_get_attachment_url( get_post_thumbnail_id($tmp[$j]->ID) ); ?>" alt="dai-hoc-cong-nghe" alt="">
                    </a>
                    <figcaption>
                        <a class="btnreadmore bgcolr" href="<?php echo $field ?>"><em class="fa fa-long-arrow-right"><?= $tmp[$j]->post_title; ?></em></a>
                    </figcaption>
                </figure>

                <div class="blog_text webkit">
                   <div class="text" style=" margin-left: 230px;">
                        <h2 class="heading-color cs-post-title"><a href="<?php echo $field ?>" class="colrhvr"><?= $tmp[$j]->post_title; ?></a></h2>
                        <ul class="post-options">
                        <li><i class="fa fa-calendar"></i><time datetime="01-01-70"><?php $dat = new Datetime($tmp[$j]->post_date); echo $dat->format('Y-m-d'); ?></time></li>
                        <li><i class="fa fa-list"></i><a href="http://1.53.148.29:8888/uetdemo/category/tin-van-tat/" rel="tag">Tin vắn tắt</a></li>
                        <li><i class="fa fa-comment"></i><a href="">Comment</a></li></ul>
                        <p><?php echo $tmp[$j]->post_title; echo'....  ' ?><a href="<?php echo $field ?>" class="cs-read-more colr"> read more</a></p>
                    </div>             
                </div>
                </article>
            
        <?php 
            }
        } ?>
        <div style="float:right">
             <ul class="pagination">
                 <li><a class="page-link" style="margin-left: 3px"  href="/uetdemo/tin-van-tat/?pagenum=1" aria-hidden="true" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>   
                <?php 
                    for($k= 0; $k < $num_of_pages; $k++ ){
                ?>
                    <li >
                        <a class = "number-page" style="margin-left: 3px" href="/uetdemo/tin-van-tat/?pagenum=<?=($k+1)?>">
                            <?php echo ($k+1)?>
                        </a>
                    </li>
                <?php       
                    }
                echo '<li><a class="page-link" style="margin-left: 3px"  href="/uetdemo/tin-van-tat/?pagenum='.$num_of_pages.'" aria-hidden="Next" aria-label="Previous"><span aria-hidden="true">&raquo;</span></a>'
                ?>

            </ul>
        </div>
    </div>

</body>
<?php
get_footer();
?>
</html>