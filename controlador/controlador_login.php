<?php
    session_start();

	if (!empty($_POST["btningresar"])) {
		if (!empty($_POST["usuario"]) and !empty($_POST["password"]) ) {

			$usuario=$_POST["usuario"];
			$password=$_POST["password"];

			$sql=$conexion->query(" select * From usuario where usuario='$usuario' and clave='$password' ");
			if ($datos=$sql->fetch_object()) {

				 $_SESSION["id"]=$datos->id;
				 $_SESSION["nombre"]=$datos->nombres;
				 $_SESSION["apellido"]=$datos->apellidos;

				 header("location: Barranquilla-RP/electiva_2_BASE/views_admin/hemo.php");

			} else {
				 echo "<div class='alert alert-danger'> Acceso denegado </div>";
			}
			
		} else {
			 echo "Campod vacios";
		}
		
	}
?>