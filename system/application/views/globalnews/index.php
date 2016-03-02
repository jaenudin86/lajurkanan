
  <div class="container">
    <div class="row"> 
      <!-- hot news start -->
      <div class="col-sm-16 hot-news hidden-xs">
        <div class="row">
          <div class="col-sm-15"> <span class="ion-ios7-timer icon-news pull-left"></span>
            <ul id="js-news" class="js-hidden">
     <?php
     foreach($judul->result_array() as $s)
	{
	
   		echo("<li class='news-item'><a href='#'>".$s["isi"]."</a></li>");
  
    }
     ?>
            </ul>
          </div>
          <div class="col-sm-1 shuffle text-right"><a href="#"><span class="ion-shuffle"></span></a></div>
        </div>
      </div>
      <!-- hot news end --> 
      <!-- banner outer start -->
      <div  class="col-sm-16 banner-outer wow fadeInLeft animated" data-wow-delay="1s" data-wow-offset="50">
      
        <div class="row">
          <div class="col-sm-16 col-md-10 col-lg-8"> 
            
            <!-- carousel start -->
            <div id="sync1" class="owl-carousel">
 <?php
  foreach($berita_home->result_array() as $s){
  	$gambar = $s['gambar']; ?>
            <div class="box item">
      		<a href="<?php echo base_url() ?>index.php/web/berita">
                <div class="carousel-caption"><?php echo$s['judul_berita']?></div>
                <img  src="<?php echo base_url(); ?>system/application/views/main-web/berita/<?php echo $gambar; ?>"width="762" height="360" alt=""/>
                <div class="overlay"></div>
                <div class="overlay-info">
                  <div class="cat">
                    <p class="cat-data"><span class="ion-flask"></span>bisnis</p>
                  </div>
                  <div class="info">
                    <p><span class="ion-android-data"></span><?php echo$s['tanggal']?><span class="ion-chatbubbles"></span></p>
                  </div>
                </div>
                </a>
 			</div>
              <?php
	      }
 ?>   
            </div>
            <div class="row">
              <div id="sync2" class="owl-carousel">
               <?php
  				foreach($berita_home->result_array() as $s){
  				$gambar = $s['gambar']; ?>
                <div class="item"><img class="img-responsive" src="<?php echo base_url(); ?>system/application/views/main-web/berita/<?php echo $gambar; ?>" width="762" height="360" alt=""/></div>
               <?php
            	}
 				?>  
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-8 hidden-sm hidden-xs">
            <div class="row">
                          <div class="col-md-16 col-lg-10">
                <div class="row">
                  <div class="col-sm-16 right-img-top "> <a href="#">
                    <div class="box">
                     <?php
  						foreach($kawasan_news->result_array() as $s){
  						$gambar = $s['gambar']; ?>
                      <div class="carousel-caption"><?php echo $s['judul_berita']?></div>
                      <img class="img-responsive" src="<?php echo base_url(); ?>system/application/views/main-web/berita/<?php echo $gambar; ?>" width="440" height="292" alt=""/>
                      <div class="overlay"></div>	
                      <div class="overlay-info">
                        <div class="cat">
                          <p class="cat-data"></span>Kawasan</p>
                        </div>
                        <div class="info">
                          <p></span><?php echo $s['tanggal']?><span class="ion-chatbubbles"></span>351</p>
                        </div>
                      </div>
                      <?php
                      }
                      ?>
                    </div>
                    </a> </div>
                    
                    
                  <div class="col-sm-16 right-img-btm "> <a href="<?php echo base_url() ?>index.php/web/komunitas">
                    <div class="box">
                    <?php
  						foreach($komunitas->result_array() as $s){
  					$gambar = $s['photo'];	 ?>
                      <div class="carousel-caption">   <?php echo $s['nama']  ?></div>
                      <img class="img-responsive" src="<?php echo base_url(); ?>system/application/views/main-web/berita/<?php echo $gambar; ?>" width="440" height="292" alt=""/>
                      <div class="overlay"></div>
                      <div class="overlay-info">
                        <div class="cat">
                          <p class="cat-data"></span>Komunitas</p>
                        </div>
                        <div class="info">
                          <p></span> <?php echo $s['wilayah']  ?><span class="ion-chatbubbles"></span>351</p>
                        </div>
                      </div>
                        <?php
                      }
                      ?>
                    </div>
                    </a> </div>
                </div>
              </div>
     <!--Event -->
              <div class="col-lg-6 hidden-md"><a href="#">
                <div class="box">
                <div class="main-title">Event</div>
               <?php
  				foreach($agenda->result_array() as $s){
  				 ?>
                          <div class="col-sm-18 col-md-18 col-lg-11">
                            <h4><?php echo$s['tema_agenda']?></h4>	
                            <div class="text-danger sub-info">
                              <div class="time"><?php echo$s['tgl_posting']?></div>
                            <!--  <div class="comments"><span ></span>351</div>-->
                              <div class="stars"><?php echo$s['isi']?></div>
                            </div>
                          </div>
                   <?php
            	}
 				?> 
 				 </div>
 				  </div>
                </a> </div>
                
                 <!--/Event -->
                 <!-- Bagian kiri --> 

            </div>
          </div>
        </div>
      </div>
      <!-- banner outer end --> 
      
    </div>
  </div>
  <!-- top sec end --> 
  </div>
  <!-- data end --> 
  
  <div id="create-account" class="white-popup mfp-with-anim mfp-hide">
    <form role="form">
      <h3>Create Account</h3>
      <hr>
      <div class="row">
        <div class="col-sm-8">
          <div class="form-group">
            <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" tabindex="1">
          </div>
        </div>
        <div class="col-sm-8">
          <div class="form-group">
            <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name" tabindex="2">
          </div>
        </div>
      </div>
      <div class="form-group">
        <input type="text" name="display_name" id="display_name" class="form-control" placeholder="Display Name" tabindex="3">
      </div>
      <div class="form-group">
        <input type="email" name="email" id="email" class="form-control " placeholder="Email Address" tabindex="4">
      </div>
      <div class="row">
        <div class="col-sm-8">
          <div class="form-group">
            <input type="password" name="password" id="password" class="form-control " placeholder="Password" tabindex="5">
          </div>
        </div>
        <div class="col-sm-8">
          <div class="form-group">
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password" tabindex="6">
          </div>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-sm-16">
          <input type="submit" value="Register" class="btn btn-danger btn-block btn-lg" tabindex="7">
        </div>
      </div>
    </form>
  </div>
  <div id="log-in" class="white-popup mfp-with-anim mfp-hide">
    <form role="form">
      <h3>Log In Your Account</h3>
      <hr>
      <div class="form-group">
        <input type="text" name="access_name" id="access_name" class="form-control" placeholder="Name" tabindex="3">
      </div>
      <div class="form-group">
        <input type="password" name="password" id="password" class="form-control " placeholder="Password" tabindex="4">
      </div>
      <hr>
      <div class="row">
        <div class="col-sm-16">
          <input type="submit" value="Log In" class="btn btn-danger btn-block btn-lg" tabindex="7">
        </div>
      </div>
    </form>
  </div>
</div>
<!-- wrapper end --> 

<!-- jQuery --> 
<script type="text/javascript" src="<?php echo base_url(); ?>system/application/views/globalnews/js/jquery.min.js"></script>
<!--jQuery easing--> 
<script type="text/javascript" src="<?php echo base_url(); ?>system/application/views/globalnews/js/jquery.easing.1.3.js"></script>
<!-- bootstrab js --> 
<script type="text/javascript" src="<?php echo base_url(); ?>system/application/views/globalnews/js/bootstrap.js"></script>

<!--style switcher--> 
<script type="text/javascript" src="<?php echo base_url(); ?>system/application/views/globalnews/js/style-switcher.js"></script>
 <!--wow animation--> 
<script type="text/javascript" src="<?php echo base_url(); ?>system/application/views/globalnews/js/wow.min.js"></script>

<!-- time and date --> 
<script type="text/javascript" src="<?php echo base_url(); ?>system/application/views/globalnews/js/moment.min.js"></script>

<!--news ticker-->
<script type="text/javascript" src="<?php echo base_url(); ?>system/application/views/globalnews/js/jquery.ticker.js"></script>

<!-- owl carousel -->
<script type="text/javascript" src="<?php echo base_url(); ?>system/application/views/globalnews/js/owl.carousel.js"></script> 

<!-- magnific popup --> 
<script type="text/javascript" src="<?php echo base_url(); ?>system/application/views/globalnews/js/jquery.magnific-popup.js"></script>

<!-- weather --> 
<script type="text/javascript" src="<?php echo base_url(); ?>system/application/views/globalnews/js/jquery.simpleWeather.min.js"></script>

<!-- calendar--> 
<script type="text/javascript" src="<?php echo base_url(); ?>system/application/views/globalnews/js/jquery.pickmeup.js"></script>

<!-- go to top --> 
<script type="text/javascript" src="<?php echo base_url(); ?>system/application/views/globalnews/js/jquery.scrollUp.js"></script>

<!-- scroll bar --> 
<script type="text/javascript" src="<?php echo base_url(); ?>system/application/views/globalnews/js/jquery.nicescroll.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>system/application/views/globalnews/js/jquery.nicescroll.plus.js"></script>

<!--masonry--> 
<script type="text/javascript" src="<?php echo base_url(); ?>system/application/views/globalnews/js/masonry.pkgd.js"></script>

<!--media queries to js--> 
<script type="text/javascript" src="<?php echo base_url(); ?>system/application/views/globalnews/js/enquire.js"></script>

<!--custom functions--> 
<script type="text/javascript" src="<?php echo base_url(); ?>system/application/views/globalnews/js/custom-fun.js"></script>

</body>
</html>