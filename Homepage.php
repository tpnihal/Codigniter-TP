<!DOCTYPE html>
<html>
<head>
   <title>Registration</title>
	 <meta charset="utf-8">
  	 <meta name="viewport" content="width=device-width, initial-scale=1">
  	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style type="text/css">
		#hed{
			text-align: center;
			font-family: fantasy;
		}

		.row2
		{
			background-color:green;
		}
		.btn
		{
			width:252px;
		}
		.register
		{
			text-align: center;
			margin-bottom: 30px;
		}
  </style>
</head>
		

<body>

<div class="container-fluid">
	<div class="row">
		<div class="jumbotron">
			<h1 id="hed"><span style="color:blue"> HOME PAGE </span> </h1>
		</div>
	</div>

	<div class="register"><span class="text h2">Registration</span></div>
	<div class="row">
	


	<!-- form action for validation  and all functions starts here -->
	<form enctype="multipart/form-data" action="<?php echo base_url().'index.php/Signup/form_valid'; ?>" method="post"> 

<?php                                    # update fetch 
	if (isset($user_data)) 
	{	echo "nihal";
		foreach ($user_data as $row) 
		{
	?>
		<center><br>
				<input class="input input-lg" type="text" name="fname" 
				value="<?php echo $row['vchr_fname']; ?>"  placeholder="entername"> <br>
				<span class="text-danger"><?php echo form_error("fname"); ?></span><br>

				<input class="input input-lg" type="text" name="lname"  
				value="<?php echo $row['vchr_lname'];?>" placeholder="enter lastname"> <br>
				<span class="text-danger"> <?php echo form_error("lname"); ?></span><br>

				<span>select district: </span>
				<select class="select" name="select">
		 			<option ><?php echo $row['vchr_dname'] ?></option>
		 				<?php
								foreach ($user_data as $row)
								{
								?>
								 <!-- <option><?php echo $row->vchr_dname ?></option> -->
								 <option>kannur</option>
								 <option>ksg</option>
								 <option>vynd</option>

								<?php
					 			} 
						?>
			   </select>
			   <span><?php echo form_error('select')?></span><br>


				<input class="input input-lg" type="email" name="email"  
				value="<?php echo $row['vchr_email'];?>" placeholder="enter email id"> <br>
				<span class="text-danger"> <?php echo form_error("email"); ?></span><br>	

				<input type="hidden" name="hidden_id" value="<?php echo $row['pk_id']; ?>" >
				<input type="SUBMIT" class="btn btn-lg btn-primary" value="update" name="update">
		</center>

<?php
		}
	}
else
	{
?>
 <!-- insert button submit -->

		<center><br>                     
				<input class="input input-lg" type="text" name="fname" placeholder="enter firstname"><br>
				<span class="text-danger"><?php echo form_error("fname"); ?></span><br>

				<input class="input input-lg" type="text" name="lname" placeholder="ente lastname"><br>
				<span class="text-danger"><?php echo form_error("lname"); ?></span><br>


			    <span>select district: </span> <select class="select" name="select">
					<option selected="selected">select</option>
					<?php
						if(isset($fetch_dist))
						{ 
							// echo $fetch_dist;
							foreach ($fetch_dist as $row)
							{
							?>
							 <option><?php echo $row['vchr_dname']?></option>
							<?php
				 			} 
						}
					?>
			   </select>
			   <span class="text-danger"><?php echo form_error('select')?></span>
			   <br><br>

			   <input class="input input-lg" type="text" name="email" placeholder="enter email"><br>
				<span class="text-danger"><?php echo form_error("email"); ?></span><br>	

			   <label>male : -</label> <input  type="radio" value="m" name="gender" >
			   <label>female : -</label><input  type="radio" value="f" name="gender" ><br>
			   <span class="text-danger"><?php echo form_error("gender"); ?></span><br>

			   <input type="file" name="file" value="file" class="btn btn-lg" style= "height:40px;background-color:#f2f2f2;color:white;border-color:black"><br>
			    <span class="text-danger"><?php echo form_error("file"); ?></span><br>


				<br>
				<input type="SUBMIT" class="btn btn-lg btn-primary" name="insert" value="insert">

<br><br>
<!-- login page -->
				<label>have already account?.....</label><a class=" btn-danger" href="<?php echo base_url().'index.php/Signup/login';?>">LOGIN HERE</a>

				</center>



<?php
	}
?>
		<?php 												
		    if ($this->uri ->segment(2 ) == "inserted")    #checking file inserted
			{

				echo '<p class="text-success well">Data inserted</p>';
			}

		?>

	<?php 
	if ($this->uri ->segment(2)== "updated")
			{
				echo '<p class="text-success well">Data updated</p>';
			}
			?>
	</form>

			<!-- table for storing result -->

		<br><br><div class="container"><center>
 		
 		<table class="table table-borderd table-hover table-responsive" border="1px">
		<i class="h3 text-success">fetch details shown below</i>

				<tr>
				<th class="danger">FIRST NAME</th>
				<th class="success">LAST NAME</th>
				<th class="primary">DISTRICT</th>
				<th class="primary">EMAIL</th>
				<th class="danger">DELETE</th>
				<th class="success">UPDATE</th>
				</tr>
		<?php
		if(!empty($fetch_data))
		{ 
			foreach ($fetch_data as $row)
		{
			
		?>
				<tr>
				<td><?php echo $row['vchr_fname'];?></td>
				<td><?php echo $row['vchr_lname'];?></td>
				<td><?php echo $row['vchr_dname'];?></td>
				<td><?php echo $row['vchr_email'];?></td>
				<td align="center"><i class="text-danger glyphicon glyphicon-remove  delete_id"
				id="<?php echo $row['pk_id']; ?>"></i></td> 

				<td align="center"><a href="<?php echo base_url().'index.php/Signup/update_fetch/';
				echo $row['pk_id']; ?>"><i class="text-danger glyphicon glyphicon-edit"></i></a>
				</td>
				</tr>
		<?php
 		} 
		}
		else
		{
 		?>
				<tr>
			 	<td colspan="6" align="center">no data found</td>
			    </tr>
		<?php
		}
		?>
		</table>
		</center></div>

<script type="text/javascript">

			$(document).ready(function(){	
			$('.delete_id').click(function(){

				var id = $(this).attr("id");
				$.ajax({
		  			url:"<?php echo base_url().'index.php/Signup/delete_id/'?>",
		  			type:'POST',
		  			dataType:'json',
		  			data:{id:id},
		  			error: function (jqXHR,textStatus,errorThrown)
		  			{
		  				location.reload();
		  			}

					  });//ajax close
			})
		})
		</script>
		<!-- script close -->

	</div>
	</div>
</body>
</html>


		</script>


<!-- 
		/*by javascript

			$(document).ready(function(){	
			$('.delete_id').click(function(){

				var id = $(this).attr("id");
				if (confirm("are you sure to delete this"))
				 {
				 	window.location="<?php 
				 	// echo base_url().'index.php/Signup/delete_id/'?>"+id;
				 }
				 else
				 {
				 	return false;
				 }
			})
			}) -->