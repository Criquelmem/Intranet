			<?php 
			include("../../../dist/conexion.php");
			require("../../include/valida.php");
			
			class Programacion 
			{
			public $con;
			function __construct()
			{
			$this->con = new Conexion();
			
			}
			
			function __destruct(){
			$this->con = null;
			}	
			
			
			function conductores(){
			
			$fecha =date("y") . "-" . date("m") . "-" . date("d");
			$cc=$_SESSION["cc"];
			$sql="select count(ges_trabajadores.Rut) as cant from ges_trabajadores where ges_trabajadores.Rut not in (SELECT ayu from ges_program_ayu_y_cond where ges_program_ayu_y_cond.fecha='$fecha') and ges_trabajadores.Cargo_id='10' and ges_trabajadores.Centro_de_costo_id='$cc'";
			$rs=$this->con->Consultar($sql);
			while($row=mysqli_fetch_array($rs)){
			
			echo $row['cant'];
			
			}
			
			
			}	
			
			function ayudantes(){
		
			$fecha =date("y") . "-" . date("m") . "-" . date("d");
			$cc=$_SESSION["cc"];
			$sql="select codigo_ayu, Nombre from ges_trabajadores where ges_trabajadores.Rut not in (SELECT ayu from ges_program_ayu_y_cond where ges_program_ayu_y_cond.fecha='$fecha') and ges_trabajadores.Cargo_id='2' and ges_trabajadores.Centro_de_costo_id='$cc' and ges_trabajadores.Estado='1'";

			$rs = $this->con->Consultar($sql);
			while($row=mysqli_fetch_array($rs)){
			echo $row['codigo_ayu']." - ".$row['Nombre']."<br><br>";
			}
								}	
			
			
		function ayudantesDisponibles(){
	
		$fecha =date("y") . "-" . date("m") . "-" . date("d");
		$cc=$_SESSION["cc"];
		$sql="select count(Rut) as cant from ges_trabajadores where ges_trabajadores.Rut not in (SELECT ayu from ges_program_ayu_y_cond where ges_program_ayu_y_cond.fecha='$fecha') and ges_trabajadores.Rut not in (select ges_fallas.Rut from ges_fallas where ges_fallas.Fecha='$fecha')  and ges_trabajadores.Cargo_id='2' and ges_trabajadores.Centro_de_costo_id='$cc' and ges_trabajadores.Estado='1'";
		$rs=$this->con->Consultar($sql);
		while($row=mysqli_fetch_array($rs)){
		echo $row['cant'];
		}
										}
	
		function cargaProgramacion($order){
		
		$cc=$_SESSION["cc"];
		
		if($order==""){
		$ordenar="";
		}else{
		$ordenar="order by ".$order."";
		}
		$fecha_servidor=date("Y") . "-" . date("m") . "-" . date("d");
		$sql="select Planilla, Corte_ccu, Fecha_ccu, N_cargas, Conductor from ges_programacion where  (cent_costo=$cc) and (Fecha_ccu='$fecha_servidor'or Estado=0)  $ordenar"; 

		$rs=$this->con->Consultar($sql);

		while($row=mysqli_fetch_array($rs)){
		?>
		<div class="col-lg-2 col-sm-6 col-xs-6">
		<br />
		<div align="center" class='panel panel-success'  data-toggle="modal" data-target="#crear_programacion" data-id=<?php echo $row['Planilla']?>>
		<?php $n_planilla=$row['Planilla'];echo "Planilla n° ".$row['Planilla']?>
		<?php echo "Cargas ".$row['N_cargas'];
		
		?>         
		<?php //ve estado de planilla
		$sql_cant="SELECT count(Planilla) as cant FROM `ges_program_ayu_y_cond` WHERE Planilla IN (SELECT Planilla FROM ges_programacion where Planilla='$n_planilla')";
		$rscant=$this->con->Consultar($sql_cant);
		while($roecant=mysqli_fetch_array($rscant)){
		$cant=$roecant['cant'];
		}
		?>
		<?php if($cant!=0){ echo '<div align="center"><img src="../images/pulgar1.png" height="40px"  width="40px"></div>';}else{echo '<div align="center"><img src="../images/pendiente.png" height="40px"  width="60px"></div>';} ?>
		<?php echo "Corte ".$row['Corte_ccu'];
		echo "<br> Fecha ".$row['Fecha_ccu'];?>
		</div>
		</div>
		<?php }
							}//fin funcion
	
				function listaAyudantes(){
				
				$fecha =date("y") . "-" . date("m") . "-" . date("d");
				$cc=$_SESSION["cc"];
				$sql="select codigo_ayu, Nombre, Rut from ges_trabajadores where ges_trabajadores.Rut not in (SELECT ayu from ges_program_ayu_y_cond where ges_program_ayu_y_cond.fecha='$fecha') and ges_trabajadores.Rut not in (select ges_fallas.Rut from ges_fallas)  and ges_trabajadores.Cargo_id='2' and ges_trabajadores.Centro_de_costo_id='$cc' and ges_trabajadores.Estado='1'";	

				$resultado =$this->con->Consultar($sql);
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

					
						function listaConductores(){
						
						$fecha =date("y") . "-" . date("m") . "-" . date("d");
						$cc=$_SESSION["cc"];
						$sql="select codigo_cond, Nombre, Rut from ges_trabajadores where ges_trabajadores.Rut not in (SELECT ayu from ges_program_ayu_y_cond where ges_program_ayu_y_cond.fecha='$fecha') and ges_trabajadores.Rut not in (select ges_fallas.Rut from ges_fallas)  and ges_trabajadores.Cargo_id='8' and ges_trabajadores.Centro_de_costo_id='$cc' and ges_trabajadores.Estado='1'";	
						
						$resultado =$this->con->Consultar($sql);
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
				

				function guardaFalla($rut, $falla){		
				$fecha =date("y") . "-" . date("m") . "-" . date("d");
				$sql="insert into ges_fallas values ('".$rut."', '".$fecha."', '".$falla."') ";
				$this->con->Consultar($sql);
				$descripcion="Falla de trabajador Rut ".$rut." ingresada id falla ".$falla."";
				//$falla->guarda_log($id_usr, $cc, $descripcion);
							}		

		
				
				function guarda_log($id_usr, $cc, $descripcion){
				$time = date('g:i:s');
				$fecha =date("y") . "-" . date("m") . "-" . date("d");
				$sql_log="insert into reg_log values('', '$id_usr', '$cc', '$fecha $time', '$descripcion')";
				$this->con->Consultar($sql_log);
				}

				function guardaProgramacion($nplanilla, $ayu, $N ){
				if(!$ayu)
				{
				echo "<script>swal('Programación','Guardada Correctamente','success')</script>";
				header("location:../../crear_programacion.php"); 
				exit();
				}else{
				$fecha  =date("y") . "-" . date("m") . "-" . date("d");
				$update ="insert into ges_program_ayu_y_cond values ('', '$nplanilla', '$ayu', '$fecha', '$N')";
				$this->con->Consultar($update);
				echo "<script>swal('Programación','Guardada Correctamente','success')</script>"; 
				}
				}		
				
						
				
				function guarda_ayudantes($nplanilla, $ayu1, $ayu2, $ayu3){
					//guarda haciendo update  en tabla ges_programacion
				$sql="UPDATE ges_programacion SET ayu1 = '$ayu1', ayu2='$ayu2', ayu3='$ayu3' 
				WHERE ges_programacion.Planilla = '$nplanilla'";
				$this->con->Consultar($sql);
				$update_ges_programacion="update ges_programacion set Estado=1 where Planilla='$nplanilla'";
				$this->con->Consultar($update_ges_programacion);

								
																			}

				function envia_solicitud_cambio($idusr, $mensaje, $planilla){
				
				$sql="insert into ges_solicita_cambio values('','$idusr','$mensaje','$planilla', '1') ";
				$this->con->Consultar($sql);
				echo"<script>alert('Solicitud de cambio realizada');</script>";
				
				}																
	
	}//fin class	


