<?php require('include/valida.php');?>
       <!DOCTYPE html>
       <html>
       <?php require('include/header.php');?>
       <body class="hold-transition skin-blue sidebar-mini">
       <div class="">
       
       <header class="main-header">
       <?php include_once "include/menu_arriba.php";?>
       </header>
       
       
       <aside class="main-sidebar">
       <section class="sidebar">
       <ul class="sidebar-menu">       
       <?php include "include/menu.php";?> 
       </ul>
       </section>
       </aside>
       
       
       </div>



  <!-- pagina -->

 <div class="content-wrapper " >

 <br>
 <br class="hidden-xs">
 <br class="hidden-xs">
 <div class="col-lg-2 col-xs-5"> <a class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#crear_grncia" ><i class="fa fa-plus" aria-hidden="true" > &nbsp;Crear Gerencia</i></a></div>
 <div class="col-lg-2 col-xs-5"> <a class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#crear_dpto" ><i class="fa fa-plus" aria-hidden="true" > &nbsp;Crear Departamento</i></a></div>
 <div class="col-lg-2 col-xs-5"> <a class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#crear_deposito" ><i class="fa fa-plus" aria-hidden="true" > &nbsp;Crear Depositos</i></a></div>
 
  
              <div class="container-fluid"  >
              
              <div class="col-sm-offset-2 col-sm-8">
              <h3 class="text-center"> <small class="mensaje"></small></h3>
              </div>
              <div class="table-responsive col-sm-12">    
              <table id="dt_user" class="table table-bordered table-hover table-condensed " width="100%"  style="background-color: white;">
              <thead>
              <tr>                
              <th>Rut</th>
              <th>Nombre</th>
              <th>Cargo</th>
              <th>Empresa</th>  
              <th>Centro</th> 
              <th></th>                 
              </tr>
              </thead>          
              </table>
              </div>      
              
              </div>
         
        
         
 </div>

             
             <!-- modal permisos-->
             <div class="modal fade" id="sistemas_permiso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
             <div class="modal-dialog">
             <div class="modal-content">
             <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
             <h4 class="modal-title">Asignar permisos y sistemas</h4>
             </div>
             <div class="modal-body" id="bodyusu" >
             <input type="text" name="" id="txt" value="">
               
             </div>
           <div class="modal-footer"></div>
             </div>
             </div>
             </div>
             </div>
             <!-- fin modal permisos -->










            <!-- modal crear departamento o deposito -->
            
            <div class="modal fade" id="crear_dpto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h2 class="" align="center">Crear Departamento</h2>
            </div>
            <div class="modal-body"></div>
            </div>
            </div>
            </div>
            
            <!-- fin modal-->

                    <!--Modal crear gerencia -->
                    <div class="modal fade" id="crear_grncia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h2  align="center">Crear Gerencia</h2>
                    </div>
                    <div class ="modal-body">
                    <form role="form" method="post" id="form_gerencia">
                    <div class="form-group col-lg-12">
                    <label class="control-label" for="exampleInputPassword1">Nombre</label>
                    <input class="form-control" i placeholder="" type="text" id="txt_nombre" required name="txtnombre">
                    <br />
                    <div align="center">
                    <input type="submit" class="btn btn-primary btn-lg" name="btn_crear_gerencia" value="Registrar">
                    </div>
                    </div>
                    <br />                
                    </form>
                    <?php
                    if(isset($_POST['btn_crear_gerencia']))
                    {
                      require("model/conexion_pros.php");
                      $cnn=Conectar();
                      $nombre=$_POST['txtnombre'];
                      $sql="insert into int_gerencia values('','$nombre')";
                      mysqli_query($cnn, $sql);

                    }
                    ?>
                    
                    <div class="table-responsive col-sm-12">    
                    <table id="dt_gerencia" class="table table-bordered table-hover" width="100%"  style="background-color: white">
                    <thead>
                    <tr>                
                    <th>#</th>
                    <th>Nombre</th>
                    </tr>
                    </thead>          
                    </table>
                    </div>  
                    </div>
                    <div class="modal-footer"></div>
                    </div>
                    </div>
                    </div>
                    <!-- fin modal -->


                 <!-- Crear deposito-->
                 <div class="modal fade" id="crear_deposito" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                 <div class="modal-content">
                 <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                 <h2  align="center">Crear Deposito</h2>
                 </div>
                 <div class="modal-body">
                 <form role="form" method="post">
                 <div class="form-group col-lg-12">
                 <label class="control-label" for="exampleInputPassword1">Nombre</label>
                 <input class="form-control" i placeholder="" type="text" id="txt_nombre_depo" required name="txtnombre">
                 <br />
                 <div align="center">
                 <input type="submit" class="btn btn-primary btn-lg" name="btn_crear_depo" value="Crear">
                 </div>
                 </div>
                 <br />                
                 </form>
                 <?php if(isset($_POST['btn_crear_depo']))
                 {
                 $nombre=$_POST['txt_nombre_depo'];
                 }?>
                 <br>
                 <br>
                 <br>
                 <br>
                 <br>
                 <br>
                 </div>
                 </div>
                 </div>
                 </div>

 

  </body>



<?php require("include/footer.php");?>
                                                                  

                  <script>
        $(document).ready(function() {
        listar();
        listargerencia();
        verificarRut();
  $("#btnColapse").trigger("click");
       
        });

             
             
      
                                function verificarRut(){
                                $("#nombre").focus(function(evento){          
                                var rut = $("#rut").val();
                                var validador = $("#dv").val();
                                evento.preventDefault();
                                $('#destinorut').html('<div><img src="../images/ajax-loader.gif"/></div>');
                                $("#destinorut").load("../funciones/verificarrut.php", {Rut: rut, Verf: validador}, function(){ })
                                });
                                
                                }                                   

                   function listar(){
                   var table = $("#dt_user").DataTable({
                   
                   
  
                   language: {
                 "sProcessing":     "Procesando...",
                 "sLengthMenu":     "Mostrar _MENU_ registros",
                 "sZeroRecords":    "No se encontraron resultados",
                 "sEmptyTable":     "Ningún dato disponible en esta tabla",
                 "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                 "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                 "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                 "sInfoPostFix":    "",
                 "sSearch":         "Buscar:",
                 "sUrl":            "",
                 "sInfoThousands":  ",",
                 "sLoadingRecords": "Cargando...",
                 "oPaginate": {
                 "sFirst":    "Primero",
                 "sLast":     "Último",
                 "sNext":     "Siguiente",
                 "sPrevious": "Anterior"
                 },
                 "oAria": {
                 "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                 "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                 }
                   },
                   
                   "ajax":{
                   "method":"POST",
                   "url":"../usr/controllers/usuarios/listar_usuarios.php"
                   },
                   
                   "columns":[
                   {"data":"Rut"},
                   {"data":"Nombre"},
                   {"data":"cargo"},
                   {"data":"empresa"},
                   {"data":"centro"},
                   
                   {"defaultContent":"<button type='button' class='editar btn btn-success btn-xs' data-toggle='modal' data-target='#sistemas_permiso'><i class='fa fa-pencil-square-o' ></i></button>  "}
                   
                   ]
                   
                   })
                   
                   ObtenerDataEditar("#dt_user tbody", table);
                   }
                   
                   var ObtenerDataEditar = function (tbody, table){
                   $(tbody).on("click", "button.editar", function(){
                   var data = table.row( $(this).parents("tr")).data();

//cuando se abre modal carga y envia datos a modal permisos
                   $('#sistemas_permiso').on('show.bs.modal', function (event) {
                    
                    $("#bodyusu").load("controllers/usuarios/modal_permisos.php", {c:data.Rut});
                             
                   });
                   
                   
                   
                   })
                   }


                     function listargerencia(){
                   var table = $("#dt_gerencia").DataTable({
                   
                   
  
                   language: {
                 "sProcessing":     "Procesando...",
                 "sLengthMenu":     "Mostrar _MENU_ registros",
                 "sZeroRecords":    "No se encontraron resultados",
                 "sEmptyTable":     "Ningún dato disponible en esta tabla",
                 "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                 "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                 "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                 "sInfoPostFix":    "",
                 "sSearch":         "Buscar:",
                 "sUrl":            "",
                 "sInfoThousands":  ",",
                 "sLoadingRecords": "Cargando...",
                 "oPaginate": {
                 "sFirst":    "Primero",
                 "sLast":     "Último",
                 "sNext":     "Siguiente",
                 "sPrevious": "Anterior"
                 },
                 "oAria": {
                 "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                 "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                 }
                   },
                   
                   "ajax":{
                   "method":"POST",
                   "url":"../usr/controllers/usuarios/listar_gerencias.php"
                   },
                   
                   "columns":[
                   {"data":"id"},
                   {"data":"nombre"}
                  ]
                   
                   })
                   
                          }


                   


  </script>

</html>