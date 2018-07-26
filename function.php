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
/**
 * List members of the group.
 */
add_shortcode('groups_users_list_group', 'groups_users_list_group_shortcode');
function groups_users_list_group( $atts, $content = null ) {
	$output = "";
	$options = shortcode_atts(
			array(
					'group_id' => null
			),
			$atts
	);
	if ($options['group_id']) {
		$group = new Groups_Group($options['group_id']);
		if ($group) {
			$users = $group->__get("users");
			if (count($users)>0) {
				foreach ($users as $group_user) {
					$user = $group_user->user;
					$user_info = get_userdata($user->ID);
      				
					$output .= $user_info->ID . "-" . $user_info-> user_lastname .  ", " . $user_info-> user_firstname . "<br>";
      			}
			}
		}
	}
	echo $output;
}
?>
