<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Profile</title>
	<link rel="stylesheet" href="template/css/style.css">
</head>
<body onload="note('userId', 'note')">
<style>
#note { width: 1em; height: 1em; background: red; color: white; position: absolute; font-family: rik; margin: .5em 0 0 -1.2em; text-align: center; line-height: 1em; border-radius: 0 6px}
</style>
	<div class="warrp">
		<div class="header">
			<div class="swbtn"><img src="template/img/icons/grid.png" alt="Menu"></div>
			<div class="logo"><img src="template/img/logoo.png" alt=""></div>
			<input type="hidden" id="userId" value="<?php echo Session::get(Config::get('session/session_name'));?>">
			<div class="navbar">
				<ul>
					<li><a href="index.php?page=profile"><img src="template/img/icons/avatar.png" alt=""></a></li>
					<li><a href="index.php?page=notification&id=<?php echo Session::get(Config::get('session/session_name')); ?>"><img src="template/img/icons/bell.png" alt=""><span id="note"></span></a></li>
					<li><a href="index.php?page=logout"><img src="template/img/icons/logout.png" alt=""></a></li>
				</ul>
			</div>
		</div>
		<div class="content">
			<div class="sidebar">
				<ul>
					<li class="color1"><a href="index.php?page=home"><img src="template/img/icons/home.png" alt=""> Home</a></li>
					<li class="color2"><a href="index.php?page=profile"><img src="template/img/icons/user.png" alt="">Profile</a></li>
					<li class="color2"><a href="index.php?page=services"><img src="template/img/icons/users.png" alt="">Services</a></li>
					<li class="color3"><a href="index.php?page=archives"><img src="template/img/icons/meet.png" alt="">ReuNion Archives</a></li>
					<li class="color4"><a href="index.php?page=logout"><img src="template/img/icons/out.png" alt="">Log Out</a></li>
				</ul>
			</div>
			<div class="showArea">