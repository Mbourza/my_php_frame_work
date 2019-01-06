<?php $id = Session::get(Config::get('session/session_name')); $login = DB::getInstance()->get('users', array('id', '=', $id))->first(); $group = $login->groups; if($group == 1){ Redirect::to('index.php');}

if(Input::exists()){

    if(Token::check(Input::get('token'))){

	    $reunion = new REUNION();

	    try{
	    	$reunion->create(array(

	    		'local' => Input::get('reunion_local'),
	    		'ddb' => Input::get('reunion_date'),
	    		'hdb' => Input::get('reunion_heure'),
	    		'ddf' => Input::get('reunion_Fdate'),
	    		'hdf' => Input::get('reunion_Fheure'),
	    		'sujet' => Input::get('sujet'),
	    		'organiser' => Session::get(Config::get('session/session_name'))
    		));
	    	Redirect::to('');
	    	
	    }catch(Exception $e){

	    	die($e->getMessage());
	    }
	}
}?>

<div class="area">
	<div class="bar"></div>
	<form action="" method="post" class="reunion_form">
		<h3>Organiser une réunion</h3>
		<div class="case">
			<input type="text" name="reunion_local" placeholder="L'endroit où se déroulera" class="mbInput">
		</div>
		<div class="case">
			<span class="sign">Début</span>
			<input type="date" name="reunion_date" class="dtInput">
			<input type="time" name="reunion_heure" class="dtInput">
		</div>
		<div class="case">
			<span class="sign">Terminer</span>
			<input type="date" name="reunion_Fdate" class="dtInput">
			<input type="time" name="reunion_Fheure" class="dtInput">
		</div>
		<div class="case">
			<textarea name="sujet" placeholder="sujet" class="textArea"></textarea>
		</div>
		<div class="case">
			<input type="hidden" name="token" value="<?php echo Token::generate();  ?>" >
			<input type="submit" value="Lancer" class="submit-btn">
		</div>
	</form>
	<div class="reunionHelp"></div>
</div>