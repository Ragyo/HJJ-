<style>
	.logo {
    margin: auto;
    font-size: 20px;
    
    padding: 7px 11px;
    border-radius: 50% 50%;
    color: #000000b3;
    
}
img {
  border: 1px solid #ddd;
  border-radius: 100%;
  padding: 5px;
  width: 66px;
  
}
div large b {
  font-size: 25px;
  padding-top: 25px;
  
}
.container {
  height: 25px;
  

}
</style>





<nav  class="navbar navbar-light fixed-top bg-primary" style="padding:0;">
  <div class="container-fluid mt-2 mb-2">
  	<div class="col-lg-12">
  		<div class="col-md-1 float-left" style="display: flex;">
  			<div class="logo">

        <img src="../assets/img/logohotel.png">
  			</div>
  		</div>
      <br> 
      <div class="col-md-6 float-left text-white container">
        <large><b>Sistema de Reservaciones Hotel Jardin Jaluco</b></large>
      </div>
	  	<div class="col-md-2 float-right text-white">
	  		<a href="ajax.php?action=logout" class="text-white"><?php echo $_SESSION['login_name'] ?> <i class="fa fa-power-off"></i></a>
	    </div>
    </div>
  </div>
  
 
</nav>