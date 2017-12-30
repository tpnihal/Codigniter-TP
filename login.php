<!DOCTYPE html>
<html>
<head>
	<title>login admin</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style type="text/css">
	.well
	{
		background-color: #0b0755;
	}
	.area
	{
		background-color: #007888;
	}
	.h1 
	{   color: white;
		font-family: fantasy;
		font-weight: ;
	}
</style>
</head>
<?php $sesid=$this->session->userdata('id');
echo $sesid;
 $this->session->sess_destroy();
?>
<body>
<div class="container">
<div class="row">
<div class="well h1"><center>login Pge</center></div></div>
<form method="post" action="<?php echo base_url().'index.php/Signup/login_validation'?>">
	<div class=" row area">
	<div class="col-md-12">
<div class="col-md-offset-4 col-md-3 ">
	<div class="form-group"><br>
	<label> Enter your <u>username and password</u></label><br><br>
    <!-- <center><label>enter username</label></center> -->
	<input type="text" name="uname" class="form-control" placeholder="username">
	<span class="text-danger"><?php echo form_error('uname'); ?></span>
	</div><br>
</div>

<div class="col-md-offset-4 col-md-3 ">
	<div class="form-group">
	<!-- <center><label >enter password</label></center> -->
	<input type="password" name="pword" placeholder="password" class="form-control">
	<span class="text-danger"><?php echo form_error('pword'); ?></span>
	</div><br>
</div>

<div class="col-md-offset-4 col-md-3 ">
	<div class="form-group">
	<input type="submit" name="login" class="form-control  input input-lg btn-success" value="login">
	</div>
</div>	

	</div>
	</div>
</form>
</div>
</body>
</html>