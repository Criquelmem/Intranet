<?php 

class menu
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

    function menu(){


$idusr= $_SESSION["idusr"];
$sql="select * from int_permisos where rut='$idusr'";
$rs=$this->con->Consultar($sql);

while($row=mysqli_fetch_array($rs)){
  
  $p1=$row['Administrar_usuarios'];
  $p2=$row['ver_todo'];
  $p3=$row['ver_solo_gerencia'];
  $p4=$row['noticias'];   
  $p5=$row['fondo_fijos'];
  $p6=$row['Programacion'];
  $p7=$row['gestion'];
  $p8=$row['Gestion_trabajadores'];
  $p9=$row['Administrar_programacion'];
  $p10=$row['cc_usu'];
  $p11=$row['cc_admin'];
  }
?>

<li class="header hidden-xs">Menu</li>
   
        <?php if($p1==1){ ?>
        <li class="treeview">
        <a href="#">
        <i class="fa fa-address-card" aria-hidden="true"></i>
        <span>Administrar</span>
        <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
        </span>
        </a>
        <ul class="treeview-menu">
        <li><a href="crear-usr.php"><i class="fa fa-users" aria-hidden="true"></i>Usuarios</a></li>
        </ul>
        </li>
        <?php }?> 
               
          
        
        
        <?php 
        if($p4==1){ ?>
        <li class="treeview">
        <a href="#">
        <i class="fa fa-newspaper-o" aria-hidden="true"></i>
        <span>Noticias</span>
        <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
        </span>
        </a>
        <ul class="treeview-menu">
        <li><a href="editarnoticia.php"><i class="fa fa-circle-o"></i>Noticias</a></li>
        </ul>
        </li>
        <?php }?>
        
 
    
     
        <?php  if($p6==1){?>
        <li class="treeview">
        <a href="#">
        <i class="fa fa-tasks" aria-hidden="true"></i>
        <span>Programación</span>
        <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
        </span>
        </a>
        <ul class="treeview-menu">
        <li><a href="crear_programacion.php"><i class="fa fa-terminal" aria-hidden="true"></i>Programar</a></li>
        <li><a href="importar_Programacion.php"><i class="fa fa-cloud-upload" aria-hidden="true"></i>Importar Programación</a></li>
        </ul>
        </li>
        <?php } ?>
            
            <?php  if($p7==1){?>
            <li class="treeview">
            <a href="#">
            <i class="fa fa-address-book-o" aria-hidden="true"></i>
            <span>Gestión</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
            <?php  if($p8==1){?> <li><a href="trabajadores.php"><i class="fa fa-address-book-o" aria-hidden="true"></i>Admin Trabajadores</a></li>   
            <li><a href="fallas.php"><i class="fa fa-file-code-o" aria-hidden="true"></i>Licencias Fallas</a></li><?php } ?> 
            <?php  if($p9==1) {?> <li><a href="admin_programacion.php"><i class="fa fa-file-code-o" aria-hidden="true"></i>Admin Programación</a></li><?php } ?>
            </ul>
            </li>
            <?php } ?>


            
                  <?php  if($p10==1 or $p11==1){?>
            <li class="treeview">
            <a href="#">
            <i class="fa fa-address-book-o" aria-hidden="true"></i>
            <span>Cuenta Corriente</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
            <?php  if($p11==1) {?> <li><a href="cuentaCorriente.php"><i class="fa fa-file-code-o" aria-hidden="true"></i>Cuenta corriente</a></li><?php } ?>
            </ul>
            </li>
            <?php } ?>
<?php

}

}
