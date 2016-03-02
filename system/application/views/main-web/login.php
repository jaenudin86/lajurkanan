<div id="content-tengah">

<link href="<?php echo base_url(); ?>system/application/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>system/application/assets/bootstrap/css/login.css" rel="stylesheet" type="text/css" />

<?php
	$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
	if($session!=""){
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/guru'>";
	}
?>
<script languange="javascript">

function CekUser(txt, alertid) {
	var input = txt.value;
	var benar1 = false;
	if(input!='')
		benar1=true;
	if(benar1) { 
  		document.getElementById(alertid).style.display='none';
  	} else {
  		document.getElementById(alertid).style.display='';
  	}
}
function CekPass(txt, alertid) {
	var input = txt.value;
	var benar = false;
	if(input!='')
		benar=true;
	if(benar) { 
  		document.getElementById(alertid).style.display='none';
  	} else {
  		document.getElementById(alertid).style.display='';
  	}
}

</script>

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Sign in to </b>LAJUR KANAN</b></h1>
            <div class="account-wall">
                <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                    alt="">
                <form class="form-signin" method="post" name="frmguestbook" action="<?php echo base_url(); ?>index.php/web/masuklogin">
                <input type="text" name="user"class="form-control" placeholder="Email" required autofocus>
                <input type="password" name="pass"  class="form-control" placeholder="Password" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Sign in</button>
                <label class="checkbox pull-left">
                    <input type="checkbox" value="remember-me">
                    Remember me
                </label>
                <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
                </form>
            </div>
            <a href="#" class="text-center new-account">Create an account </a>
        </div>
    </div>
	
</div>








</table>
</form>
</div>

