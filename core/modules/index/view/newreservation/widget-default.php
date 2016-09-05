<?php
$pacients = PacientData::getAll();
$medics = MedicData::getAll();
?>

<script type="text/javascript">
function getBox(){
    var date_at=$('#date_at').val();
    var time_at=$('#time_at').val();
    if($('#date_at').val()!="" && $('#time_at').val()!=null){
    $("#view_box").load("get_box.php", {date: date_at, time: time_at}, function(){
      //alert("fecha: "+date_at+" y hora: "+time_at);
    });
  }
}  
function getPacient(){
    var rut=$('#rut').val();
    var check_digit=$('#check_digit').val();
    if($('#rut').val()!="" && $('#check_digit').val()!=""){
      $("#view_box").load("get_pacient.php", {rut: rut, check_digit: check_digit}, function(){
        //alert("rut ingresado: "+rut+"-"+check_digit);
      });
  }
}  

</script>



<div class="row">
<div class="col-md-10">
<h1>Nueva Cita</h1>
<form class="form-horizontal" role="form" method="post" action="./?action=addreservation">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Asunto*</label>
    <div class="col-lg-10">
      <input type="text" name="title" required class="form-control" id="inputEmail1" placeholder="Asunto">
    </div>
  </div>

  <h3>Informacion del paciente</h3>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Rut*</label>
    <div class="col-md-6">
      <table>
      <td><input type="text" name="rut" required class="form-control" id="rut" onchange="getPacient()" placeholder="Sin puntos ni guion"></td>
      <td><p>-</p></td>
      <td><input type="text" name="check_digit" required class="form-control" id="check_digit" onchange="getPacient()" placeholder="digito verificador"></td>
    </table>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="name" class="form-control" required id="name" placeholder="Nombre">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Apellido*</label>
    <div class="col-md-6">
      <input type="text" name="lastname" required class="form-control" id="lastname" placeholder="Apellido">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Direccion</label>
    <div class="col-md-6">
      <input type="text" name="address" class="form-control"  id="address1" placeholder="Direccion">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Email</label>
    <div class="col-md-6">
      <input type="text" name="email" class="form-control" id="email1" placeholder="Email">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Telefono</label>
    <div class="col-md-6">
      <input type="text" name="phone" class="form-control" id="phone1" placeholder="Telefono">
    </div>
  </div>

  <h3>Fecha y hora</h3>
  <div class="form-group">
    <label for="date_at" class="col-lg-2 control-label">Fecha/Hora*</label>
    <div class="col-lg-5">
      <input type="date" name="date_at" required class="form-control" id="date_at" onchange="getBox()" placeholder="Fecha">
    </div>
    <div class="col-lg-5">
      <select name="time_at" id="time_at" required class="form-control"  onchange="getBox()" placeholder="Hora">
        <option value="" disabled="disabled" selected="selected">Seleccione una hora</option>
        <option value="08:00">08:00</option>
        <option value="09:00">09:00</option>
        <option value="10:00">10:00</option>
        <option value="11:00">11:00</option>
        <option value="12:00">12:00</option>
        <option value="13:00">13:00</option>
        <option value="14:00">14:00</option>
        <option value="15:00">15:00</option>
        <option value="16:00">16:00</option>
        <option value="17:00">17:00</option>
        <option value="18:00">18:00</option>
        <option value="19:00">19:00</option>
        <option value="20:00">20:00</option>
        <option value="21:00">21:00</option>
      </select>
    </div>
  </div>

  <div align=right>
    <!--<input type="text" id="btn_box"value="Mostrar BOX" class="btn btn-default"></input>-->
    <!--<input type="text" id="btn_box"value="Mostrar BOX" onclick="javascript:recargar();" class="btn btn-default"></input>-->
  </div>

<div id="view_box"></div>


  <h3>Estado</h3>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Seleccionar Estado*</label>
    <div class="col-lg-5">
      <select name="status_id" class="form-control" id="status_id">
        <option  value="1">Pendiente</option>
        <option value="2">Realizada</option>
      </select>
    </div>
  </div>

  <h3>Observacion</h3>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nota</label>
    <div class="col-lg-10">
    <textarea class="form-control" name="note" placeholder="Nota"></textarea>
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-default">Agregar Cita</button>
    </div>
  </div>
</form>

</div>
</div>