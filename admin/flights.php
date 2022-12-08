<?php include 'db_connect.php' ?>

<div class="container-fluid">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<large class="card-title">
					<b>Listado de Reservaciones</b>
				</large>
				<button class="btn btn-primary btn-block col-md-2 float-right" type="button" id="new_flight"><i class="fa fa-plus"></i> Reservacion</button>
			
			</div>
			<div class="card-body">
				<table class="table table-bordered" id="flight-list">
					<colgroup>
						<col width="15%">
						<col width="25%">
						<col width="50%">
						<col width="10%">
					</colgroup>
					<thead>
						<tr>
							<th class="text-center">N° Folio</th>
							<th class="text-center">Informacion</th>
							<th class="text-center">Detalles de Reservacion</th>
							<th class="text-center">Acciones</th>
						</tr>
					</thead>
					<tbody>

						<?php
							$i=1;
							$qry = $conn->query("SELECT DATEDIFF(fecha_salida,fecha_llegada) AS numnoches, z.*,y.airlines,w.habitacion,w.disponible,p.temp_alta,p.tem_baja FROM  flight_list z inner join airlines_list y on y.id = z.tipo_id inner join habitaciones w on w.id = z.habitacion_id inner join precio_habitacion p on p.habitacion_id = w.id order by z.id  desc");
							while($row = $qry->fetch_assoc()):

						 ?>
						 <tr>
						 	
						 	<td><?php echo $row['folio'] ?></td>
						 	<td>
						 		<p> <b> Nombre : </b><?php echo $row['nombre'] ?></p>							
								<p> <b> Telefono : </b><?php echo $row['telefono'] ?></p>
								<p> <b> Correo : </b><?php echo $row['correo'] ?></p>
								<p> <b> Lugar de Residencia : </b><?php echo $row['lugar_residencia'] ?></p>
						 	</td>
						 	<td>
						 		<div class="row">
						 		<div class="col-sm-1">
						 		<!--	<img src="../assets/img/<?php// echo $row['logo_path'] ?>" alt="" class="btn-rounder badge-pill">-->
						 		</div>
						 		<div class="col-sm-9">		
							    <p> <b> Habitacion : </b><?php echo $row['habitacion'] ?></p>
								<p> <b> Tipo de Habitacion : </b><?php echo $row['airlines'] ?></p>
								<!--<p> <b> Disponibilidad : </b><?//php echo ($row['disponible'] == 0) ? 'No': 'Si' ?></p>-->
						 		<p> <b> Fecha de Llegada : </b><?php echo $row['fecha_llegada'] ?></p>
								<p> <b> Fecha de Salida : </b><?php echo $row['fecha_salida'] ?></p>
								<p> <b> Numero de Noches : </b><?php echo $row['numnoches'] ?></p>
								<p> <b> Pago por Noches : </b><?php echo ($row['temporada'] == 'baja') ? $row['tem_baja'] : $row['temp_alta'] ?></p>
								<p> <b> Fecha de Reservacion : </b><?php echo $row['fecha_reservacion'] ?></p>
								<p> <b> Deposito : </b><?php echo $row['deposito'] ?></p>
								<p> <b> Numero de Personas : </b><?php echo $row['n_pax'] ?></p>
								<p><b>Saldo a Pagar: </b><?php  echo ($row['temporada'] == 'baja') ? $row['numnoches'] * $row['tem_baja'] : $row['numnoches'] * $row['temp_alta'] ?></p>
						 		</div>
						 		</div>
						 	</td>
						 	<td class="text-center">
						 			<button class="btn btn-outline-primary btn-sm edit_booked" type="button" data-id="<?php echo $row['id'] ?>"><i class="fa fa-edit"></i></button>
						 			<button class="btn btn-outline-danger btn-sm delete_booked" type="button" data-id="<?php echo $row['id'] ?>"><i class="fa fa-trash"></i></button>
						 	</td>

						 </tr>

						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<style>
	td p {
		margin:unset;
	}
	td img {
	    width: 8vw;
	    height: 12vh;
	}
	td{
		vertical-align: middle !important;
	}
</style>	
<script>
	$('#flight-list').dataTable()
	$('#new_booked').click(function(){
		uni_modal("New Flight","manage_booked.php",'mid-large')
	})
	$('#new_flight').click(function(){
		uni_modal("Nueva Reservacion","manage_flight.php",'mid-large')
	})
	$('.edit_booked').click(function(){
		uni_modal("Edit Information","manage_booked.php?id="+$(this).attr('data-id'),'mid-large')
	})
	$('.delete_booked').click(function(){
		_conf("Are you sure to delete this data?","delete_booked",[$(this).attr('data-id')])
	})
function delete_booked($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_flight',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Flight successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>