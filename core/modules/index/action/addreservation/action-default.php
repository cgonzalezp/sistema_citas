<?php

$r = new ReservationData();
$p = new PacientData();

//Datos del paciente
$name = $p->name = $_POST["name"];
$lastname = $p->lastname = $_POST["lastname"];
$p->address = $_POST["address"];
$p->email = $_POST["email"];
$p->phone = $_POST["phone"];
$rut = $p->rut = $_POST["rut"];
$check_digit = $p->check_digit = $_POST["check_digit"];


$con=mysqli_connect("localhost","root","1451.r2d2","bookmedik");
// Check connection
if (mysqli_connect_error())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


// Perform queries 
$result=mysqli_query($con,"SELECT * FROM pacient where rut='$rut' and check_digit='$check_digit'");

$total = mysqli_num_rows(mysqli_query($con,"SELECT * FROM pacient where rut='$rut' and check_digit='$check_digit'"));

    
		if($total==0){
			//echo 'No hay usuarios, el paciente es nuevo';
			$p->add();// si es nuevo se agrega el paciente
			$id_pacient=$p->getIdPacient($name,$lastname);//se obtiene el id del nuevo paciente
			//Datos de la cita
			$r->title = $_POST["title"];
			$r->note = $_POST["note"];
			$r->message = "";
			$r->pacient_id = $id_pacient;
			$r->medic_id = 1;
			$r->date_at = $_POST["date_at"];
			$r->time_at = $_POST["time_at"];
			$r->user_id = $_SESSION["user_id"];
			$r->status_id = $_POST["status_id"];
			$r->category_id = $_POST["category_id"];
			$r->add();//se agrega la reserva.
			
			Core::redir("./index.php?view=reservations");
		}else{
		    while ($row = mysqli_fetch_assoc($result)){

			//Datos de la cita
			$r->title = $_POST["title"];
			$r->note = $_POST["note"];
			$r->message = "";
			$r->pacient_id = $row['id'];
			$r->medic_id = 1;
			$r->date_at = $_POST["date_at"];
			$r->time_at = $_POST["time_at"];
			$r->user_id = $_SESSION["user_id"];
			$r->status_id = $_POST["status_id"];
			$r->category_id = $_POST["category_id"];
			$r->add();//se agrega la reserva.
			
			//echo "se agrego la cita <br>";
			Core::redir("./index.php?view=reservations");
			}
		}

mysqli_close($con);
?>

