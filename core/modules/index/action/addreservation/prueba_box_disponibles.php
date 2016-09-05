<?php 
$con=mysqli_connect("localhost","root","root","bookmedik");
// Check connection
if (mysqli_connect_error())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$hora='17:00';
// Perform queries
$result=mysqli_query($con,"SELECT category_id FROM reservation WHERE time_at = '$hora'");
$total = mysqli_num_rows(mysqli_query($con,"SELECT category_id FROM reservation WHERE time_at = '$hora'"));

    
		if($total==0){
			echo 'No hay box disponibles';
		}else{
		    //echo 'Hay un total de '.$total.' filas afectadas <br>';
		    while ($row = mysqli_fetch_assoc($result)){
		    	$result2=mysqli_query($con,"SELECT name FROM category WHERE id = '".$row['category_id']."'");
		    	while ($row2 = mysqli_fetch_assoc($result2)){
		    		echo $row2['name']."<br> ";
		    	}
		    }
		}

mysqli_close($con);
?>