 <html>
<head>
<title>Upload Form | <?php echo $title; ?></title>
<title>upload multiple</title>
	 <meta charset="utf-8">
  	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	 <meta name="viewport" content="width=device-width, initial-scale=1">
  	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">
	<br><br><br>
	<h3 align="center"><?php echo $title;?></h3>
	<form method="post" id="upload_form" align="center" name="form" enctype="multipart/form-data">
		<input type="file" name="image_file" id="image_file">
		<input type="submit" name="upload" id="upload" value="upload" class="btn btn-success">
	</form>
	<br>
	<br />
	<br />
	<div id="uploaded_image">
		
	</div>
</body>
</html>
<script type="text/javascript">
	
	$(document).ready(function(){
		$('#upload_form').on('submit', function(e)
		{
			e.preventDefault(e);
			if($('#image_file').val() == '')
			{
				alert("please select the file");
			}
			else
			{
				var form = document.forms.namedItem("form");
				var editFormData = new FormData(form);
				$.ajax({
					url:"<?php echo base_url().'index.php/Signup/ajax_upload';?>",
					cache:false,
					type:"POST",
					data:editFormData,
					contentType: false,
					processData:false,
					dataType:'JSON',
					success: function(data)
					{
						console.log(responce);
					},
					error: function(responce)
					{
						console.log(responce);
					}
				})
			}
		})
	})
</script>




