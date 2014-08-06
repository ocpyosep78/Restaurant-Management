<!DOCTYPE html>
<html lang="en">
<head>
<title>Neo Cafe</title>  
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0" >
<script src="<?=base_url()?>assets/js/jquery-1.9.1.min.js"></script>
<script src="<?=base_url()?>assets/js/jquery-ui-1.9.1.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
<link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
<script src="<?=base_url()?>assets/js/script-mobile.js"></script>
<link href="<?=base_url()?>assets/css/style-mobile.css" rel="stylesheet" type="text/css" />
</head>  
<body>
	<div class="navbar-header">
		<p class="navbar-brand">Neo Cafe</p>
	</div>
    <div class="container">    
         <form method="post" action="<?php echo base_url('home/check_login');?>"  data-ajax="false">
           <h2>
			<label for="username">Username:</label>
			<input name="username" id="username" class="form-control" type="text">
           </h2>
           <h2>
             <label for="password">Password:</label>
             <input name="password" id="password" class="form-control" type="password">
           </h2>
		   <div><button  class="btn btn-success">เข้าสู่ระบบ</button></div>
		</form>       
    </div>
</body>
</html>