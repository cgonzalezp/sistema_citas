<?php 

$fecha=$_POST['date'];
$hora=$_POST['time'];
//se realiza la conexion a la BD.
$con=mysqli_connect("localhost","root","1451.r2d2","bookmedik");
// Se verifica la conexion.
if (mysqli_connect_error())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
//$fecha='2016-08-26';
//$hora='09:00';
// Se ejecuta la sentencia SQL
$sql="SELECT id as id_box, name as name_box from category WHERE id NOT IN(SELECT category_id FROM reservation where time_at='".$hora."' and date_at='".$fecha."')";
//$sql="SELECT distinct cat.id as id_box, cat.name as name_box FROM category cat INNER JOIN reservation r ON cat.id != r.category_id and cat.status = 2 and r.time_at='".$hora."'";
$result_join=mysqli_query($con,$sql);
$total = mysqli_num_rows(mysqli_query($con,$sql));
if($total==0){
  echo 'No hay box disponibles';
}else{
  //echo 'Hay un total de '.$total.' filas afectadas <br>';
  echo '<h3>Box</h3><div class="form-group">
  <label for="inputEmail1" class="col-lg-2 control-label">Seleccionar box*</label>
  <div class="col-lg-5">';
  echo"<table border=0 width=700 align='center'><tr>";
  $cont=0;
  while ($row = mysqli_fetch_assoc($result_join)){
    
    if($cont<4){
      echo "<td  width=500><input type='checkbox' name='category_id' class='form-control' id='category_id' value='".$row['id_box']."'>".$row['name_box']."<br></td>";
      $cont++;
    }else{
      echo"<td  width=500><input type='checkbox' name='category_id' class='form-control' id='category_id' value='".$row['id_box']."'>".$row['name_box']."<br></td>";
      echo"</tr><tr>";
      $cont=0;
    }
    
  }
  echo"</tr></table></div></div>";
}
//se cierra la conexion
mysqli_close($con);
?>