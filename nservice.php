<?php if(Input::exists()){

    if(Token::check(Input::get('token'))){

	    $service = new Service();

	    try{
	    	$service->create(array(

	    		'nom' => Input::get('Service_nom'),
	    		'chef' => Input::get('chef'),
	    		'date' => Input::get('creation')
    		));
    		DB::getInstance()->update('users', Input::get('chef'), array('groups'=>'2'));
	    	Redirect::to('');
	    	
	    }catch(Exception $e){

	    	die($e->getMessage());
	    }
	}
}?>
<div class="area">
	<form action="" method="post" enctype="multipart/form-data" class="service_form">
		<h3>Créer un nouveau Service</h3>
		<div class="case">
			<input type="text" name="Service_nom" placeholder="nom" class="seInput">
		</div>
		<div class="case">
			<?php $users = DB::getInstance()->getTable('users'); ?>
			<select name="chef" class="seSelect">
			    <?php foreach($users as $user) { if($user->groups == 1){?>
				<option value="<?php echo $user->id ?>"><?php echo $user->nom.' '.$user->prenom; ?></option>
				<?php }} ?>
			</select>
		</div>
		<div class="case">
			<input type="date" name="creation" class="seInput">
		</div>
		<div class="case">
			<input type="text" name="" placeholder="" class="seInput">
		</div>
		<div class="case">
			<input type="hidden" name="token" value="<?php echo Token::generate();  ?>" >
			<input type="submit" value="Créer" class="submit-btn">
		</div>
	</form>
	<div class="hservice">
	</div>
</div>