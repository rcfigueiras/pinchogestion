<?php //Funcion controladora que logea a un usuario en el sistema
class Controlador{
	session_start();
	
// funcion de conexion a la bd 
function ConectarBD()
{
    mysql_connect("localhost","userpg","userpg");
    mysql_select_db("pinchoges");
}

// recogemos los valores del formulario de login

if(isset($_REQUEST['login'])){$login = $_REQUEST['login'];}
else{$login=$_SESSION['login'];}

if(isset($_REQUEST['login'])){$pass = $_REQUEST['pass'];}
else{$login=$_SESSION['login'];}

$accion = $_REQUEST['accion'];

// conectamos con la bd
ConectarBD();

// si viene de la accion de validarse entramos aqui
if ($accion=="Loguear" )
{
	if ($login ==NULL || $pass==NULL){
	 header ("Location:../IU_28_Error_CamposIncompletos.php");
	}
	
    //comprobamos si existe en la bd
   // $sql = "select * from ADMINISTRADOR where nombre_admin = '".$login."'";
    $sql_admin = "select * from ADMINISTRADOR where nombre_admin = '".$login."'";
	$sql_estab = "select * from ESTABLECIMIENTO where nombre_estab = '".$login."'";
	$sql_jurPro = "select * from JURADO_PROFESIONAL where nombre_jurPro = '".$login."'";
	$sql_jurPop = "select * from JURADO_POPULAR where nombre_jurPop = '".$login."'";
	
    $resultado_admin = mysql_query($sql_admin);
    $resultado_estab = mysql_query($sql_estab);
    $resultado_jurPro = mysql_query($sql_jurPro);
    $resultado_jurPop = mysql_query($sql_jurPop);
	
    if (mysql_num_rows($resultado_admin) == 1 )
    {
        // si existe en la bd comprobamos si coincide la pass
        $res = mysql_fetch_array($resultado_admin);
        // y el tipo de usuario que recogemos de la bd
        // si la pass coincide registramos en la session el login
        // y lo enviamos a la pagina de Inicio de Usuario
        
		//Administrador
		if ($pass==$res['contrasenha_admin'] ){
		    
			$_SESSION['nombre_admin']=$login;
            $_SESSION['ID_admin']=$res['ID_admin'];
			$sql = "select * from ADMINISTRADOR where ID_administrador = '".$res['ID_administrador']."'";
			
			$resultado = mysql_query($sql);
			
			if (mysql_num_rows($resultado) == 1){
				header ('Location:administrador.html'); 		
			}
		}
		else{
			header ('Location:error_contrasenha1.html'); 
		}		
    }
			
	//Establecimiento

	else if ( mysql_num_rows($resultado_estab) == 1 )
	{
		// si existe en la bd comprobamos si coincide la pass
        $res = mysql_fetch_array($resultado_estab);
        // y el tipo de usuario que recogemos de la bd
        // si la pass coincide registramos en la session el login
        // y lo enviamos a la pagina de Inicio de Usuario
        
		if ($pass==$res['contrasenha_estab'] ){
		    
			$_SESSION['nombre_estab']=$login;
            $_SESSION['ID_estab']=$res['ID_estab'];
			$sql = "select * from ESTABLECIMIENTO where ID_estab = '".$res['ID_estab']."'";
			
			$resultado = mysql_query($sql);
			
			if (mysql_num_rows($resultado) == 1){
				header ('Location:establecimiento.html'); 		
			}
		}
		else{
			header ('Location:error_contrasenha1.html'); 
		}		
	}
	else if ( mysql_num_rows($resultado_jurPro) == 1 )
	{
		// si existe en la bd comprobamos si coincide la pass
        $res = mysql_fetch_array($resultado_jurPro);
        // y el tipo de usuario que recogemos de la bd
        // si la pass coincide registramos en la session el login
        // y lo enviamos a la pagina de Inicio de Usuario
        
		if ($pass==$res['contrasenha_jurPro'] ){
		    
			$_SESSION['nombre_jurPro']=$login;
            $_SESSION['ID_juradoProfesional']=$res['ID_juradoProfesional'];
			$sql = "select * from JURADO_PROFESIONAL where ID_juradoProfesional = '".$res['ID_juradoProfesional']."'";
			
			$resultado = mysql_query($sql);
			
			if (mysql_num_rows($resultado) == 1){
				header ('Location:jurPro.html'); 		
			}
		}
		else{
			header ('Location:error_contrasenha1.html'); 
		}		
	}
	else if ( mysql_num_rows($resultado_jurPop) == 1 )
	{
		// si existe en la bd comprobamos si coincide la pass
        $res = mysql_fetch_array($resultado_jurPop);
        // y el tipo de usuario que recogemos de la bd
        // si la pass coincide registramos en la session el login
        // y lo enviamos a la pagina de Inicio de Usuario
        
		if ($pass==$res['contrasenha_jurPop'] ){
		    
			$_SESSION['nombre_jurPop']=$login;
            $_SESSION['ID_juradoPopular']=$res['ID_juradoPopular'];
			$sql = "select * from JURADO_POPULAR where ID_juradoPopular = '".$res['ID_juradoPopular']."'";
			
			$resultado = mysql_query($sql);
			
			if (mysql_num_rows($resultado) == 1){
				header ('Location:jurPop.html'); 		
			}
		}
		else{
			header ('Location:error_contrasenha1.html'); 
		}		
	}
	
	//si no existe el login en la bd lo mandamos a loguearse
	else{
			header ('Location:IU_login.html'); 
	} 

}
}


/*

//Si elije la opción de ir a registrarse entraria en esta condición	
if ($accion=="Registrarse" || $accion=="Register" || $accion=="Rexistrarse")
{
header ("Location:../IU_04_Registro.php"); 
}
//Si elije la opción de salir entraria en esta condición enviandole a la pagina de visitante	
if ($accion=="Salir" || $accion=="Close" || $accion=="Sa&iacute;r")
{
header ("Location:../IU_01_PantallaPrincipal_Visitante.php"); 
}
//Si elije la opción de cerrar sesión entraria en esta condicion enviandolo a la pagina de visitante destruyendo la sesión
// esta opcion seria para todas las paginas despues de logueado
if ($accion=="Cerrar"|| $accion=="End Session" || $accion=="Sesion Fin")
{
	 
header ("Location:../IU_01_PantallaPrincipal_Visitante.php"); 
	session_destroy();
}*/

?>