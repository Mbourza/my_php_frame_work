<?php if(isset($_GET['id'])){ $id = $_GET['id']; $user= DB::getInstance()->get('users', array('id', '=', $id))->first(); 
	$note = unserialize($user->note); if(!empty($note)){ $sent = DB::getInstance()->get('users', array('id', '=', $note['sent']))->first();
												$reunion= DB::getInstance()->get('reunions', array('id', '=', $note['reunion']))->first();?>
<style>
.yourNote { width: 90%; padding: 1em; text-align: center}
.yourNote > h3 { font-family: rik; font-weight: 200 }
</style>
<div class="area">
	<div class="yourNote">
		<h3> <?php echo $sent->nom.' '.$sent->prenom; ?> Sent You An invitation For Attending a Reunion about <?php echo $reunion->sujet;?></h3>
	</div>
</div><?php }}?>