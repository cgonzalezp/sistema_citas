<?php

if(count($_POST)>0){
	$user = new PacientData();
	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->address = $_POST["address"];
	$user->rut = $_POST["rut"];
	$user->check_digit = $_POST["check_digit"];
	$user->email = $_POST["email"];
	$user->phone = $_POST["phone"];
	$user->add();

print "<script>window.location='index.php?view=pacients';</script>";


}


?>