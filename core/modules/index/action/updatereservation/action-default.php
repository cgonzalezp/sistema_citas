<?php
$con=mysqli_connect("localhost","root","root","bookmedik");

if(count($_POST)>0){
	$user = ReservationData::getById($_POST["id"]);
	$user->title = $_POST["title"];
	$user->pacient_id = $_POST["pacient_id"];
	$user->medic_id = $_POST["medic_id"];
	$user->date_at = $_POST["date_at"];
	$user->time_at = $_POST["time_at"];
	$user->note = $_POST["note"];
	$user->status_id = $_POST["status_id"];
	$user->category_id = $_POST["category_id"];
	$user->update();
	mysqli_query($con,"UPDATE category SET status=".$_POST["status_id"]." WHERE id=".$_POST["category_id"]."");

mysqli_close($con);

print "<script>window.location='index.php?view=reservations';</script>";


}


?>