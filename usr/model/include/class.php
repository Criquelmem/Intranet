<?php
/**
* 
*/

include ("../dist/conexion.php");


class incluye
{
	public $con;
	function __construct()
	{
		$this->con = new Conexion();
	}
	
	function __destruct()
	{
	$this->con = null;
	}
	
	function compruebaSession($idusr,$rut)
	{
		if(!isset($idusr) or !isset($rut) ){
		session_destroy();
											}

	}

	function infousr(){
	$idusr=	$_SESSION["idusr"];
  $sqlusr="SELECT ges_trabajadores.Nombre, personaliza.img_usr, ges_centro_de_costos.Descripcion as cc, int_cargo.Descripcion, int_dpto.dpto from ges_trabajadores INNER JOIN int_cargo INNER JOIN int_dpto  inner join ges_centro_de_costos inner join personaliza where ges_trabajadores.Cargo_id=int_cargo.Id and ges_trabajadores.id_dpto=int_dpto.id and    ges_trabajadores.Centro_de_costo_id=ges_centro_de_costos.id and ges_trabajadores.Rut=personaliza.Rut and ges_trabajadores.Rut='$idusr'";
  	$rs=$this->con->Consultar($sqlusr);

while($rowusr=mysqli_fetch_array($rs)){
                                  
                              
                               ?>
					<!-- Informacion de usuario-->
					
					<!--para las propiedades de img usr y css colores modal html en footer -->
					<a href="#"  class="" data-toggle="modal" data-target="#Propiedades"><i class="fa fa-gears" > </i></a>

					<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<img src="<?php  echo $rowusr['img_usr']; ?>" class="user-image" alt="User Image" />
					<span class="hidden-xs"><?php  echo $rowusr['Nombre'];?></span>
					
                                     
                                  
					</a>
					<ul class="dropdown-menu">
					<!-- User image -->
					<li class="user-header">
					
					<img src="<?php  echo $rowusr['img_usr']; ?>" class="user-image" alt="User Image" align="center" />
					<p>
					<?php echo $rowusr['Nombre']. "<br> <small> Cargo: ". $rowusr['Descripcion']. "</small>"?>
					
					<?php  $dpto= $rowusr['cc']; echo "<small>". $dpto. "</small>"?>
					</p>

					</li>
					<?php }
	}
}