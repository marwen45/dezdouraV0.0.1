<?php

$msg="";
include ('class/connectdb.php');
function redirect() {
	header('Location: login.php');
	exit();
}
if (isset($_POST['submit'])||!isset($_GET['email'])){
	redirect();
	}
	else {
		$email = $_GET['email'];
		$password=$_POST['password'];
		$cPassword=$_POST['cPassword']; 


        if ($password!=$cPassword)
			$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
		else {
			$sql = "SELECT id FROM users WHERE email='$email'";
			$result = $conn->query($sql);
			
		if ($result->num_rows > 0) {
			$sqlu=("UPDATE users SET password=$cPassword WHERE email='$email'");
            $resultu = $conn->query($sqlu);
			$msg='set new password!';
		} else
			redirect();
	}
}

?>

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

			<div>
                        <?php echo $msg . "<br><br>" ?>
                        </div>
			 							<form id= "test" action="" method="post">    
											<div class="form">
													<div class="input_field">
                                                        <p></p>
														<input name="password" type="password" placeholder="Password" class="input"><br></br>
                                                        <input name="cPassword" type="password" placeholder="confirm Password" class="input"><br></br>													
													</div>
													<div name ="send" class="btn"><a href="#"><input type="submit" name="submit" class="button_active" value="save"></a></div>	
											</div>
										</form>              
			</div>
	</div>
		<div class="copyright">
			© 2021 Dez Doura
		</div>
</div>
</body>
</html>