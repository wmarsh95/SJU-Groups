<?php
/*
Plugin name: SJU Groups
Plugin URI: https://governance.sju.edu/
Description: A plugin to assign users to groups via ACF metadata.
Author: Will Marsh; forked from eggemplo (https://github.com/eggemplo/Users-auto-Group)
Author URI: http://www.sju.edu
Version: 1.0
*/

add_action('user_register', 'uag_user_register' );

function uag_user_register ( $user_id ) {
    $curr_user_id = get_current_user_id();
// the value is 0 if the user isn't logged-in
    if ( $curr_user_id != 0 ) {
    // we know now the user is logged-in, so we can use his/her ID to get the user meta
    $um_value = get_user_meta( $curr_user_id, 'field_5b593b82ce458', true );
    // now we check if the value is correct
    if ( ! empty( $um_value ) && $um_value == 'University Couuncil' ) {
        // if so we can output something
        echo 'user meta has the value'; {
                if ( $group = Groups_Group::read_by_name( 'University Council' ) ) {
                        $result = Groups_User_Group::create( array( "user_id"=>$user_id, "group_id"=>$group->group_id ) );
                }
        }
}
?>
