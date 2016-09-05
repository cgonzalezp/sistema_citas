<?php 
$reservation = ReservationData::getById($_GET["id"]);
$pacients = PacientData::getAll();
$medics = MedicData::getAll();
?>
<div class="row">
	<div class="col-md-8">
	<h1>Editar Cita</h1>
	<br>
<form class="form-horizontal" role="form" method="post" action="./?action=updatereservation">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Asunto</label>
    <div class="col-lg-10">
      <input type="text" name="title" value="<?php echo $reservation->title; ?>" required class="form-control" id="inputEmail1" placeholder="Asunto">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Paciente</label>
    <div class="col-lg-10">
<select name="pacient_id" class="form-control" required>
<option value="">-- SELECCIONE --</option>
  <?php foreach($pacients as $p):?>
    <option value="<?php echo $p->id; ?>" <?php if($p->id==$reservation->pacient_id){ echo "selected"; }?>><?php echo $p->id." - ".$p->name." ".$p->lastname; ?></option>
  <?php endforeach; ?>
</select>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Medico</label>
    <div class="col-lg-10">
<select name="medic_id" class="form-control" required>
<option value="">-- SELECCIONE --</option>
  <?php foreach($medics as $p):?>
    <option value="<?php echo $p->id; ?>" <?php if($p->id==$reservation->medic_id){ echo "selected"; }?>><?php echo $p->id." - ".$p->name." ".$p->lastname; ?></option>
  <?php endforeach; ?>
</select>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Fecha/Hora</label>
    <div class="col-lg-5">
      <input type="date" name="date_at" value="<?php echo $reservation->date_at; ?>" required class="form-control" id="inputEmail1" placeholder="Fecha">
    </div>
    <div class="col-lg-5">
      <input type="time" name="time_at" value="<?php echo $reservation->time_at; ?>" required class="form-control" id="inputEmail1" placeholder="Hora">
    </div>
  </div>

  <h3>Box</h3>
  <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Seleccionar box*</label>
      <div class="col-lg-5">
        <table>
          <td><input type="checkbox" name="category_id" class="form-control" id="category_id" value="13">Diagnostico</td><td></td>
          <td><input type="checkbox" name="category_id" class="form-control" id="category_id" value="14">Moxibustion</td><td></td>
          <td><input type="checkbox" name="category_id" class="form-control" id="category_id" value="16">Acupuntura </td><td></td>
        </table>
      </div>
  </div>

  <h3>Estado</h3>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Seleccionar Estado*</label>
    <div class="col-lg-5">
      <select name="status_id" class="form-control" id="status_id" >
        <option value="<?php echo $reservation->status_id; ?>" disabled="disabled" selected>
          <?php 
          if($reservation->status_id == 1){
            echo "Estado actual: Pendiente";
          }else{
            echo "Estado actual: Realizada";
          } 
          ?>
        </option>
        <option  value="1">Pendiente</option>
        <option value="2">Realizada</option>
      </select>
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nota</label>
    <div class="col-lg-10">
    <textarea class="form-control" name="note" placeholder="Nota"></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="id" value="<?php echo $reservation->id; ?>">
      <button type="submit" class="btn btn-default">Actualizar Cita</button>
    </div>
  </div>
</form>

	</div>
</div>