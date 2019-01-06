<?php

require_once('includes/libs/PHPMailer/PHPMailerAutoload.php');
if(Input::exists()){

    if(Token::check(Input::get('token'))){

		try{
			$mail = new PHPMailer;
			$mail->isSMTP();
			$mail->SMTPAuth = true;
			//$mail->SMTPDebug = 2;

			$mail->Host = 'smtp.gmail.com';                                                 
			$mail->Username = "Fatimazouine95@gmail.com";                  
			$mail->Password = '';

			$mail->SMTPSecure = 'ssl';
			$mail->Port = 465;

			$mail->setFrom('Fatimazouine95@gmail.com', 'Reunion');
			$mail->addReplyTo('Fatimazouine95@gmail.com', 'Reply Address'); 
			$mail->addAddress(Input::get('to'), 'Fpo Reunion');
			$mail->Subject = Input::get('subject');
			$mail->Body    = '<p>'.Input::get('message').'</p>';
			$mail->AltBody = '<p>'.Input::get('message').'</p>';
			$mail->send();

		}catch(PDOException $e) { die($e->getMessage());}
	}
}?>
<style>
.email { width: 50%; height: 60%; position: absolute }
.email > h3 { width: 100%; height: 2em; line-height: 2em; text-indent: 2em; color: white; font-family: rik; font-weight: 200; background: #a5cccb }
.EmailInputs {width: 90%; margin: 2em auto 0; text-align: center}
.mail-Input { width: 100%; margin: .5em auto }
.mail-Input > span { display: inline-block; width: 10%; height: 2em; background: #a5cccb; color: white; line-height: 2em; text-align: center }
.e-input { width: 60%; height: 2em; border: 1px solid #ccc; padding: .4em }
#mailArea { width: 60%; height: 8em; padding: .4em; resize: none; margin-left:10%;}
.mail-btn { width: 60%; height: 2.5em; background: #a5cccb; color: white; font-family: rik; font-weight: 200; line-height: 2.5em; text-align: center; border: none; margin-left: 10%; cursor: pointer }
.epic { width: 35%; height: 60%; position: absolute; margin-left: 45%; background: url('template/img/email.jpg'); background-size: cover }
</style>
<div class="area">
	<div class="email">
		<h3>Envoyer Invitation </h3>
		<div class="EmailInputs">
			<form action="" method="post">
				<div class="mail-Input"><span>To: </span><input type="text" name="to" class="e-input"></div>
				<div class="mail-Input"><span>Subject: </span><input type="text" name="subject" class="e-input"></div>
				<textarea name="message" id="mailArea" placeholder="message"></textarea>
				<div class="mail-Input">
					<input type="hidden" name="token" value="<?php echo Token::generate(); ?>" >
					<input class="mail-btn" type="submit" name="" value="Envoyer Invitation">
				</div>
			</form>
		</div>
	</div>
	<div class="epic"></div>
</div>