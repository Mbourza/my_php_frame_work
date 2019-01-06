<?php if(isset($_GET['id'])){
	$id=$_GET['id'];
	$reunion = DB::getInstance()->get('reunions', array('id', '=', $id))->first();
	if(!empty($reunion)){
		$participants = explode(',', $reunion->invited);?>
<div class="area">
	<div class="panel"> <a href="">Supprimer</a><a href="index.php?page=ajouter_participants&id=<?php echo $id; ?>">Ajouter</a></div>

	<table class="table">
		<h3 class="thead">participants</h3>

			<tr>
				<td></td>
				<th>nom</th>
				<th>prenom</th>
				<th>email</th>
				<th>n°telephone</th>			
			</tr>
			<?php foreach($participants as $id){if(!empty($id)){$user = DB::getInstance()->get('users', array('id', '=', $id))->first();?>
			<tr>
				<td><input type="checkbox" name="dp[]" value=""></td>
				<td><?php echo $user->nom;?></td>
				<td><?php echo $user->prenom;  ?></td>
				<td><?php echo $user->email;  ?></td>
				<td><?php echo $user->tele;?></td>
			</tr>
			<?php }}?>
	</table>
</div>
<?php }}else { Redirect::to('index.php?page=home');}?>