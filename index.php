<?php
session_start();
include "core/autoload.php";

$lb = new Lb();
$lb->loadModule("index");
//echo "<script>alert('Traer datos del estado y el box, en el edit de las reservas');</script>";
?>