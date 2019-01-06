<style>
.table th, td { color: #000; border-bottom: 1px solid #ccc; padding: 12px 35px; border-collapse: collapse; font-family: rik; font-weight: 200 }
.panel { width:  100%; height: 4em; padding: .5em }
.panel > a { width: 10%; height: 2em; background: #a5cccb; color: white; display: inline-block; margin: 2em .5em 0; text-align: center; line-height: 2em; font-family: rik; font-weight: 200; border-radius: 0 6px}
</style>
<?php $id = Session::get(Config::get('session/session_name')); $services= DB::getInstance()->getTable('services');?>
<?php if(!empty($services)) {?>
<div class="area">
	<?php $login = DB::getInstance()->get('users', array('id', '=', $id))->first(); $group = $login->groups; if($group == 3 or $group == 2){?>
	<div class="panel"> <a href="">Delete</a><a href="index.php?page=nouveau_service">Ajouter</a></div>
	<?php }?>
	<table class="table">
		<h3 class="thead">services</h3>
			<tr>
				<td></td>
				<th>Service</th>
				<th>Chef De Service</th>
				<th>N° Telephone</th>	
				<th>service créé depuis</th>
				<th>nombre d'employés</th>
				<th>Plus d'info</th>			
			</tr>
			<?php foreach($services as $serv) { //if($user->groups === 1) { ?>
			<tr>
				<td><input type="checkbox" name="users[]" value=""></td>
				<td><?php echo $serv->nom; ?></td>
				<td><?php $user = DB::getInstance()->get('users', array('id', '=', $serv->chef))->first(); echo $user->nom.' '.$user->prenom; ?></td>
				<td><?php echo $user->tele; ?></td>
				<td><?php echo $serv->date; ?></td>
				<td><?php $nbemps = DB::getInstance()->get('users', array('service', '=', $serv->id))->results(); echo count($nbemps); ?></td>
				<td><a href="index.php?page=service_detail&id=<?php echo $serv->id;?>">plus d'info</a></td>
			</tr>
			<?php }?>

	</table>
	<?php }else { Redirect::to('index.php?page=nouveau_service');}?>
</div>