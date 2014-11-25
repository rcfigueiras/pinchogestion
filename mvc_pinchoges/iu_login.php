<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<!--Version: Subastronix -->
<!--  Date:    Noviembre, 2013 -->
<!--  Esta es la página dedica a dar acceso a los usuarios registrados en nuestro sitio -->
<!--  y la que brinda la opción de registrarse -->
<!--  Author:  Roberto Arce-->

<?php
	session_start();
	include "FuncionIdioma.php";
?>
	
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="cache-control" content="no-cache" />
  <meta http-equiv="expires" content="3600" />
  <meta name="revisit-after" content="2 days" />
  <meta name="robots" content="index,follow" />
  <meta name="author" content="Design: Wolfgang (www.1-2-3-4.info) / Modified: Your Name" />
  <meta name="distribution" content="global" />
  <meta name="description" content="Your page description here ..." />
  <meta name="keywords" content="Your keywords, keywords, keywords, here ..." />
  <link rel="stylesheet" type="text/css" media="screen,projection,print" href="./css/layout4_setup.css" />
  <link rel="stylesheet" type="text/css" media="screen,projection,print" href="./css/layout4_text.css" />
  <link rel="icon" href="./img/iconopeque.jpg"/>
  <link rel="icon" type="image/x-icon" href="./img/LOGO_2.ico" />
  <title>PinchoGes</title>
  
</head>

<!-- Global IE fix to avoid layout crash when single word size wider than column width -->
<!--[if IE]><style type="text/css"> body {word-wrap: break-word;}</style><![endif]-->

<body>
  <!-- Main Page Container -->
  <div class="page-container">

   <!-- For alternative headers START PASTE here -->

    <!-- A. HEADER -->      
    <div class="header">
      
      <!-- A.1 HEADER TOP -->
      <div class="header-top">
        
        <!-- Sitelogo and sitename -->
        <a class="sitelogo" href="#" title="Go to Start page"></a>
        <div class="sitename">
          <h1><a href="index.html" title="Go to Start page">SUBASTRONIX<span style="font-weight:normal;font-size:50%;">&nbsp</span></a></h1>
          <h2></h2>
        </div>
		
    <!-- Comprobamos que idioma se encuentra seleccionado y ponemos como idioma por defecto el español-->
      <?php
			if (!isset($_SESSION['idioma'])){
				$_SESSION['idioma'] = "espanol";
			
			}
			//Seleccionamos en le fichero de idioma los textos correspondientes a esta pagina que seria la 0
			$texto = idioma(1, $_SESSION['idioma']);
		?>
		
		
        <!-- Navigation Level 0 -->
        <div class="nav0">
          <ul>
           <li><a href="CambioIdioma.php?idioma=galego" title="Páxina de inicio en Galego"><img src="./img/bandera_g.gif" alt="Descripción de la imagen" /></a></li>
            <li><a href="CambioIdioma.php?idioma=espanol" title="Página de inicio en Español"><img src="./img/bandera_e.gif" alt="Descripción de la imagen" /></a></li>
            <li><a href="CambioIdioma.php?idioma=english" title="Homepage in English"><img src="./img/bandera_gb.gif" alt="Descripción de la imagen" /></a></li>
          </ul>
        </div>				

        <!-- Navigation Level 1 -->
        <div class="nav1">
          <ul>
           <li><a href="IU_01_PantallaPrincipal_Visitante.php" title="Go to Start page"><?php echo $texto[1]; ?></a></li>
           <?  echo "<li><a href='IU_AYUDA.php?numero=02'>$texto[2]</a></li>";?>																								
            <li><a href="IU_02_Login.php" title="Get an overview of website"><?php echo $texto[3]; ?></a></li>
          </ul>
        </div>              
      </div>
      
      <!-- A.2 HEADER MIDDLE -->
      <div class="header-middle">    
   
        <!-- Site message -->
        <div class="sitemessage">
     		
        </div>        
      </div>
      
 

       
    <!-- Esta en esta tabla recogemos lo que insertar el usuario y los mandamos a la controladora para que compruebe que el usuario es correcto-->
	<table height=10></table>
                  
                
    <form action="./controladoras/Login.php" method="get"> 
    <table>
	<tr>
	<td  width="250" align="right"><?php echo $texto[4]; ?>:<td/> <td width="250" ><input type=text NAME="login"><td/>
	<tr/>
	
	<tr>
	<td width="250" align="right"><?php echo $texto[5]; ?>:<td/> <td width="250" ><input type=password NAME="pass"><td/>
	<tr/>
	<tr><td><table height=10></table></td></tr> 
	<tr>
	<td colspan="6" align="center" cellspacing="200"><INPUT  TYPE="submit" name="accion" VALUE="<?php echo $texto[6]; ?>" size=50><INPUT TYPE="submit" name="accion"  VALUE="<?php echo $texto[7]; ?>" size=50><INPUT TYPE=SUBMIT name="accion" VALUE="<?php echo $texto[8]; ?>" size=50><td/>
	<tr/>	
        
        </table>
		<form/>
      
      
        <table height=10></table> 
		
      
    <!-- C. PIE DE PÁGINA -->      

    <div class="footer">
      
	  </div>      
  </div>
  
</body>
</html>



