<?php if(isset($_GET['id'])){ $id = $_GET['id']; $rap = DB::getInstance()->get('rapport', array('id_reunion', '=', $id))->first();?>
<style>
.rapport { width: 100%}
.rapport > h3 { margin: 2em 0 .4em 1em; font-family: rik; font-weight: 200 }
.rapport > p {  margin: 1em .4em 1em 1em; font-family: rik; font-weight: 200 }
.rap-desc { width: 100%; margin: 1em auto 0; background: #a5cccb; color: white }
.rap-desc > p { padding: 1em; font-family: rik; font-weight: 200; line-height: 2em  }
</style>
<div class="area">
<?php if(!empty($rap)){?>
	<div class="rapport">
		<h3><?php echo $rap->title; ?></h3>
		<div class="rap-desc">
			<p><?php echo $rap->description; ?></p>
		</div>
		<p>Posted On:<?php echo $rap->date; ?></p>
	</div>
	<?php } else { Redirect::to('index.php?page=create_rapport&id='.$id);}?>
</div>
<?php } else { Redirect::to('index.php?page=archives');} ?>