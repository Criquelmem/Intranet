<?php
session_start();
require("../../model/login/class.php");
$login= new Login();
$rutt=($_POST['rut']);
$passs=($_POST['pass']);
$true = $login->login($rutt,$passs);

if($true==true){
        echo '<script>window.location="usr/index.php"</script>';
    }
    else
    {
        echo $true;
    }

