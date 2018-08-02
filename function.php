<?php
/*
Plugin name: !SJU Groups
Plugin URI: https://governance.sju.edu/
Description: A plugin to assign users to groups via ACF metadata and Foridable Forms.
Author: Will Marsh
Author URI: http://www.sju.edu
Version: 1.0
*/

/**
 * Automatically add user to specific group via Formidable and ACF.
 */
add_action('user_register', 'uag_user_register' );

function uag_user_register ( $user_id ) {
       echo '<pre>';
       print_r($_POST);
       echo '</pre>';
       exit();
}        
