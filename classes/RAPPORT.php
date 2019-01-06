<?php 

class RAPPORT {

	private $_db;

	public function __construct(){

		$this->_db = DB::getInstance();
	}

	public function create($fields = array()){

		if(!$this->_db->insert('rapport', $fields)){

			throw new Exception('There Was A Problem Creating Rapport');
		}
	}
}

?>