<?php
//Llamada a la vista
require_once("views/iu_login.html");

//Llamada al modelo
require_once("models/db_model.php");

class loginControlador{
	
	
	private $dbmodelo;
	
	public function __construct(){
		
		parent::__construct();
			
		$this->db_model = new db_model();
		return true;
	
	}

	public function login(){
		if(isset($POST["login"])){
			if($this->db_model->loguear_invitado($_POST["login"], $_POST["pass"])){
				$_SESSION["usuarioActual"]=$_POST["login"];
			}
		}else{
			$errors = array();
			$errors["general"] = "Nombre de usuario no válido";
			
		}
		return true;
	}	 


}


?>
