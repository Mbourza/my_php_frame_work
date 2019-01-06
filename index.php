<?php require_once('core/init.php');

$Admin = new LG();

if(!Session::exists(Config::get('session/session_name'))) {

    Redirect::to('login.php');

}else {?>
<?php require_once('core/init.php'); ?>
<?php require_once('template/header.php');?>

<?php

	$page = escape(@$_GET['page']);

	if(empty($page)) { $page = 'home'; }

	switch($page){
		case 'home':
			require_once('home.php');
		break;
		case 'profile':
			require_once('profile.php');
		break;
		case 'archives':
			require_once('archives.php');
		break;
		case 'nouveau_membre':
			require_once('nmember.php');
		break;
		case 'services':
			require_once('services.php');
		break;
		case 'nouveau_service':
			require_once('nservice.php');
		break;
		case 'service_detail':
			require_once('dservice.php');
		break;
		case 'nouveau_reunion':
			require_once('nreunion.php');
		break;
		case 'reunion_details':
			require_once('dreunion.php');
		break;
		case 'ajouter_participants':
			require_once('ajopar.php');
		break;
		case 'inviter':
			require_once('email.php');
		break;
		case 'create_rapport':
			require_once('nrapport.php');
		break;
		case 'rapport':
			require_once('rapport.php');
		break;
		case 'notification':
			require_once('notify.php');
		break;
		case 'logout':
			require_once('logout.php');
		break;
		default :
		    require_once'includes/errors/404.php';
	    break;
	}
?>

<?php require_once('template/footer.php'); }?>