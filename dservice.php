<?php if(isset($_GET['id'])) { $id= $_GET['id']; $service = DB::getInstance()->get('services', array('id', '=', $id))->first(); if(!empty($service)){ $log = Session::get(Config::get('session/session_name'));?>
<div class="area">
<?php $login = DB::getInstance()->get('users', array('id', '=', $log))->first(); $group = $login->groups; if($group == 2){?>
	<div class="panel"> <a href="">Supprimer</a><a href="index.php?page=nouveau_membre&id=<?php echo $id;?>">Ajouter</a></div>
	<?php }?>
	<?php $emps = DB::getInstance()->get('users', array('service', '=', $id))->results();?>
	<table class="table">
		<h3 class="thead">employés de service</h3>

			<tr>
				<td></td>
				<th>nom</th>
				<th>prenom</th>
				<th>email</th>
				<th>n°telephone</th>
				<th>membre depuis</th>				
			</tr>
			<?php foreach($emps as $emp) {?>
			<tr>
				<td><input type="checkbox" name="ren[]" value=""></td>
				<td><?php echo $emp->nom; ?></td>
				<td><?php echo $emp->prenom; ?></td>
				<td><?php echo $emp->email; ?></td>
				<td><?php echo $emp->tele; ?></td>
				<td><?php echo $emp->date; ?></td>
			</tr>
			<?php }?>
	</table>
</div>
<?php } else { Redirect::to('index.php?page=services');}} else { Redirect::to('index.php?page=services');}?>