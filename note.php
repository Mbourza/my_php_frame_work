<?php require_once('core/init.php'); if(isset($_GET['id'])){

	$id = $_GET['id'];
	$user = DB::getInstance()->get('users', array('id', '=', $id))->first();
	$note = unserialize($user->note);
	if(!empty($note)){

		echo '!';
	}
} ?>