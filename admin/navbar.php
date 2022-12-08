
<style>
</style>
 
<nav id="sidebar" class='mx-lt-5 bg-dark' >
		
		<div class="sidebar-list">
		<br> <br> 
				<a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span> Inicio</a>
				<a href="index.php?page=booked" class="nav-item nav-booked"><span class='icon-field'><i class="icofont-hotel"></i></span> Habitaciones</a>
				<a href="index.php?page=flights" class="nav-item nav-flights"><span class='icon-field'><i class="fa fa-book"></i></span> Reservaciones</a>
				<a href="index.php?page=airport" class="nav-item nav-airport"><span class='icon-field'><i class="fa fa-map-marked-alt"></i></span> Airport</a>		
				<a href="index.php?page=airport" class="nav-item nav-airport"><span class='icon-field'><i class="fa fa-building"></i></span> Airlines</a>		
				<?php if($_SESSION['login_type'] == 1): ?>
				<a href="index.php?page=users" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-users"></i></span> Usuarios</a>
				<a href="index.php?page=site_settings" class="nav-item nav-site_settings"><span class='icon-field'><i class="fa fa-cog"></i></span> Site Settings</a>
			<?php endif; ?>
		</div>

</nav>
<script>
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
