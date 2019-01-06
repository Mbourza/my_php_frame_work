<?php if(Input::exists()){

    if(Token::check(Input::get('token'))){

	    $membre = new MEMBRE();

	    try{
	    	$membre->create(array(

	    		'nom' => Input::get('membre_nom'),
	    		'prenom' => Input::get('membre_prenom'),
	    		'tele' => Input::get('membre_telephone'),
	    		'email' => Input::get('membre_email'),
	    		'password' => Input::get('membre_password'),
	    		'service' => Input::get('service'),
	    		'groups' => 1,
	    		'date' => date('Y-m-d')
    		));
	    	Redirect::to('');
	    	
	    }catch(Exception $e){

	    	die($e->getMessage());
	    }
	}
}?>
<div class="area">
	<form action="" method="post" enctype="multipart/form-data" class="membre_form">
		<h3><?php if(isset($_GET['id'])){ echo 'Ajouter un nouveau membre au service'; } else{ echo 'Créer un nouveau membre';}?></h3>
		<div class="case">
			<input type="text" name="membre_nom" placeholder="nom" class="mbInput">
		</div>
		<div class="case">
			<input type="text" name="membre_prenom" placeholder="prenom" class="mbInput">
		</div>
		<div class="case">
			<input type="text" name="membre_telephone" placeholder="n°telephone" class="mbInput">
		</div>
		<div class="case">
			<input type="email" name="membre_email" placeholder="email" class="mbInput">
		</div>
		<div class="case">
			<input type="password" name="membre_password" placeholder="password" class="mbInput">
		</div>
		<div class="case">
			<?php $services = DB::getInstance()->getTable('services'); ?>
			<?php if(isset($_GET['id'])){?>
			<input type="hidden" name="service" value="<?php echo $_GET['id'];?>">
			<?php } else {?>
			<select name="service" class="seSelect">
				<?php foreach($services as $service) {?>
				<option value="<?php echo $service->id; ?>"><?php echo $service->nom;?></option>
				<?php }?>
			</select>
			<?php }?>
		</div>
		<div class="case">
			<input type="hidden" name="token" value="<?php echo Token::generate();  ?>" >
			<input type="submit" value="Créer" class="submit-btn">
		</div>
	</form>
	<div class="formhelp">
		<p>-> Pour Créer un nouveau membre compte</p>
		<P>* Remplire tous les champs par les informations appropriées</P><p>* puis cliquez sur Créer.</P><?php if(isset($_GET['id'])){?><p>Pour Changer Le service cliquer <a href="index.php?page=nouveau_membre">Ici</a></p><?php }?>
	</div>
</div>