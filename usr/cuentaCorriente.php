<?php require('include/valida.php');?>
       <!DOCTYPE html>
       <html>
       <?php require('include/header.php');?>
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
              
              <div class="content-wrapper ">
              <br class="hidden-xs">
              <br class="hidden-xs">
              <br class="hidden-xs">

          
              <ol class="breadcrumb">
              <li class="active">Cuenta Corriente: "Centro"</li>
              </ol>
             

              <div class="container">
               <div class="col-lg-1 col-xs-6">Año<input type="text" placeholder="Año" name="txtAno" class="form-control input-sm" maxlength="4"></div>
              <div class="col-lg-2 col-xs-4">  Mes
              <select name="comboMes" class="form-control" >
              <option value="1">Enero</option>
              <option value="1">Febrero</option>
              <option value="1">Marzo</option>
              <option value="1">Abril</option>
              <option value="1">Mayo</option>
              <option value="1">Junio</option>
              <option value="1">Julio</option>
              <option value="1">Agosto</option>
              <option value="1">Septiembre</option>
              <option value="1">Octubre</option>
              <option value="1">Noviembre</option>
              <option value="1">Diciembre</option>
              </select>
              </div>
             
              
              <div class="col-lg-2 col-xs-6 ">Centro<div id="comboCentro" ></div></div>
              
              <div class="col-lg-3 col-xs-6 ">Trabajador<div id="comboTrabajador" ></div></div>
              
              <div class="col-lg-3 col-xs-6">Planilla<input type="text" placeholder="N° Planilla" name="txtPlanilla" class="input-sm form-control" maxlength="8"></div>
              
              <div class="col-lg-1 col-xs-6">&nbsp;<br><button type="submit" name="btnFiltrar" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i>
              Buscar</button></div>
              
              </div>

            <div >
            <br>
            <div class="well well-lg" style="margin-left: 3%; margin-right: 3%;">
            <table width="100%"   class="table table-condensed table-striped table-primary">
            <tr>
            <th width="25%" >Planilla</th>
            <th width="25%">Trabajador</th>
            <th width="25%">Total ingresos cajas</th>
            <th width="25%">Total ingresos</th>
            <th width="25%">Diferencias</th>
            </tr>
            <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            </tr>
            </table>
            </div>

            </div>

             <div id="footer">
             <div class="col-lg-6">
             <div class ="panel panel-primary" >
             <div class=" panel-heading"></div>
             
             <table width="100%">
             <tr>
             <td>Año:</td>
             <td>Mes:</td>
             <td>Retiros:</td>
             
             </tr>
             <tr>
             <td>Centro:</td>
             <td>Trabajador:</td>
             <td>Cobros:</td>
             
             </tr>
             <tr>
             <td>Planilla:</td>
             <td>Total ingreso a caja:</td>
             <td>Diferencias:</td>
             
             </tr>
             </table>
             </div>
             </div>
             
             <div class="col-lg-5"></div>
             <div class="col-lg-1 pull-right"  >
             <button class="btn btn-primary btn-lg BtnFlotante" data-toggle="modal" data-target="#modalvalores" ><i class="fa fa-plus" aria-hidden="true"></i></button>    
             </div>
             </div>

              <style>
              #footer {
              margin-top: 25%;
              
               }
              @media screen and (max-width: 480px) {
              #footer {
              margin-top: 65%;
              display:scroll;
              position:fixed;
              }
              }
              .BtnFlotante {
              display:scroll;
              position:fixed;
              bottom:3%;
              right:2%;
                        }
              @media screen and (max-width: 480px) {
              .BtnFlotante {
              bottom:5%;
              display:scroll;
              position:fixed;
              }
              }              
              </style>
              
           
              
              </div>


                 <?php require('include/footer.php');?>
              </body>







                <!-- valores modal -->
                <div class="modal fade" id="modalvalores" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" >×</button>
                <b>Ingreso de valores para planilla</b>
                </div>
                <div class="modal-body" >
                <form class="form-inline" role="form">
                <div class="form-group">
                <input type="number" class="form-control" id="txtPlanilla"  placeholder="Numero de planilla" required="">
                </div>
                <div  class="btn btn-primary" id="btnBuscarPlanilla">Buscar</div>&nbsp;<a id="activaTxt">New</a>
                </form>
                <br>
                <div class="well well-lg" id="contenedordatos">
                <table width="100%" border="0">
                <tr>
                <td>Planilla N°:</td>
                <td>Fecha:</td>
                </tr>
                <tr>
                <td>Conductor:</td>
                <td>Centro:</td>
                </tr>
                <tr>
                <td>Corte:</td>
                <td>Cargas:</td>
                </tr>
                </table>
                </div>
                <div class="col-lg-12">
                <div class="well well-lg" id="contenedorTxtValores">
                
                <form class="form-inline" role="form">
                <div class="form-group">
                
                <div class="col-lg-6 col-xs-12">
                Valor Planilla
                <input type="text" name="TxtValPlanilla" id="TxtValPlanilla" value="">
                </div>
                
                <div class="col-lg-6 col-xs-12">
                Efectivo
                <input type="number" name="txtEfectivo" id="txtEfectivo" value="" required="" />
                </div>
                
                <div class="col-lg-6 col-xs-12">
                Cheque
                <input type="number" name="txtCheque" id="txtCheque" value="" required=""/>
                </div>
                
                <div class="col-lg-6 col-xs-12">
                Promae
                <input type="number" name="txtPromae" id="txtPromae" value="" required=""/>
                </div>
                
                
                <div class="col-lg-6 col-xs-12">
                Flete porteo
                <input type="number" name="txtflete" id="txtflete" value="" required=""/>
                </div>
                
                </div>
                </form>
                </div>
                </div>

                <div align="center">
                <div class="col-lg-12">
                
                <div class="col-lg-4 col-xs-6 ">
                <a id="btningresarGasto"  class="btn btn-primary btn-sm " >
                <i class="fa fa-credit-card" aria-hidden="true"></i>
                &nbsp;Gastos</a>
                </div>
                
                <div class="col-lg-4 col-xs-6"><a class="btn btn-primary btn-sm" id="btningresarchequespendientes" ><i class="fa fa-list-alt" aria-hidden="true"></i>
                &nbsp;Cheques P</a>
                </div>
                
                <div class="col-lg-4 col-xs-6">
                <a class="btn btn-primary btn-sm "  id="btnChConta" >
                <i class="fa fa-address-card" aria-hidden="true"></i>
                &nbsp;Cheques C</a>
                </div>
                <br>
                
                <br>
                <div class="col-lg-4 col-xs-6">
                <a class="btn btn-primary btn-sm "  id="btnAbono" >
                <i class="fa fa-address-card" aria-hidden="true"></i>
                &nbsp; Abono</a>
                </div>
                
                <div class="col-lg-4 col-xs-6">
                <a class="btn btn-primary btn-sm "  id="btnRetiro" >
                <i class="fa fa-sign-out" aria-hidden="true"></i>
                &nbsp;Retiro</a>
                </div>
                
                <div class="col-lg-4 col-xs-6">
                <a class="btn btn-primary btn-sm" id="btnCobro" >
                <i class="fa fa-money" aria-hidden="true"></i>
                &nbsp;Cobros</a>
                </div>
                <br>
                <br>
                <br>
                </div>

                <div class="modal-footer"><div align="center"><button type="submit" class="btn btn-danger" id="btnGuardar"><i class="fa fa-floppy-o" aria-hidden="true"></i>
&nbsp;Guardar</button></div></div>
                </div>
                </div>
                </div>
                </div>


               <!--ingreso de gastos -->
               <div class="modal fade" id="ingresarGasto" tabindex="-1"  >
               <div class="modal-dialog" >
               <div class="modal-content" >
               <div class="modal-header">
               <button type="button" class="close"  id="closeGastos">×</button>
               <h4 class="modal-title">Ingresar Gastos</h4>
               </div>
               <div class="modal-body" >
               <form method="post" action="">
               <input type="text" name="planilla" id="txtPlanillaGastos" placeholder="" class="form-control hidden " />
               <div class="col-lg-6"> Item
               <div id="comboGastos"></div>
               </div>
               
               <div class="col-lg-6">
               Monto
               <input type="text" name="txtMonto" placeholder="" id="TxtMonto" class="form-control" />
               </div>

               <div class="col-lg-12">
               Observación
               <textarea  name="txtObservacion" id="TxtObs"  class="form-control" ></textarea> 
               </div>
               <br>
               <br>
               </form>
               </div>
               <br>
               <div class="modal-footer" >
               <div align="center" class="col-lg-12"><br>
               <input  value="Guardar" name="btn"   class="btn btn-primary" id="BtnguardaGastos"  />
               <br>
               </div>
               <div>&nbsp;</div>
                <div id="ContTablaGastos"></div>
               </div>
               </div>
               </div>
               </div>    


             
                     <!--ingreso de gastos -->
                     <div class="modal fade" id="ingresarchequespendientes" tabindex="-1"  >
                     <div class="modal-dialog" >
                     <div class="modal-content" >
                     <div class="modal-header">
                     <button type="button" class="close"  id="closechp">×</button>
                     <h4 class="modal-title">Ingresar cheques Pendientes</h4>
                     </div>
                     <div class="modal-body">
                     <form method="post">
                     <input type="text" name="planilla" id="txtplanillachp" placeholder="" class="form-control hidden  " />
                     <br>                   
                   <div class="col-lg-6">
                   N° de cheque 
                   <input type="number"  id="txtnCheque" placeholder="" class="form-control" required  />
                   </div>
                   <div class ="col-lg-6">
                   Banco
                   <div id="listboxbanco"></div>
                   </div>
                   <div class="col-lg-6"> 
                   Cliente
                   <div id="listboxcliente"></div>
                   </div>
                   <div class="col-lg-6"> 
                   Concepto
                   <div id="listboxconcepto"></div>
                   </div>
                   <div class="col-lg-6"> 
                   Estado
                   <select name="estado" id="estado" class="form-control" required>
                   <option value=""></option>
                   <option value="1">Pendiente</option>
                   <option value="2">Aceptado</option>
                   <option value="3">Efectivo</option>
                   <option value="4">Contabilidad</option>
                   <option value="5">Nulo</option>
                   </select>
                   </div>
                   <div class="col-lg-6"> 
                   Fecha de reposición
                   <input type="date" name="fechaRepo" id="fechaRepo" placeholder="" class="form-control  " required/>
                   </div>
                   <div class="col-lg-8"> 
                   Observación
                   <input type="text" name="txtobs" id="txtobs" placeholder="" class="form-control  " required/>
                   </div>
                   <div class="col-lg-4"> 
                   Monto
                   <input type="text" name="monto" id="monto" placeholder="" class="form-control  " required/>
                   <br>
                   </div>
                   <div align="center"><div  class="btn btn-primary" id="btnclosechp" /><i class="fa fa-floppy-o" aria-hidden="true"></i>
                   &nbsp;Guardar</div></div>
                   <div id="ContTablachp">
                     
                   </div>
                   
                   </div>
                   <div class="modal-footer"> </div>
                   </form>
                   </div>
                   </div>
                   </div>
                   </div> 

                   <!--ingreso de cheques conta -->
                     <div class="modal fade" id="ModalChConta" >
                     <div class="modal-dialog">
                     <div class="modal-content">
                     <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                     <h4 class="modal-title">Ingresar cheques Contabilidad</h4>
                     </div>
                     <div class="modal-body">
                     <form method="post" >
                     <input type="text" name="planilla" id="Planillachc" placeholder="" class="form-control hidden " />
                      <div class="col-lg-6">
                     N° de cheque
                     <input type="number" name="nCheque" id="" placeholder="" class="form-control" required />
                     </div>
                     <div class="col-lg-6">
                     Banco
                     <div id="listboxchcBanco"></div>
                     </div>
                     <div class="col-lg-6">
                     Cliente
                     <div id="combocliente">sad</div>
                     </div>
                     <div class="col-lg-6">
                     Estado
                     <select name="estado" class="form-control" required>
                     <option value=""></option>
                     <option value="1">Depositado</option>
                     <option value="2">Pendiente de deposito</option>
                     </select>
                     </div>
                     <div class="col-lg-6">
                     Fecha de reposición
                     <input type="date" name="fechaRepo" id="" placeholder="" class="form-control  " required/>
                     </div>
                     <div class="col-lg-6">
                     Observación
                     <textarea  name="txtobs" id="" placeholder="" class="form-control  " required ></textarea>
                     </div>
                     <div class="col-lg-12">
                     Monto
                     <input type="number" name="monto" id="" placeholder="" class="form-control  " required/>
                     <br>
                     </div>
                     <div align="center"><br><input  name="btn" class="btn btn-success"  value="Guardar" id="btnGuardaChConta" /></div>
                     </form>
                    </div>
                     <div class="modal-footer">
                     </div>
                     </div>
                     </div>
                     </div>

</html>


<script>
 $(document).ready(function() {
 $("#btnColapse").trigger("click");
 cargaCombos();
 });    

//busca Planilla
$("#btnBuscarPlanilla").click(function() {
BuscaPlanilla();
Buscaplan();
});
                                                  
 //guarda valores modal ingreso de valores planilla                                                          
$("#btnGuardar").on("click", function(){
guarda();
});

 //guarda valores modal ingreso de gastoss                                                        
$("#BtnguardaGastos").on("click", function(){
guardaGastos();
});

 //guarda valores modal ingreso de gastoss                                                        
$("#btnclosechp").on("click", function(){
GuardaChP();
});
 //guarda valores modal ingreso de gastoss                                                        
$("#btnGuardaChConta").on("click", function(){
GuardaChConta();
});


//open modales

 //modal chpendientes
            $("#btnChConta").on("click", function(){
            var id = $("#txtPlanilla").val();
            cargaTablachP(id);
            if(!id)
            {
            swal({
            title: 'Debes seleccionar una planilla',
            text: "",
            type: 'warning',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Aceptar',
            animation: true,
            allowOutsideClick: false
            }).then(function () {
            $("#ModalChConta").modal('hide');
            });
            }
            $("#Planillachc").val(id);
            $("#listboxchcBanco").load("controllers/cuentacorriente/comboBanco.php");
            $("#combocliente").load("controllers/cuentacorriente/comboCliente.php");
                       
            $("#ModalChConta").modal('show');
            cargaTablaGastos(id);
            })
            //fin modal chpendientes

            //modal chpendientes
            $("#btningresarchequespendientes").on("click", function(){
            var id = $("#txtPlanilla").val();
            cargaTablachP(id);
            if(!id)
            {
            swal({
            title: 'Debes seleccionar una planilla',
            text: "",
            type: 'warning',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Aceptar',
            animation: true,
            allowOutsideClick: false
            }).then(function () {
            $("#ingresarchequespendientes").modal('hide');
            });
            }
            $("#txtplanillachp").val(id);
            $("#listboxbanco").load("controllers/cuentacorriente/comboBanco.php");
            $("#listboxcliente").load("controllers/cuentacorriente/comboCliente.php");
            $("#listboxconcepto").load("controllers/cuentacorriente/comboConcepto.php");
           
            $("#ingresarchequespendientes").modal('show');
            cargaTablaGastos(id);
            })
            //fin modal chpendientes



           //modal gastos
           $("#btningresarGasto").on("click", function(){
           var id = $("#txtPlanilla").val();
           if(!id)
           {
           swal({
           title: 'Debes seleccionar una planilla',
           text: "",
           type: 'warning',
           showCancelButton: false,
           confirmButtonColor: '#3085d6',
           confirmButtonText: 'Aceptar',
           animation: true,
           allowOutsideClick: false
           }).then(function () {
            $("#ingresarGasto").modal('hide');
           });
           }
           $("#txtPlanillaGastos").val(id);
           $("#comboGastos").load("controllers/cuentacorriente/combogastos.php");
           $("#ingresarGasto").modal('show');
            cargaTablaGastos(id);
           })
           //fin modal gastos
       





$("#btnAbono").on("click", function(){
$("#ingresarGasto").modal('show');
})
$("#btnRetiro").on("click", function(){
$("#ingresarGasto").modal('show');
})
$("#btnCobro").on("click", function(){
$("#ingresarGasto").modal('show');
})



 //cierra modales                                                                                           
$("#closeGastos").on("click", function(){
$("#ingresarGasto").modal("hide");
})
$("#closeGastosGuarda").on("click", function(){
$("#ingresarGasto").modal("hide");
})
//chp
$("#closechp").on("click", function(){
$("#ingresarchequespendientes").modal("hide");
})

//end chp

//fin cierra modales


//restablese todos los txt's                      
$("#activaTxt").on("click", function(){
 restablecer();
 })   

//fin restablece



//funciones
 function restablecer(){
$('#contenedordatos').fadeIn(1000).html('');
$("#txtPlanilla").removeAttr("disabled");
$("#txtPlanilla").val('');
$("#TxtValPlanilla").val('');
$("#txtEfectivo").val('');
$("#txtCheque").val('');
$("#txtPromae").val('');
$("#txtflete").val('');
 }                                

function guarda(){
var idplanilla=  $("#txtPlanilla").val();
var val=  $("#TxtValPlanilla").val();
var f= $("#txtEfectivo").val();
var ch = $("#txtCheque").val();
var pro = $("#txtPromae").val();
var fle= $("#txtflete").val();
$.ajax(
{
url: 'Controllers/cuentacorriente/guardaValores.php',
method: 'POST',
data: {idplanilla:idplanilla, val:val, f:f, ch:ch, pro:pro, fle:fle },
beforeSend: function () {
},
success: function (data) {
swal('Registros Guardados','¡Correctamente!','success');
}, 
error: function (error) {
console.log("Errors:" + error);
}
});
}  

// Funciones Guarda
function GuardaChConta(){
var planilla     = $("#planilla").val();
var nCheque      = $("#nCheque").val();
var comboBanco   = $("#comboBanco").val();
var comboCliente = $("#comboCliente").val();
var fechaRepo    = $("#fechaRepo").val();
var txtobs       = $("#txtobs").val();
var monto        = $("#monto").val();
$.ajax(
{
url: 'Controllers/cuentacorriente/guardaValoreschC.php',
method: 'POST',
data: {planilla:planilla, nCheque:nCheque, comboBanco:comboBanco, comboCliente:comboCliente, fechaRepo:fechaRepo, txtobs:txtobs, monto:monto   },
beforeSend: function () {
},
success: function (data) {
swal('Valores Guardados','¡Correctamente!','success');
cargaTablaGastos(idplanilla);
$("#planilla").val('');
$("#nCheque").val('');
$("#comboBanco").val('');
$("#comboCliente").val('');
$("#fechaRepo").val('');
$("#txtobs").val('');
$("#monto").val('');

}, 
error: function (error) {
console.log("Errors:" + error);
}
});
}  

function guardaGastos(){
var idplanilla=  $("#txtPlanillaGastos").val();
var TxtMonto=  $("#TxtMonto").val();
var TxtObs= $("#TxtObs").val();
var comboGAstos = $("#comboGAstos").val();
$.ajax(
{
url: 'Controllers/cuentacorriente/guardaValoresgastos.php',
method: 'POST',
data: {idplanilla:idplanilla, TxtMonto:TxtMonto, TxtObs:TxtObs, comboGAstos:comboGAstos},
beforeSend: function () {
},
success: function (data) {
swal('Valores Guardados','¡Correctamente!','success');
cargaTablaGastos(idplanilla);
$("#txtPlanillaGastos").val('');
$("#TxtMonto").val('');
$("#TxtObs").val('');
$("#comboGAstos").val('');
}, 
error: function (error) {
console.log("Errors:" + error);
}
});
}  

function GuardaChP(){
var idplanilla=  $("#txtplanillachp").val();
var ncheque=  $("#txtnCheque").val();
var banco= $("#comboBanco").val();
var combocliente = $("#comboCliente").val();
var comboconcepto = $("#comboconcepto").val();
var estado = $("#estado").val();
var fechaRepo = $("#fechaRepo").val();
var txtobs = $("#txtobs").val();
var monto = $("#monto").val();

$.ajax(
{
url: 'Controllers/cuentacorriente/guardaValoreschP.php',
method: 'POST',
data: {idplanilla:idplanilla, ncheque:ncheque, banco:banco, combocliente:combocliente, comboconcepto:comboconcepto, estado:estado, fechaRepo:fechaRepo, txtobs:txtobs, monto:monto },
beforeSend: function () {
},
success: function (data) {
swal('Valores Guardados','¡Correctamente!','success');
cargaTablachP(idplanilla);
$("#txtplanillachp").val('');
$("#txtnCheque").val('');
$("#comboBanco").val('');
$("#comboCliente").val('');
$("#comboconcepto").val('');
$("#estado").val('');
$("#fechaRepo").val('');
$("#txtobs").val('');
$("#monto").val('');
}, 
error: function (error) {
console.log("Errors:" + error);
}
});
}  


function BuscaPlanilla(){
var id =$("#txtPlanilla").val();
if(!id){swal('Error','planilla vacia', 'warning')}else{
$.ajax(
{
url: 'Controllers/cuentacorriente/datosPlanillaJson.php',
method: 'POST',
async: true,
data: {planilla:id },
dataType: 'json',
beforeSend: function () {
},
success: function (data) {
$('#contenedorTxtValores').fadeIn(1000);
$("#TxtValPlanilla").val(data.Valor);
$("#txtEfectivo").val(data.Efectivo);
$("#txtCheque").val(data.Cheque);
$("#txtPromae").val(data.Promae);
$("#txtflete").val(data.Flete_porteo);
}, 
error: function (error) {
console.log("Errors:" + error);
}
});
}
}

function Buscaplan(){
var id =$("#txtPlanilla").val();
if(!id){swal('Error','planilla vacia', 'warning')}else{

 //desactiva txt para evitar errores
$("#txtPlanilla").attr("disabled","disabled");
$.ajax(
{
url: 'controllers/cuentacorriente/CargaDatos.php',
method: 'POST',
async: true,
data: { 
planilla: id,
},                         
beforeSend: function () {
$("#contenedordatos").html('<div align="center"><img src="../images/ajax-loader.gif"/></div>');
},
success: function (data) {
if(data == "No existen Registros para la planilla ingresada" ){
$("#txtPlanilla").removeAttr("disabled");
restablecer();
}
$('#contenedordatos').fadeIn(1000).html(data);
}, 
error: function (jqXHR, textStatus, errorThrown ) {
alert('textStatus');
console.log(textStatus)
}
});
}
}

function cargaCombos(){

$.ajax({
url: 'controllers/cuentacorriente/comboCentros.php',
type: 'POST',
async: false,
success: function(html){$("#comboCentro").html(html);},
error: function(error){
console.log('error' + error)
}
});
$.ajax({
url: 'controllers/cuentacorriente/comboTrabajador.php',
type: 'POST',
async: false,
success: function(html){$("#comboTrabajador").html(html);},
error: function(error){
console.log('error' + error)
}
});
console.log('Combos cargados');
}

function cargaTablaGastos(planilla){
$.ajax({
url: 'controllers/cuentacorriente/tablagastos.php',
type: 'POST',
async:false,
data: { 
planilla: planilla,
},  
beforeSend: function () {
$("#ContTablaGastos").html('<div align="center"><img src="../images/ajax-loader.gif"/></div>');
},
async: false,
success: function(html){$("#ContTablaGastos").html(html);},
error: function(error){
console.log('error' + error)
}
});
}

function cargaTablachP(planilla){
$.ajax({
url: 'controllers/cuentacorriente/tablachP.php',
type: 'POST',
async:false,
data: { 
planilla: planilla,
},  
beforeSend: function () {
$("#ContTablaGastos").html('<div align="center"><img src="../images/ajax-loader.gif"/></div>');
},
async: false,
success: function(html){$("#ContTablachp").html(html);},
error: function(error){
console.log('error' + error)
}
});
}
                      </script>

             