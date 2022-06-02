<!DOCTYPE html>
<html lang="en">
<head>
	<title>Giriş Ekranı</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<style>

		.container-login100{
			background-color: #000;
		}
	</style>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/home-icon.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="POST" action="">
					<span class="login100-form-title">
						Üye Girişi
					</span>
                    <?php 
                    
                        if ($_POST) {
                            session_start();

                            include 'info/config.php';
        
                            $username = $_POST['email'];
                            $password = $_POST['pass'];
        
        
                            $user = $db->query("SELECT * FROM accounts WHERE email = '$username' AND password = '$password'")->fetch();
        
                            if ($user) {
                                $_SESSION['user'] = $user;
                                echo '<center style="color:#4CAF50;">Giriş Başarılı! Yönlendirme yapılıyor.</center><br>';
								echo '<meta http-equiv="refresh" content="3; url=index.php">';
                            }else {
                                echo '<center style="color: #FF0000;">Hata! Bu kullanıcının bilgileri hatalı!</center><br>';
                            }
                        }

                    
                    
					?>


					<div class="wrap-input100 validate-input" data-validate = "Geçerli bir eposta girin!">
						<input class="input100" type="text" name="email" placeholder="E-Posta Adresi"  <?php if($_POST){if($user){echo 'disabled=""';}}?>>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Şifre girilmesi zorunlu!">
						<input class="input100" type="password" name="pass" placeholder="Şifre" <?php if($_POST){if($user){echo 'disabled=""';}}?>>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Giriş Yap
						</button>
					</div>



					<div class="text-center p-t-136">
						<a class="txt2" href="register.php">
							Hesabınız yoksa hesap oluşturun
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script><
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>