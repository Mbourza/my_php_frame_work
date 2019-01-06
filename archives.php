<?php $reunions = DB::getInstance()->getTable('reunions'); $today = date("Y-m-d");?>
<div class="area">
	<table class="table">
		<h3 class="thead">Archives des réunions</h3>

			<tr>
				<td></td>
				<th>Local</th>
				<th>Sujet</th>
				<th>Debut</th>
				<th>Fin</th>
				<th class="orga">Organiser Par</th>
				<th>Rapport de réunion</th>
				
			</tr>
			<?php foreach($reunions as $ren) { if(strtotime($ren->ddb) < strtotime($today)) { ?>
			<tr>
				<td><input type="checkbox" name="ren[]" value=""></td>
				<td><?php echo $ren->local; ?></td>
				<td><?php echo substr($ren->sujet, 0, 10).'...'; ?></td>
				<td><?php echo $ren->ddb.' '.$ren->hdb; ?></td>
				<td><?php echo $ren->ddf.' '.$ren->hdf; ?></td>
				<td class="orga"><?php $user = DB::getInstance()->get('users', array('id', '=', $ren->organiser))->first(); echo $user->prenom.' '.$user->nom; ?></td>
				<td><?php $rap = DB::getInstance()->get('rapport', array('id_reunion', '=', $ren->id))->results();if(empty($rap)){?><a href="index.php?page=create_rapport&id=<?php echo $ren->id; ?>">Cree</a><?php } else{?> <a href="index.php?page=rapport&id=<?php echo $ren->id; ?>">View</a><?php }?></td>
			</tr>
			<?php }}?>
	</table>
</div>