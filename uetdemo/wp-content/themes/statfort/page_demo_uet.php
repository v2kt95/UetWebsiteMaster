<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Contact Form Template 2</title>
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css_uet/style_form.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/bootstrap_uet/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/bootstrap_uet/js/bootstrap.min.js" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css_uet/style_form.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

</head>
<!-- <style type="text/css"></style> -->                                                                                                                                                                                                                            
<?php
/**
 * Template Name: form page 2
 */
if(isset($_POST['Submitbtn'])){

}
get_header(); 
?>
<body>
    <?php 
        global $wpdb;
            $forms = $wpdb->get_results( "SELECT * FROM wp_form WHERE id= 13",OBJECT);
            $fields = $wpdb->get_results( "SELECT * FROM wp_field WHERE formid = 13 AND status = 1",OBJECT);
    ?>
    <h1><?php echo $forms[0]->formName ?></h1>
    <form id="frm">
    <?php
        for ($i=0; $i < count($fields); $i++) { 
            
    ?>
      <div class="form-group">
        <label for="email"><?php echo $fields[$i]->content ?></label>
        <input type="text" class="form-control" name="<?php echo $fields[$i]->id ?>"  >
      </div>
    <?php
    }
    ?>  
      <button class="btn btn-default" name="Submitbtn">Submit</button>
    </form>
</body>
<?php 
    get_footer(); 
?>
</html>