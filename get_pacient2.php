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

  //echo 'Hay un total de '.$total.' filas afectadas <br>';
  while ($row = mysqli_fetch_assoc($result_join)){
    //echo "$('#name').val('".$row['name']."');  $('#lastname').val('".$row["lastname"]."');";
    echo $row['name'];
  

}
//se cierra la conexion
mysqli_close($con);

?>
