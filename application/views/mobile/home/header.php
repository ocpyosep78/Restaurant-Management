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
<link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
<script src="<?=base_url()?>assets/js/script-mobile.js"></script>
<link href="<?=base_url()?>assets/css/style-mobile.css" rel="stylesheet" type="text/css" />
</head>  
<body>
<div class="container">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
		</button>
		<p class="navbar-brand">Neo Cafe</p>
	</div>

	<div class="navbar-collapse collapse">
		<ul class="nav navbar-nav">
        	<?php if($this->session->userdata('role')=='1')
			{?>
				<li class="list-menu"><a href="<?php echo base_url('admin'); ?>">Admin Panel</a></li>
			<?php } ?>
                <li class="list-menu-header">Worker Panel</li>
				<li class="list-menu"><a href="<?php echo base_url('home'); ?>">สั่งอาหาร</a></li>
				<li class="list-menu"><a href="<?php echo base_url('home/order'); ?>">รายการสั่ง</a></li>
                <li class="list-menu"><a href="<?php echo base_url('home/bill'); ?>">เช็คบิล</a></li>
                <li class="list-menu"><a href="<?php echo base_url('home/logout'); ?>">Log Out</a></li>
         </ul>
    </div>
    
    <div class="main">
