<?php

include ("../../../dist/conexion.php");

/**
* 
*/
class Usuarios
{
	Public $con;
	
	function __construct()
	{
		$this->con = new Conexion();
	}

	function __destruct(){
	$this->con = null;
	}	

	function ListarUsuarios(){

	$query = "SELECT ges_trabajadores.Rut,  ges_trabajadores.Nombre,  int_cargo.Descripcion as cargo, ges_empresa.Nombre as empresa, ges_centro_de_costos.Descripcion as centro from ges_trabajadores INNER JOIN int_cargo INNER JOIN ges_empresa INNER JOIN ges_centro_de_costos where ges_trabajadores.Cargo_id=int_cargo.Id and ges_trabajadores.Estado=1 and ges_trabajadores.Empresa_id=ges_empresa.Id and ges_trabajadores.Centro_de_costo_id=ges_centro_de_costos.id order by Rut desc";

	$resultado = $this->con->Consultar($query);

	if(!$resultado){
				die("Error");
		}else{
			while($data = mysqli_fetch_assoc($resultado)){
				$arreglo["data"][]=array_map("utf8_encode",$data);
				}
			echo  json_encode($arreglo);
			}
	mysqli_free_result($resultado);
	

	}


function listarGerencias(){

	$query = "SELECT * from int_gerencia";

	$resultado = $this->con->Consultar($query);

	if(!$resultado){
				die("Error");
		}else{
			while($data = mysqli_fetch_assoc($resultado)){
				$arreglo["data"][]=array_map("utf8_encode",$data);
				}
			echo  json_encode($arreglo);
			}
	mysqli_free_result($resultado);

}	

function insertar($sql){

$resultado= $this->con->Consultar($sql);

if(!$resultado){echo "<script>alert('Error')</script>";
}else
{
	echo "<script>alert('Registro Creado exitosamente!')</script>";
}
}


}