<?php require_once('core/init.php');

$user = new LG();
$user->logOut();
Redirect::to('login.php');?>