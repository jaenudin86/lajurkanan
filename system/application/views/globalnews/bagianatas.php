<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>LajurKanan - Home</title>
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">
<!-- bootstrap styles-->
<link href="<?php echo base_url(); ?>system/application/views/globalnews/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- google font -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800" rel="stylesheet" type="text/css" />

<!-- ionicons font -->
<link href="<?php echo base_url(); ?>system/application/views/globalnews/css/ionicons.min.css" rel="stylesheet" type="text/css" />

<!-- animation styles -->
<link href="<?php echo base_url(); ?>system/application/views/globalnews/css/animate.css" rel="stylesheet" type="text/css" />
<!-- custom styles -->
<link href="<?php echo base_url(); ?>system/application/views/globalnews/css/custom-red.css" rel="stylesheet" type="text/css" />
<!-- owl carousel styles-->
<link href="<?php echo base_url(); ?>system/application/views/globalnews/css/owl.carousel.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>system/application/views/globalnews/css/owl.transitions.css" rel="stylesheet" type="text/css" />
<!-- magnific popup styles -->
<link href="<?php echo base_url(); ?>system/application/views/globalnews/css/magnific-popup.css" rel="stylesheet" type="text/css" />
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- preloader start -->
<div id="preloader">
  <div id="status"></div>
</div>
<!-- preloader end -->

<!--<div class="switcher" style="left:-50px;"> <a id="switch-panel" class ="hide-panel"> <i class="ion-gear-a"></i> </a>
  <div id="switcher">
    <ul class="colors-list">
      <li><a href="#" class="red" id="custom-red"></a></li>
      <li><a href="#" class="green" id="custom-green"></a></li>
      <li><a href="#" class="purple" id="custom-purple"></a></li>
      <li><a href="#" class="blue" id="custom-blue"></a></li>
    </ul>
  </div>
</div> -->
<!-- /END THEME SWITCHER--> <!-- wrapper start -->
<div class="wrapper"> 
  <!-- header toolbar start -->
  <div class="header-toolbar">
    <div class="container">
      <div class="row">
        <div class="col-md-16 text-uppercase">
          <div class="row">
            <div class="col-sm-8 col-xs-16">
              <ul id="inline-popups" class="list-inline">

                <?php
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
				<a href="<?php echo base_url() ?>index.php/web/logout">LOG OUT</a> | <a href="<?php echo base_url(); ?>index.php/jurnalis">C-PANEL</a>
				<?php
				}
				}
				else{
				?>
				<a href="<?php echo base_url() ?>index.php/web/login">LOG IN</a> 
				<?php
				}
				?>
				<?php
				if($session!=""){
				echo "Selamat Datang <b>".$nama."</b>";
				}	
				else{

				}
				?>
               <!-- <li><a class="open-popup-link" href="<?php echo base_url()?>index.php/web/login">log in</a></li> -->
                <li><a class="open-popup-link" href="#create-account" data-effect="mfp-zoom-in">create account</a></li>
                <li><a  href="#">About</a></li>
              </ul>
            </div>
            <div class="col-sm-8 col-xs-16">
              <div class="row">
                <div id="weather" class="col-lg-9 col-sm-8 col-xs-16"></div>
                <div id="time-date" class="col-lg-7 col-sm-8 col-xs-16"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- header toolbar end --> 
  
  <!-- header start -->
  <div class="container header">
    <div class="row">
      <div class="col-sm-5 col-md-5 wow fadeInUpLeft animated"><a class="navbar-brand" href="<?php echo base_url() ?>index.php/web/index">Lajuar Kanan</a></div>
     <!--  <div class="col-sm-11 col-md-11 hidden-xs text-right"><img src="system/application/views/globalnews/images/ads/468-60-ad.gif" width="468" height="60" alt=""/></div> -->
    </div>
  </div>
  <!-- header end --> 
  <!-- nav and search start -->
  <div class="nav-search-outer"> 
    <!-- nav start -->
    
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="container">
        <div class="row">
          <div class="col-sm-16"> <a href="javascript:;" class="toggle-search pull-right"><span class="ion-ios7-search"></span></a>
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
              <ul class="nav navbar-nav text-uppercase main-nav ">
                <li class="dropdown"><a href="<?php echo base_url() ?>index.php/web/berita">News</a></li>
                <li><a href="<?php echo base_url() ?>index.php/web/komunitas">Xpresi</a></li>
                <li><a href="<?php echo base_url() ?>index.php/web/komunitas">Komunitas</a></li>
                <li><a href="javascript:void(0)" >Kawasan</a></li>
                <li><a href="javascript:void(0)" >Event</a></li>
                <li><a href="javascript:void(0)" >Galery</a></li>
                <li><a href="javascript:void(0)" >Kontak</a></li>
             
              
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- nav end --> 
      <!-- search start -->
      
      <div class="search-container ">
        <div class="container">
          <form action="#" method="" role="search">
            <input id="search-bar" placeholder="Type & Hit Enter.." autocomplete="off">
          </form>
        </div>
      </div>
      <!-- search end --> 
    </nav>
    <!--nav end--> 
  </div>
  
  <!-- nav and search end--> 
  <!-- top sec start -->
  