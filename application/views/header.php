<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<script src="<?=base_url()?>assets/js/jquery-1.9.1.min.js"></script>
<script src="<?=base_url()?>assets/js/jquery-ui-1.9.1.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
<link href="<?=base_url()?>assets/css/jquery-ui.css" rel="stylesheet" media="screen">
<link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
<script src="<?=base_url()?>assets/js/script.js"></script>
<link href="<?=base_url()?>assets/css//non-responsive.css" rel="stylesheet">
<link href="<?=base_url()?>assets/css/style.css" rel="stylesheet" type="text/css" />
<title>Neo Cafe</title>
</head>
<body>
    <div class="navbar-inverse navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
       
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
          	<li><a class="navbar-brand" href="<?php echo base_url(); ?>">Neo Cafe</a></li>
           	<?php
			if($this->home_model->logged_in() === TRUE)
			{?>
			<li><?php echo anchor('home','สั่งอาหาร') ?></li>
			<li class="divider-vertical"></li>
			<li><?php echo anchor('home/order','รายการสั่ง') ?></li>
			<li class="divider-vertical"></li>
			<li><?php echo anchor('home/bill','เช็คบิล') ?></li>
			<li class="divider-vertical"></li>
            <?php } ?>
          </ul>
			<ul class="nav navbar-nav navbar-right" >
					<?php
					if($this->home_model->logged_in() === TRUE)
					{
						echo 'สวัสดีคุณ '.ucfirst($this->session->userdata('firstname')).' ';
						if($this->session->userdata('role')=='1')
						{
							echo '<a href="'.site_url('admin').'" class="btn btn-primary" data-toggle="modal" href="#myModal" >Admin Panel</a>  ';
						}
						echo '<a class="btn btn-primary" href="'.base_url("home/logout").'" >Log Out</a>';
					} else {
						echo '
					<a class="btn btn-primary btn-lg" data-toggle="modal" href="'.base_url('home/login').'" >Login</a>
					';
					}
					?>
				</ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>