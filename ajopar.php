<?php if(isset($_GET['id'])){$id=$_GET['id']; $reunion = DB::getInstance()->get('reunions', array('id', '=', $id))->first();?>
<?php if(Input::exists()){
	$In = '';
    if(Token::check(Input::get('token'))){

    	$note = array('id'=>Input::get('participant'), 'reunion'=>$id, 'sent'=>Session::get(Config::get('session/session_name')));
    	$notification = serialize($note);

	    try{
	    	$up = DB::getInstance()->update('users', Input::get('participant'), array(

	    		'note'=>$notification
    		));

    		if(!empty(Input::get('participant'))){if(empty($reunion->invited)){ $In = Input::get('participant');} else { $In = $reunion->invited.','.Input::get('participant');}

    		$invited = DB::getInstance()->update('reunions', $id, array(

	    		'invited'=> $In
    		));}
	    	Redirect::to('index.php?page=reunion_details&id='.$id);
	    	
	    }catch(Exception $e){

	    	die($e->getMessage());
	    }
	}
}?>
<style>
.ajEmail { width: 30%; float: left; margin: 0 auto}
.ajEmail > p { font-family: rik; font-weight: 200; margin: 1em; line-height: 1.6em }
</style>
<div class="area">
	<div class="reunion">
		<p>Reunion Id: <?php echo $reunion->id;?> </p>
		<p>Local: <?php echo $reunion->local;?> </p>
		<p>sujet: <?php echo $reunion->sujet;?></p>
		<p>debut: <span class="alert"><?php echo $reunion->ddb.' '.$reunion->hdb;?></p></span>
		<p>se terminer: <span class="alert"><?php echo $reunion->ddf.' '.$reunion->hdf;?></p></span>
	</div>
	<div class="ajEmp">
		<form action="" method="post">
		<?php $users = DB::getInstance()->getTable('users'); ?>
			<h3>Ajouter des participants</h3>
			<select name="participant" id="SeEmp">
				<?php foreach ($users as $user) { if($user->id != $reunion->organiser){ if(!in_array($user->id, explode(',', $reunion->invited))) {?>
				<option value="<?php echo $user->id; ?>"><?php echo$user->nom.' '.$user->prenom; ?></option>
				<?php }}}?>
			</select>
			<input type="hidden" name="token" value="<?php echo Token::generate();  ?>" >
			<input type="submit" value="Submit" id="parbtn">
		</form>
	</div>
	<div class="ajEmail">
		<p>Pour inviter des participants par email <a href="index.php?page=inviter">clicker Ici</a></p>
	</div>
</div><?php }?>