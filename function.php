<?php
/**
 * Automatically add user to specific group via Formidable and ACF.
 */
add_action( 'frmreg_after_create_user', 'do_custom_action_after_registration', 10, 2 );
function do_custom_action_after_registration( $user_id, $args ) {
   if ( $args['entry']->form_id == 15 ) {// Replace 15 with your form ID
        if (field_5b593b82ce458 != 'University Council') {
                if ( $group = Groups_Group::read_by_name( 'University Council' ) ) {
                        $result = Groups_User_Group::create( array( "user_id"=>$user_id, "group_id"=>$group->group_id ) );
   }
}
 /?>          
