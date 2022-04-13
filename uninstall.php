<?php

// if uninstall.php is not called by WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
    header("Location: /Gravity");
    die;
}

    // If we want to remove the table on reinstallation
     global $wpdb, $table_prefix;
     $dg_form = $table_prefix.'dg_form';
    
     $q =  "DROP TABLE `$dg_form`";
     $wpdb->query($q);