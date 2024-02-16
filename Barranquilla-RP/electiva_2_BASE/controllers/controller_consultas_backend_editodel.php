<?php
session_start();
//require_once( "../models/models_admin.php");

class ConsultasDB extends DBConfig {
    					
	function consulta_generales($sql){
		  $this->config();
		  $this->conexion(); 
		  
  		  $records = $this->Consultas($sql);		 		  		  		  
		  if ($records) {			  		    
			while ($dtrow = mysql_fetch_assoc($records)){
			   $lista[] = $dtrow;	
			}
			return $lista;						 			
			mysql_free_result($records);
		  }else{
			  return false;  
		  }	  
		  $this->close();		
	}	

}


/**
* IMPLEMENTACION DE ACCESO A CONSULTAS PARA PROTEGER MAS LA VISTA
*/
class ExtraerDatos extends ConsultasDB
{
		
	//MUESTRA LISTADO DE USUARIOS
	function listadoUsuarios($start=0, $regsCant = 0){
		$sql = "SELECT * FROM usuarios";
		if ($regsCant > 0 )
			 $sql = "SELECT * from usuarios $start,$regsCant";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}
	// DETALLE DE USUARIOS SELECICONADA SEGUN ID
	function usuariosDetalle($idu){
		$sql = "SELECT * from usuarios where id=$idu ";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}

	// ****************************************************************************
	// Agregue aqui debajo el resto de Funciones - Se ha dejado  Listado y detalle
	// ****************************************************************************

	
	
}//fin CLASE

?>
