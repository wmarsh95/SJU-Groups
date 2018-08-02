<?php
/*
Plugin name: !SJU Groups
Plugin URI: https://governance.sju.edu/
Description: A plugin to assign users to groups via ACF metadata and Formidable Forms.
Author: Will Marsh
Author URI: http://www.sju.edu
Version: 1.0
*/

/**
 * Automatically add user to specific group via ACF 5.0+ and Formidable Fomrs.
 */
add_action('user_register', 'uag_user_register' );

function uag_user_register ( $user_id ) {
	/*echo '<pre>';
	print_r($_POST);
	echo '</pre>';
	 exit();*/

	$committees = isset($_POST['item_meta']['408']) ? $_POST['item_meta']['408']: '';

	if(!empty($committees)){
		foreach ($committees as $committee_key => $committee_value) {
			$group = Groups_Group::read_by_name( trim($committee_value) );
			if($group){
				$result = Groups_User_Group::create( array( "user_id"=>$user_id, "group_id"=>$group->group_id ) );
			}
			
		}
	}
      
}
