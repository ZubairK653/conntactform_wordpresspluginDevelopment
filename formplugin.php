<?php
    /* 
    Plugin Name: Contact Form Builder 
    Plugin URI: http://www.wordpress.org 
    Description: A plugin for creating contact forms
    Author: M Zubair
    Version: 1.0 
    Author URI: http://www.wordpress.org 
    */  

    if(!defined('ABSPATH')){
        header("Location: /PLUGINDEVELOPMENT");
        die();
    }

   function my_plugin_activation(){
    // Create tables in database

    global $wpdb, $table_prefix;
    $dg_form = $table_prefix.'dg_form';

    $q = "CREATE TABLE IF NOT EXISTS `$dg_form` ( `id` MEDIUMINT(10) NOT NULL AUTO_INCREMENT , `title` VARCHAR(50) NOT NULL ,
     `created_on` DATETIME NOT NULL , `updated_on` DATETIME NOT NULL , `status` TINYINT(10) NOT NULL , `is_trash` TINYINT(10) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";

    $wpdb->query($q);

    // Insert dummy data for testing

    $data = array(
      'id' => NULL,
      'title' => 'test1',
      'created_on' => '2022-04-12 18:10:41.000000',
      'updated_on' => '2022-04-12 18:10:41.000000',
      'status' => 1,
      'is_trash' => 0
    );
     $wpdb->insert($dg_form, $data);

   }

   register_activation_hook( __FILE__, 'my_plugin_activation' );

   function my_plugin_deactivation(){
    
     global $wpdb, $table_prefix;
     $dg_form = $table_prefix.'dg_form';
     
     // Remove the data from table on deactivation
     $q =  "TRUNCATE `$dg_form`";
     $wpdb->query($q);
   }
   register_deactivation_hook( __FILE__, 'my_plugin_deactivation' );

   // Plugin shortcode
   function dg_form_shortcode($atts){
    $atts = array_change_key_case((array) $atts,CASE_LOWER);
     $atts = shortcode_atts( array(
      'type' => 'img-gallery'
    ), $atts);
     
      include $atts['type'].'.php';
   }
   add_shortcode('dg_form', 'dg_form_shortcode');

   // Add stylesheets and scripts
   function plugin_custom_scripts($hook) 
   {
     // use   
    // echo $hook; exit;dg-forms_page_dg_plugin_newform
    if(
      ( 'toplevel_page_dg_form_page' == $hook )
      ||
      ( 'dg-forms_page_dg_plugin_newform' == $hook )
  ){
      //Stylesheets
      $path_style    = plugins_url('assets/css/style.css', __FILE__);
      $depend_style  = array("");
      $style_version = filemtime(plugin_dir_path(__FILE__)."assets/css/style.css");
      // Js files
      $path_js    = plugins_url('assets/js/main.js', __FILE__);
      $depend_js  = array("jQuery");
      $js_version = filemtime(plugin_dir_path(__FILE__)."assets/js/main.js");
       
      wp_enqueue_style('jQuery', 'https://code.jquery.com/jquery-2.2.4.min.js');
      // Include Bootstrap cdn
      wp_enqueue_style('bootstrap4', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css');
      wp_enqueue_script( 'boot1','https://code.jquery.com/jquery-3.1.1.min.js', array( 'jquery' ),'',true );
      wp_enqueue_script( 'boot2','https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array( 'jquery' ),'',true );
      wp_enqueue_script( 'boot3','https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js', array( 'jquery' ),'',true );

      wp_register_style( 'font-awesome',  'https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css' );

      wp_enqueue_style( 'font-awesome' );
       wp_enqueue_style( 'plugin_main_stylesheet', $path_style , '' , $style_version );
       wp_enqueue_script( 'plugin_main_script', $path_js , '$depend_js' , $js_version , true );

       // access admin-ajax file to the plugin
       wp_add_inline_script('plugin_main_script', 'var ajaxUrl ="'.admin_url('admin-ajax.php').'";', 'before' );
    }
  }
   
  add_action( 'admin_enqueue_scripts', 'plugin_custom_scripts' );
  add_action( 'wp_enqueue_scripts', 'plugin_custom_scripts' );

  // Show plugin menu in admin
   function dg_form_menu() 
   {
      $menu_slug = "dg_form_page";
        add_menu_page(
            __( 'Custom Menu Title', 'textdomain' ),
            'DG Forms',
            'manage_options',
            $menu_slug,
            'dg_plugin_function',
            '',
            6
        );
      // Add submenu Page
        add_submenu_page(
              $menu_slug,
            __( 'Custom Menu Title', 'textdomain' ),
            __( 'New Form', 'textdomain' ),
            'manage_options',
            'dg_plugin_newform',
            'dg_plugin_subpage_function'
        );
    }

    add_action( 'admin_menu', 'dg_form_menu' );

    // Main menu page
    function dg_plugin_function(){
      include 'admin/form-list.php';
    };

    // submenu page
      function dg_plugin_subpage_function(){
        include 'admin/new-form.php';
      }
  
      // Add form to the database using ajax
   add_action("wp_ajax_dg_submit_function", "dg_submit_function");

   // Remove any invalid data from the form data

   function remove_invaliddata($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = strip_tags($data);
    return $data;
  }
    
   function dg_submit_function(){
    
    $title        = $_POST['title'];
    $title        = remove_invaliddata($title);
    if(empty($title)){
      echo json_encode(['status' => 202, 'message' => "Title can't be empty"],false);
      die();
    }
    else{
     $descritpion = $_POST['description'];

      // Add data to database
      global $wpdb, $table_prefix;
      $dg_form = $table_prefix.'dg_form';

      $data = array(
        'id' => NULL,
        'title' => $title,
      );
      
      
      $save = $wpdb->insert($dg_form, $data);
      if($save == 1){
        $pageurl = admin_url('admin.php?page=dg_plugin_newform');
        echo json_encode( ['status' => 200, 'message' => 'Data Saved successfully!' , 'pageurl' => $pageurl] ,false);
      die();
      } 
      else{
        echo json_encode( ['status' => 202, 'message' => 'Error!!! Data not saved!'] ,false);
        die();
      }
    }
     
  }

  

   
