<?php $id = Session::get(Config::get('session/session_name'));
$user = DB::getInstance()->get('users',array('id', '=', $id))->first();
 ?>
<div class="area">
	<div class="profile">
		<div class="proheader">
			<h3><?php echo $user->nom.' '.$user->prenom; ?></h3>
			<p><?php if($user->groups == 3){ echo 'Directeur General';} else if($user->groups == 2){echo 'Shef De Service';} else { echo 'Employee';}?></p>
		</div>
		<div class="proleft">
			<h3>Contacts</h3>
			<h4>Nom: <?php echo $user->nom; ?></h4>
			<h4>prenom: <?php echo $user->prenom; ?></h4>
			<h4>Email: <?php echo $user->email; ?></h4>
			<h4>Telephone: <?php echo $user->tele; ?></h4>
		</div>
		<div class="proright">
		<?php if($user->service != 0){$service = DB::getInstance()->get('services',array('id', '=', $user->service))->first(); if(!empty($service)){ ?>
			<h3>Servive</h3>
			<h4>Nom De Service: <?php echo $service->nom;?></h4>
			<h4>Chef De Service: Alen Boughaza</h4>
			<h4>Chef N°Tele: 0678189639</h4>
			<h4>Membre Depuis: <?php echo $user->date; ?></h4>
			<?php }} else if($user->groups == 3){?>
			<h3>Directeur General</h3>
			<h4>Directeur Depuis: <?php echo $user->date; ?></h4><?php }?>
		</div>
	</div>
</div>