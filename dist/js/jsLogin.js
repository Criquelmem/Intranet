
$("#btnLogIn").on("click", function(){

var rut=$("#txtRut").val();
var pass =$("#txtpass").val();


$.ajax({
url: 'usr/controllers/login/login.php',
type: 'POST',
async:false,
data: { 
rut: rut, pass:pass
},  
beforeSend: function () {
$("#respuesta").html('<div align="center"><img src="images/ajax-loader.gif"/></div>');
},
success: function(html){$("#respuesta").html(html);},
error: function(error){
console.log('error' + error)
}
});
});

