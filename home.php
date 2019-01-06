<?php $id = Session::get(Config::get('session/session_name')); $reunions = DB::getInstance()->getTable('reunions'); $today = date("Y-m-d");?>
<div class="area">
<?php $login = DB::getInstance()->get('users', array('id', '=', $id))->first(); $group = $login->groups; if($group == 3 or $group == 2){?>
	<div class="panel"> <a href="">Delete</a><a href="index.php?page=nouveau_reunion">Ajouter</a></div>
	<?php }?>
	<table class="table">
		<h3 class="thead">Réunions à venir</h3>

			<tr>
				<td></td>
				<th>Local</th>
				<th>Sujet</th>
				<th>La date De Debut</th>
				<th>La date De Fin</th>
				<th>Organiser Par</th>
				<?php if($group == 3 or $group == 2){?>
				<th>Nombre Des Participants</th>
				<?php }else {?><th>statut</th><?php }?>

				
			</tr>
			<?php foreach($reunions as $ren) { if(strtotime($ren->ddb) >= strtotime($today)) { ?>
			<tr>
				<td><input type="checkbox" name="ren[]" value=""></td>
				<td><?php echo $ren->local; ?></td>
				<td><?php echo $ren->sujet; ?></td>
				<td><?php echo $ren->ddb.' '.$ren->hdb; ?></td>
				<td><?php echo $ren->ddf.' '.$ren->hdf; ?></td>
				<td><?php $user = DB::getInstance()->get('users', array('id', '=', $ren->organiser))->first(); echo $user->prenom.' '.$user->nom; ?></td>
				<td><?php if($group == 3 or $group == 2){?><a href="index.php?page=reunion_details&id=<?php echo $ren->id;?>">plus d'information</a><?php }else { $in = unserialize($login->note); if($login->id == $in['id']){ echo 'Invited';}}?></td>
			</tr>
			<?php }}?>

	</table>
</div>