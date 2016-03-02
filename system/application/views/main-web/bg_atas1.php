<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>title</title>

<link href="<?php echo base_url(); ?>system/application/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="<?php echo base_url(); ?>system/application/views/main-web/images/icon.png" />

</head>
<body>
	<div class="page-header">
		<div class="container">
			<h1>Header</h1>
		</div>
            
	</div>
		<div class="page-content">
		
		<div class="container">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header"></div>
					<ul class="nav navbar-nav navbar-right">
						<li><?php
								$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
								if($session!=""){
								$pecah=explode("|",$session);
								$nama = $pecah[1];
								$status = $pecah[2];
								if($status=='admin'){
								?>
								<a href="<?php echo base_url() ?>index.php/web/logout">LOG OUT</a> | <a href="<?php echo base_url(); ?>index.php/adminweb">C-PANEL</a>
								<?php
								}
								else{
								?>
								<a href="<?php echo base_url() ?>index.php/web/logout">LOG OUT</a> | <a href="<?php echo base_url(); ?>index.php/guru">C-PANEL</a>
								<?php
								}
								}
								else{
								?>
								<a href="<?php echo base_url() ?>index.php/web/login">LOG IN</a> 
								<?php
								}
								?>
						</li>
					</ul>

				</div>
			</nav>
		</div>
</body>
