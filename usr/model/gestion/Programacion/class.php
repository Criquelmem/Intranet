<?php
session_start();
/**
* 
*/
include("../../../../dist/conexion.php");
class Ges_prog
{
	public $con;
	public $listbox;
	public static $cc;
	function __construct()
	{
		$this->cc=$_SESSION["cc"];
		$this->con = new Conexion();
	}


	function pendientes(){

	$sql="select id as cant from ges_solicita_cambio where estado='1'";
	
	$rs=$this->con->Consultar($sql);
	$cantidad=mysqli_num_rows($rs);
	echo $cantidad;
	
	}


	function solicitudes(){

					
					?>
					<thead>
					<tr>
					<th>#</th>
					<th>Usuario que solícita</th>
					<th>Centro</th>
					<th>Planilla</th>
					<th>Mensaje</th>
					<th>Estado</th>
					</tr>
					</thead>
					<tbody>
					
					<?php $sql="select ges_trabajadores.Nombre, ges_solicita_cambio.id, ges_centro_de_costos.Descripcion, ges_solicita_cambio.mensaje, ges_solicita_cambio.planilla, ges_solicita_cambio.estado from ges_solicita_cambio INNER JOIN ges_trabajadores inner join ges_centro_de_costos where ges_trabajadores.Rut=ges_solicita_cambio.usuario and ges_solicita_cambio.estado=1 and ges_trabajadores.Centro_de_costo_id=ges_centro_de_costos.id
";
					echo $sql;
					$rs=$this->con->Consultar($sql);
					while($row=mysqli_fetch_array($rs)){
					?><tr data-toggle="modal" data-target="#modificar" data-id="<?php echo $row['planilla']?>" >
					<td><?php echo  $row['id']?></td>
					<td><?php echo  $row['Nombre']?></td>
					<td><?php echo  $row['Descripcion']?></td>
					<td><?php echo  $row['planilla']?></td>
					<td><?php echo  $row['mensaje']?></td>
					<td><?php $estado=$row['estado']; if($estado==1){echo '<span class="label label-warning">Pendiente</span>';}else{echo '<span class="label label-success">Realizado</span>';}?></td>
					
					
					</tr>
					<?php }?>
					</tbody>
<?php
	}


		function solicitudestodo(){

					
					?>
					<thead>
					<tr>
					<th>#</th>
					<th>Usuario que solícita</th>
					<th>Centro</th>
					<th>Planilla</th>
					<th>Mensaje</th>
					<th>Estado</th>
					</tr>
					</thead>
					<tbody>
					
					<?php $sql="select ges_trabajadores.Nombre, ges_solicita_cambio.id, ges_centro_de_costos.Descripcion, ges_solicita_cambio.mensaje, ges_solicita_cambio.planilla, ges_solicita_cambio.estado from ges_solicita_cambio INNER JOIN ges_trabajadores inner join ges_centro_de_costos where ges_trabajadores.Rut=ges_solicita_cambio.usuario and ges_solicita_cambio.estado=0 and ges_trabajadores.Centro_de_costo_id=ges_centro_de_costos.id";
					echo $sql;
					$rs=$this->con->Consultar($sql);
					while($row=mysqli_fetch_array($rs)){
					?><tr data-toggle="modal" data-target="#modificar" data-id="<?php echo $row['planilla']?>" >
					<td><?php echo  $row['id']?></td>
					<td><?php echo  $row['Nombre']?></td>
					<td><?php echo  $row['Descripcion']?></td>
					<td><?php echo  $row['planilla']?></td>
					<td><?php echo  $row['mensaje']?></td>
					<td><?php $estado=$row['estado']; if($estado==1){echo '<span class="label label-warning">Pendiente</span>';}else{echo '<span class="label label-success">Realizado</span>';}?></td>
					
					
					</tr>
					<?php }?>
					</tbody>
<?php
	}

			
			function select_ayudantes($id_ay,$cc){
	
			
			echo '<select name="ayu'.$id_ay.'" id="ayu" class="form-control" >';
			echo '<option value="">  </option>';
			$sql_ayu1="select ges_trabajadores.Rut, ges_centro_de_costos.Descripcion, ges_trabajadores.codigo_ayu, ges_trabajadores.Nombre from ges_trabajadores inner join ges_centro_de_costos where ges_trabajadores.Rut not in (SELECT ayu from ges_program_ayu_y_cond where ges_program_ayu_y_cond.fecha='$fecha') and ges_trabajadores.Cargo_id='2' and ges_trabajadores.Centro_de_costo_id='$cc' and ges_centro_de_costos.id=ges_trabajadores.Centro_de_costo_id";
			$rs_sql_ayu1=$this->con->Consultar($sql_ayu1);
			while($row_ayu1=mysqli_fetch_array($rs_sql_ayu1)){
			echo "<option value=".$row_ayu1['Rut'] .">".$row_ayu1['Descripcion']." -- ".  $row_ayu1['codigo_ayu']." - ".$row_ayu1['Nombre']."</option>";
			}	
			echo " </select> ";
	
			}


			function select_conductor($cc){
			
			echo '<select name="selectConductor" class="form-control" >';
			echo '<option value="">  </option>';
			$sql_conductor="select ges_trabajadores.Rut, ges_centro_de_costos.Descripcion, ges_trabajadores.codigo_cond, ges_trabajadores.Nombre from ges_trabajadores inner join ges_centro_de_costos where  ges_trabajadores.Cargo_id='8' and ges_trabajadores.Centro_de_costo_id='$cc' and ges_centro_de_costos.id=ges_trabajadores.Centro_de_costo_id";
		
			$rs_cond=$this->con->Consultar($sql_conductor);
			while($row_cond=mysqli_fetch_array($rs_cond)){
			echo "<option value=".$row_cond['Rut'] .">".$row_cond['Descripcion']." -- ".  $row_cond['codigo_cond']." - ".$row_cond['Nombre']."</option>";
			}	
			echo " </select> ";
			
			}

		function carga_update_programacion($id){
		
		$sql="SELECT ges_solicita_cambio.id, ges_solicita_cambio.usuario, ges_solicita_cambio.mensaje, ges_solicita_cambio.planilla, ges_solicita_cambio.estado, ges_trabajadores.Nombre, ges_trabajadores.Centro_de_costo_id FROM `ges_solicita_cambio` INNER JOIN ges_trabajadores where planilla='$id' AND ges_solicita_cambio.estado=1 and ges_trabajadores.Rut=ges_solicita_cambio.usuario";

		//muestra informacion de planilla
		$rs=$this->con->Consultar($sql);
		while ($row=mysqli_fetch_array($rs)) {
		//para mostrar solo los de un determinado centro
			$centro=$row['Centro_de_costo_id'];
		echo "<strong>El usuario </strong> ".$row['usuario']." - ".$row['Nombre']." 
		<br><strong>Solicita el cambio: </strong> ". $row['mensaje']. "<br><strong>planilla N° </strong> ".  $row['planilla']; $planilllas=$row['planilla'];
		}
		echo "<br>";
		$sql_prog="select ges_programacion.Conductor, ges_trabajadores.Nombre from ges_programacion inner join  ges_program_ayu_y_cond inner join ges_trabajadores where  ges_programacion.Planilla='$id' and ges_program_ayu_y_cond.planilla='$id' and ges_program_ayu_y_cond.ayu=ges_trabajadores.Rut";
		
		$rs_prog=$this->con->Consultar($sql_prog);
		$i=1;
		while ($row_prog=mysqli_fetch_array($rs_prog)) {
		$conductor= "Conductor : ". $row_prog['Conductor']."<br>";
		echo "Ayudante ".$i++. ":  ". $row_prog['Nombre']."<br>";
		
		}
		echo $conductor;
		echo "<br>";
		echo "<form method='POST' Action='controllers/gestion/Programacion/guardaCambios.php'>";
		echo '<input type="hidden" name="planilla" value='.$id.'> ';
		echo "Conductor";
		$this->select_conductor($centro);
		echo "<br>";
		echo "Ayudante 1";
		//text box ayudantes
		$id_ay=1;
		$this->select_ayudantes($id_ay,$centro);
		echo "<br>";
		echo "Ayudante 2";
		$id_ay=2;
		$this->select_ayudantes($id_ay,$centro);
		echo "<br>";
		echo "Ayudante 3";
		$id_ay=3;
		$this->select_ayudantes($id_ay,$centro);
		echo '<div align="center"><br><input type="submit" value="Guardar" name="enviar" class="btn btn-warning"></div>';
		echo "</form>";
		}


}