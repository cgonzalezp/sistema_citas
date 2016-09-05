<?php 

$rut=$_POST['rut']." - ".$check_digit=$_POST['check_digit'];
//se realiza la conexion a la BD.
$con=mysqli_connect("localhost","root","root","bookmedik");
// Se verifica la conexion.
if (mysqli_connect_error())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
// Se ejecuta la sentencia SQL
$sql="SELECT * from pacient WHERE rut='".$_POST['rut']."' and check_digit='".$_POST['check_digit']."'";
$result_join=mysqli_query($con,$sql);
$total = mysqli_num_rows(mysqli_query($con,$sql));

if($total==0){
  //echo '<script>alert("El paciente es nuevo");</script>';
  echo '<script>
		    $("#name").val("'.$row[''].'");
		    $("#lastname").val("'.$row[''].'");
		    $("#address1").val("'.$row[''].'");
		    $("#email1").val("'.$row[''].'");
		    $("#phone1").val("'.$row[''].'");
		</script>'; 
}else{
  	 //echo 'Hay un total de '.$total.' filas afectadas <br>';
	  while ($row = mysqli_fetch_assoc($result_join)){


		    echo '<script>
		    $("#name").val("'.$row['name'].'");
		    $("#lastname").val("'.$row['lastname'].'");
		    $("#address1").val("'.$row['address'].'");
		    $("#email1").val("'.$row['email'].'");
		    $("#phone1").val("'.$row['phone'].'");
		    </script>'; 

		    /*echo $row['name']."<br>";
		    echo $row["lastname"]."<br>";
		    echo $row['address']."<br>";
		    echo $row['email']."<br>";
		    echo $row['phone']."<br>";*/
		
	    
	}
}
//se cierra la conexion
mysqli_close($con);

?>
