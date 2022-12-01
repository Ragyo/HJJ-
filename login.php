<?php session_start() ?>
<div class="container-fluid">
	<form action="" id="login-frm">
		<div class="form-group">
			<label for="" class="control-label">Usuario</label>
			<input type="text" name="user" required="" class="form-control">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Contraseña</label>
			<input type="password" name="password" required="" class="form-control">
			<small><a href="javascript:void(0)" id="new_account">Nueva cuenta</a></small>
		</div>
		<button class="button btn btn-warning  btn-sm">Entrar</button>
	</form>
</div>
<style>
	#uni_modal .modal-footer{
		display:none;
	}
	.button {
		color: #212529;
  background-color: #ffc107;
  border-color: #ffc107;
		} 
		.container-fluid{
			width: 50%;
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
}
.form-control {
  display: block;
  width: 100%;
  height: calc(1.5em + 0.75rem + 2px);
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  font-weight: 400;
  line-height: 1.5;
  color: #495057;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #ced4da;
  border-radius: 0.25rem;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
</style>

<script>
	$('#new_account').click(function(){
		uni_modal("Create an Account",'signup.php?redirect=index.php?page=checkout')
	})
	$('#login-frm').submit(function(e){
		e.preventDefault()
		$('#login-frm button[type="submit"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'admin/ajax.php?action=login2',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#login-frm button[type="submit"]').removeAttr('disabled').html('Login');

			},
			success:function(resp){
				if(resp == 1){
					location.href ='<?php echo isset($_GET['redirect']) ? $_GET['redirect'] : 'index.php?page=home' ?>';
				}else{
					$('#login-frm').prepend('<div class="alert alert-danger">Email or password is incorrect.</div>')
					$('#login-frm button[type="submit"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
</script>