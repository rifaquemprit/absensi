<?php
session_start();
include_once 'setting/function.php';
include_once 'setting/config.php';

$user = new User();

if(isset($_SESSION['login'])){
	header("location:template.php");
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$login = $user->check_login($_POST['username'], $_POST['pass']);
	
	if($login){
		//jika login sukses
		header("location:template.php");
	}else{
		//login gagal
		$msg = TRUE;
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Presensi Piket Sore</title>
	<link href="assets/css/style.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
<center><H2>
	SISTEM MONITORING ABSENSI </H2><H3>
	PIKET SORE PPS UNNES
</H3></center>
<?php if(isset($msg)):?>
<center>
    <div class="alert alert-error" style='text-align:center;font-size:20px;width:500px;margin-bottom:15px'>
    Maaf Username atau password anda salah.
    </div>
</center>
<?php endif ?>

	<div id="box">
		<div class="elements">
			<div class="avatar"></div>
				<form action="" method="post">
					<input type="text" name="username" class="username" placeholder="Username" />
					<input type="password" name="pass" class="password" placeholder="Password" />
					<div class="forget"><a href="#">Forgot your password?</a></div>
					<div class="checkbox">
						<input id="check" name="checkbox" type="checkbox" value="1" />
						<label for="check">Remember?</label>
					</div>
					<div class="remember">Remember?</div>
					<input type="submit" name="submit" class="submit" value="Sign In" />
				</form>
		</div>
	</div>
<div class="signup"><h3>Syarifatun Ni'mah</h3></div>
</body>
</html>
