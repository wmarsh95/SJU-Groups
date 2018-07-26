<?php
/*
Plugin name: SJU Groups
Plugin URI: https://governance.sju.edu/
Description: A plugin to assign users to groups via ACF metadata, forked from eggemplo (https://github.com/eggemplo/)
Author: Will Marsh
Author URI: http://www.sju.edu
Version: 1.0
*/

/**
 * Automatically add user to specific group via metadata.
 */
add_action('user_register', 'uag_user_register' );

function uag_user_register ( $user_id ) {
        if ($user_id != null) {
                if ( $group = Groups_Group::read_by_name( 'Premium' ) ) {
                        $result = Groups_User_Group::create( array( "user_id"=>$user_id, "group_id"=>$group->group_id ) );
                }
        }
}
