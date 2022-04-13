<?php
    /* 
    Plugin Name: My Contact Form
    Plugin URI: http://www.wordpress.org 
    Description: A plugin for creating contact forms
    Author: Deligent 
    Version: 1.0 
    Author URI: http://www.xyz.com 
    */  

    if(!defined('ABSPATH')){
        header("Location: /Gravity");
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

    // $q = "INSERT INTO `$dg_form` (`id`, `title`, `created_on`, `updated_on`, `status`, `is_trash`)
    //  VALUES (NULL, 'test', '2022-04-12 18:10:41.000000', '2022-04-12 18:10:41.000000', 1, 0)" ;

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
//   function my_sc_function(){
//     return "my function call";
//   }
//   add_shortcode('my_sc', 'my_sc_function');
?>