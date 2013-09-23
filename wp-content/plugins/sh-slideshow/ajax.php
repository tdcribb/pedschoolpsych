<?php
	include_once('../../../wp-config.php');
	include_once('../../../wp-load.php');
	include_once('../../../wp-includes/wp-db.php');
	global $wpdb;
	
	$table_prefix = $wpdb->prefix . 'sh_';
	$slides_table = $table_prefix . 'slides';
	
	if($_POST['id']):
		$result = $wpdb->query($wpdb->prepare('delete from '.$slides_table.' where id = %d', $_POST['id']));
		if($result):
			$return['msg'] = 'Success';
		else:
			$return['msg'] = 'Database Error.';
		endif;
	else:
		$return['msg'] = 'Database Error.';
	endif;
	echo json_encode($return);
?>