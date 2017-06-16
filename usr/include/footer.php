            
             <div class="modal fade " id="Propiedades" tabindex="-5" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
              <div class="modal-content">
              <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Propiedades</h4>
              </div>

              <div class="container user-menu">
				<form method="post" id="formulario" enctype="multipart/form-data">
				Subir imagen: <input type="file" name="file">
				</form>
				<div id="respuesta"></div>
				
			  </div>

              <div class="modal-footer"></div>
              </div>
              </div>
              </div>
		

<script src="../dist/js/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="../dist/js/bootstrap.min.js"></script>
<!-- jQuery Knob Chart -->
<script src="../dist/js/jquery.knob.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../dist/js/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../dist/js/jquery.slimscroll.min.js"></script>

<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>

<!-- Sweet alert-->
<script src="../dist/js/sweetalert2.min.js"></script>



<script src="../dist/js/funcionesjs.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>



<script>
$(document).ready(function() {
	
		//setInterval("notificacion_arriba()", 5000);
		//setInterval("notificacion_panel()", 5000);
		
});

     $(function(){
        $("input[name='file']").on("change", function(){
            var formData = new FormData($("#formulario")[0]);
            var ruta = "controllers/personaliza/imagen-ajax.php";
            $.ajax({
                url: ruta,
                type: "POST",
                data: formData,
                contentType: false,
				processData: false,
				beforeSend: function () {
				$("#respuesta").html('<div align=""><img src="../images/ajax-loader.gif"/></div>');
				},
				success: function(datos)
				{
					 swal({
            title: '¿Usar imagen como avatar?',
            text: "",
            type: 'warning',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Aceptar',
            animation: true,
            allowOutsideClick: false
            }).then(function () {
            $('#respuesta').fadeIn(1000).html(datos);
            });
					
                    
                }
            });
        });
     });
    </script>