<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dez Doura Login Page</title>
        <link rel="stylesheet" href="assets/css/stylem.css">
</head>
<body>

<div class="wrapper">
	<div class="header">
		<div class="top">
			<div class="logo">
				<img src="./assets/img/dezdoura.png" alt="" style="width: 230px;">
			</div>                      
			 							<form id= "test" action="" method="post">    
											<div class="form">
													<div class="input_field">
															<input name="email" type="text" placeholder="email" class="input"><br></br>
															<input name="password" type="password" placeholder="Password" class="input">
													</div>
													<div name="login" class="btn"><a href="" onclick='document.getElementById("test").submit()'>Log In</a></div>		
											</div>
										</form>   
                               
			<div class="or">
				<div class="line"></div>
				<p>OR</p>
				<div class="line"></div>
			</div>

			<div class="dif">
				<div class="fb">
					<img src="./assets/img/logo-gmail.png" alt="Gmail" style="width: 50px;">
					<a href="">Log in with Gmail</a>
				</div>
				<div class="forgot">
					<a href="forgotpw.php">Forgot password?</a>
				</div>
			</div>
		</div>
		<div class="signup">
			<p>Don't have an account? <a href="register.php">Sign up</a></p>
		</div>

	</div>
		<div class="copyright">
			© 2021 Dez Doura
		</div>
</div>

</body>
</html>