<?php

class DBconnection{
	//property

	public $con;
	public $error;
//method
	public function connectDataBase(){
		$this->con = new mysqli('localhost', 'root', '','pet_shop');
		if ($this->con == false) {
			$this->error = "Connection fail".$this->con->connect_error;
		}
	}

	




}

?>
