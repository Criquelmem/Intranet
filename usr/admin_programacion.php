<?php require('include/valida.php');?>
												<!DOCTYPE html>
												<html>
												<?php require('include/header.php');
														
												?>
												<body class="hold-transition skin-blue sidebar-mini">
												<div class="">
												
												<header class="main-header">
												<?php include_once "include/menu_arriba.php";?>
												</header>
												<!-- Left side column. contains the logo and sidebar -->
												
												<aside class="main-sidebar">
												<section class="sidebar">
												<ul class="sidebar-menu">       
												<?php include "include/menu.php";?> 
												</ul>
												</section>
												</aside>
												
												
												</div>
												
												
												
												<!-- Desde aqui -->
												
												<div class="content-wrapper"  style="background-color:#ECF0F5" >
												<br >
												<br>
												<br >
												<br>
												<ol class="breadcrumb" id="cargando">
												<li><a href="#" >Administrar Programación</a></li>
												
												</ol>
												<div class="col-lg-4">
												
												<div class="info-box ">
												<span class="info-box-icon bg-yellow"><i class="fa fa-id-card" aria-hidden="true" style="position:absolute; margin-top:18px; margin-left:-25px"></i>
												
												</span>
												
												<div class="info-box-content">
												<span class="info-box-text" >Solicitudes Pendientes</span>
												<span class="info-box-number" id="cant_pendientes"></span>
												</div>
												<!-- /.info-box-content -->
												</div>
												</div>
												<div class="col-lg-12">
												<div class="box box-info">
												<div class="box-header with-border">
												<h3 class="box-title">Solicitud de cambios</h3>
												
												<div class="box-tools pull-right">
												<button type="button" class="btn btn-box-tool" id="recargar"><i class="fa fa-refresh" aria-hidden="true"></i>
												</button>
												</div>
												</div>
												<!-- /.box-header -->
												<div class="box-body" style="display: block;">
												<div class="table-responsive">
												<table class="table no-margin" id="cargar_solicitudes">
												
												</table>
												</div>
												<!-- /.table-responsive -->
												</div>
												<!-- /.box-body -->
												<div class="box-footer clearfix" style="display: block;">
												
												<a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right" id="btnhistorial">Ver historial</a>
												</div>
												<!-- /.box-footer -->
												</div>
												</div>
												</div>
												dasd
												<!-- ./wrapper -->
												
												
												
														<div class="modal fade modal-primary" id="modificar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
														<div class="modal-dialog">
														<div class="modal-content">
														<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
														<h4 class="modal-title">Editar Programación</h4>
														</div>
														<div class="modal-body">
														
														<div id="modal_editar">	
														
														</div>
														
														
													
														
														</div>
														<div class="modal-footer"></div>
														</div>
														</div>
														</div>
												
												
												
			

												
												
												
												<?php require('include/footer.php');?>
												
												
												
												<script>
												
												$(document).ready(function(e) {
												//los nombres del php estan al reves planilla_todo.php esalreves
												$("#cant_pendientes").load("controllers/gestion/Programacion/pendientes.php");
												$("#cargar_solicitudes").load("controllers/gestion/Programacion/carga_solicitudes_cambio_planilla_todo.php");
												
												$("#recargar").click(function(e) {
												$("#cargar_solicitudes").load("controllers/gestion/Programacion/carga_solicitudes_cambio_planilla_todo.php");
												$("#cant_pendientes").load("controllers/gestion/Programacion/pendientes.php");
												});
												
												$("#btnhistorial").click(function(e) {
												$("#cargar_solicitudes").load("controllers/gestion/Programacion/carga_solicitudes_cambio_planilla.php");
												
												});
												
												});
												
												
												
												$('#modificar').on('show.bs.modal', function (event) {
												
												var button = $(event.relatedTarget); // Botón que activó el modal	
												var codigo = button.data('id');
												var consulta = codigo;       
												
												var parametros = {
												"id_planilla" : consulta,
												};
												$.ajax({
												data:  parametros,
												url:   'controllers/gestion/Programacion/editar_programacion.php',
												type:  'post',
												beforeSend: function () {
												$("#modal_editar").html("Procesando, espere por favor...");
												},
												success:  function (response) {
												$("#modal_editar").html(response);
												}
												
												});
												});
												
												
												</script>
												
												</body>
												</html>