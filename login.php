<?php require_once('core/init.php');

if(Session::exists(Config::get('session/session_name'))) {

    Redirect::to('index.php');

} else if(Input::exists()){

    if(Token::check(Input::get('token'))){
            
        $user = new LG(); 
        $remember = (Input::get('remember') === 'on') ? true : false;   
        $login = $user->login(Input::get('username'), Input::get('password'), $remember);
        
        if($login){               
            Redirect::to('index.php');
        }
    }
}?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>GDR</title>
	<link rel="stylesheet" href="template/css/login.css">
</head>
<body>
<div class="warp">
	<div class="Logpanel">
		<div class="login">
			<div class="logo">
				<h3>Sing In</h3>
			</div>
			<form action="" method="post">
				<div class="case"><input type="text" name="username" placeholder="username" class="Input"></div>
				<div class="case"><input type="password" name="password" placeholder="password" class="Input"></div>
				<div class="case">
					<input type="radio" name="remember" style="display: none" checked>
					<input type="hidden" name="token" value="<?php echo Token::generate();  ?>" >
					<input type="submit" value="Login" class="btn">
				</div>
			</form>
		</div>
		<div class="park"><img src="template/img/logo.png" alt=""></div>
	</div>
</div>
</body>
</html>