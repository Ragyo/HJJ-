<?php include 'db_connect.php' ?>

<div class="container-fluid">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<large class="card-title">
					<b>Listado de Resportes</b>
				</large>
				<button class="btn btn-primary btn-block col-md-2 float-right" type="button" id="new_booked"><i class="fa fa-plus"></i> Reservacion</button>
			
			</div>
			<div class="card-body">
				<table class="table table-bordered" id="flight-list">
					<colgroup>
						<col width="10%">
						<col width="30%">
						<col width="50%">
						<col width="10%">
					</colgroup>
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">Informacion</th>
							<th class="text-center">Detalles de Reservacion</th>
							<th class="text-center">Acciones</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$airport = $conn->query("SELECT * FROM habitaciones ");
							while($row = $airport->fetch_assoc()){
								$aname[$row['id']] = ucwords($row['airport'].', '.$row['location']);
							}
							$i=1;
							$qry = $conn->query("SELECT h.*,t.*,r.*,p.id,h.id as bid FROM reservaciones r  inner join habitaciones h on r.habitacion_id = h.id inner join tipohabitaciones t on t.id = h.tipo_id inner join preciohabitacion p on p.habitacion_id = h.id order by r.idReservaciones desc");
							while($row = $qry->fetch_assoc()):

						 ?>
						 <tr>
						 	
						 	<td><?php echo $i++ ?></td>
						 	<td>
						 		<p>Nombre :<b><?php echo $row['name'] ?></b></p>
						 		<p><small>Contacto # :<b><?php echo $row['contact'] ?></small></b></p>
						 		<p><small>Direccion :<b><?php echo $row['address'] ?></small></b></p>
								 <p><small>Correo Electronico :<b></small></b></p>
						 	</td>
						 	<td>
						 		<div class="row">
						 		<div class="col-sm-4">
						 			<!--<img src="../assets/img/<?php// echo $row['logo_path'] ?>" alt="" class="btn-rounder badge-pill">-->
						 		</div>
						 		<div class="col-sm-6">
						 		<p>Habitacion :<b><?php echo $row['airlines'] ?></b></p>
						 		<p><small>Personas :<b><?php echo $row['plane_no'] ?></small></b></p>
						 		<p><small>Fecha de Reservacion :<b><?php echo $row['airlines'] ?></small></b></p>
						 		<p><small>Noches de Reservacion :<b><?php echo $aname[$row['departure_airport_id']].' - '.$aname[$row['arrival_airport_id']] ?></small></b></p>
						 		<p><small>Entrada :<b><?php echo date('M d,Y h:i A',strtotime($row['departure_datetime'])) ?></small></b></p>
						 		<p><small>Salida :<b><?php echo date('M d,Y h:i A',strtotime($row['arrival_datetime'])) ?></small></b></p>
								<p><small>Anticipo : <b></small></b></p>
								<p><small>Saldo a Pagar : <b></small></b></p>
						 		</div>
						 		</div>
						 	</td>
						 	<td class="text-center">
						 			<button class="btn btn-outline-primary btn-sm edit_booked" type="button" data-id="<?php echo $row['bid'] ?>"><i class="fa fa-edit"></i></button>
						 			<button class="btn btn-outline-danger btn-sm delete_booked" type="button" data-id="<?php echo $row['bid'] ?>"><i class="fa fa-trash"></i></button>
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
		uni_modal("New Flight","manage_flight.php",'mid-large')
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