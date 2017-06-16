<?php
session_start();
//error_reporting(0);
if(!isset($_SESSION['Rut']) || !isset($_SESSION['cc']))
{
        session_destroy();
        header ("Location: ../index.php");

}
?>
