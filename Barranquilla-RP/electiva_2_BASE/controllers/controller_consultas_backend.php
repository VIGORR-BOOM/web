<?php
session_start();
require_once( "../models/models_admin.php");

class ConsultasDB extends DBConfig {
    					
	function consulta_generales($sql){
		$this->config();
		$this->conexion(); 
		  
  		$records = $this->Consultas($sql);		 		  		  		  

  		$this->close();		
		return $records;				
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
    function listadoLibros($start=0, $regsCant = 0){
		$sql = "SELECT * FROM producto";
		if ($regsCant > 0 )
			 $sql = "SELECT * from producto $start,$regsCant";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}

	// listado de Pedido
	function listadoPedido($start=0, $regsCant = 0){
		$sql = "SELECT * FROM pedido";
		if ($regsCant > 0 )
			 $sql = "SELECT * from pedido $start,$regsCant";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}

	//Editar pedido por id
	function editar($id)
	{
		$sql = "SELECT * FROM pedido WHERE id=$id";
		if ($regsCant > 0)
			$sql = "SELECT * FROM pedido WHERE id=$id $start,$regsCant";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}

	//búsqueda de pedido por Nombre
	function busqueda($id)
	{
		$sql = "SELECT * FROM pedido WHERE nombre like '%$id%' ";
		if ($regsCant > 0)
			$sql = "SELECT * FROM pedido WHERE nombre like '%$id%' $start,$regsCant";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}

	// 𝘓𝘐𝘚𝘛𝘈𝘋𝘖 𝘋𝘌 𝘈𝘋𝘔𝘐𝘕𝘐𝘚𝘛𝘙𝘈𝘛𝘐𝘝𝘈
	function listadoADM($start=0, $regsCant = 0){
		$sql = "SELECT * FROM administrativa";
		if ($regsCant > 0 )
			 $sql = "SELECT * from administrativa $start,$regsCant";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}

	//𝘌𝘋𝘐𝘛𝘈𝘙 𝘓𝘐𝘚𝘛𝘈𝘋𝘖 𝘋𝘌 𝘈𝘋𝘔𝘐𝘕𝘐𝘚𝘛𝘙𝘈𝘛𝘐𝘝𝘈 𝘗𝘖𝘙 𝘐𝘋
	function editarADM ($id)
	{
		$sql = "SELECT * FROM administrativa WHERE id=$id";
		if ($regsCant > 0)
			$sql = "SELECT * FROM administrativa WHERE id=$id $start,$regsCant";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}

	//𝘉𝘜𝘚𝘘𝘜𝘌𝘋𝘈 𝘋𝘌 𝘓𝘐𝘚𝘛𝘈𝘋𝘖 𝘈𝘋𝘔𝘐𝘕𝘐𝘚𝘛𝘙𝘈𝘛𝘐𝘝𝘈 𝘗𝘖𝘙 𝘊𝘈𝘎𝘖
	function busquedaADM ($id)
	{
		$sql = "SELECT * FROM administrativa WHERE cargos like '%$id%' ";
		if ($regsCant > 0)
			$sql = "SELECT * FROM administrativa WHERE cargos like '%$id%' $start,$regsCant";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}

	// 𝘓𝘐𝘚𝘛𝘈𝘋𝘖 𝘋𝘌 𝘍𝘈𝘊𝘊𝘐𝘖𝘕𝘌𝘚
	function listadoFAC($start=0, $regsCant = 0){
		$sql = "SELECT * FROM facciones";
		if ($regsCant > 0 )
			 $sql = "SELECT * from facciones $start,$regsCant";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}

	//𝘌𝘋𝘐𝘛𝘈𝘙 𝘓𝘐𝘚𝘛𝘈𝘋𝘖 𝘋𝘌 𝘍𝘈𝘊𝘊𝘐𝘖𝘕𝘌𝘚 𝘗𝘖𝘙 𝘐𝘋
	function editarFAC ($id)
	{
		$sql = "SELECT * FROM facciones WHERE id=$id";
		if ($regsCant > 0)
			$sql = "SELECT * FROM facciones WHERE id=$id $start,$regsCant";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}

	//𝘉𝘜𝘚𝘘𝘜𝘌𝘋𝘈 𝘋𝘌 𝘓𝘐𝘚𝘛𝘈𝘋𝘖 𝘍𝘈𝘊𝘊𝘐𝘖𝘕𝘌𝘚 𝘗𝘖𝘙 𝘊𝘈𝘎𝘖
	function busquedaFAC ($id)
	{
		$sql = "SELECT * FROM facciones WHERE cargos like '%$id%' ";
		if ($regsCant > 0)
			$sql = "SELECT * FROM facciones WHERE cargos like '%$id%' $start,$regsCant";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}

	// 𝘓𝘐𝘚𝘛𝘈𝘋𝘖 𝘋𝘌 𝘝𝘐𝘗
	function listadoVIP($start=0, $regsCant = 0){
		$sql = "SELECT * FROM vip";
		if ($regsCant > 0 )
			 $sql = "SELECT * from vip $start,$regsCant";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}

	//𝘌𝘋𝘐𝘛𝘈𝘙 𝘓𝘐𝘚𝘛𝘈𝘋𝘖 𝘋𝘌 𝘝𝘐𝘗 𝘗𝘖𝘙 𝘐𝘋
	function editarVIP ($id)
	{
		$sql = "SELECT * FROM vip WHERE id=$id";
		if ($regsCant > 0)
			$sql = "SELECT * FROM vip WHERE id=$id $start,$regsCant";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}

	//𝘉𝘜𝘚𝘘𝘜𝘌𝘋𝘈 𝘋𝘌 𝘓𝘐𝘚𝘛𝘈𝘋𝘖 𝘝𝘐𝘗 𝘗𝘖𝘙 𝘊𝘈𝘎𝘖
	function busquedaVIP ($id)
	{
		$sql = "SELECT * FROM vip WHERE vip like '%$id%' ";
		if ($regsCant > 0)
			$sql = "SELECT * FROM vip WHERE vip like '%$id%' $start,$regsCant";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}

	

	
}//fin CLASE

?>
