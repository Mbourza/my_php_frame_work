<?php if(isset($_GET['id'])) { $id = $_GET['id']; $reunion = DB::getInstance()->get('reunions', array('id', '=', $id))->first();
if(!empty($reunion)){?>

<?php if(Input::exists()){

    if(Token::check(Input::get('token'))){

	    $rapport = new RAPPORT();

	    try{
	    	$rapport->create(array(

	    		'id_reunion' => $reunion->id,
	    		'title' => Input::get('title'),
	    		'description' => Input::get('desc'),
	    		'date' => date('Y-m-d')
    		));
	    	Redirect::to('');
	    	
	    }catch(Exception $e){

	    	die($e->getMessage());
	    }
	}
}?>

<style>
.rapport { width: 80%; text-align: center; margin: 2em auto 0}
.rapport > h3 { font-family: rik; font-weight: 200 } 
.rap-Input { width:  60%; height:  2em; padding: .4em }
#cree { width: 40%; height: 2em; padding: .4em; border: none; cursor: pointer; background: #a5cccb; color:  white; font-family: rik; font-weight: 200 }
#rap-area { resize: none }
</style>
<script src="template/js/tinymce/js/tinymce/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea', resize: false });</script>
<div class="area">
	<form action="" method="post" class="rapport">
		<h3>Cree Un Nevou Rapport: </h3>
		<div class="case"><input type="text" placeholder="Title..." name="title" class="rap-Input"></div>
		<div class="case"><input type="text" value="<?php echo $reunion->sujet; ?>" name="sujet" class="rap-Input"></div>
		<div class="case"><textarea placeholder="Description..." name="desc" id="rap-area"></textarea></div>
		<div class="case"><input type="hidden" name="token" value="<?php echo Token::generate();  ?>" ><button id="cree" name="" type="submit">Cree</button></div>
	</form>
</div><?php } else { Redirect::to('index.php?page=archives');}} ?>