<?php
$msg='';
include ('class/connectdb.php');
	function redirect() {
		header('Location: register.php');
		exit();
	}

	if (!isset($_GET['email']) || !isset($_GET['token'])) {
		redirect();
	} else {
		$email = $_GET['email'];
		$token = $_GET['token'];
		$sql = "SELECT id FROM users WHERE email='$email' AND token='$token' AND isEmailConfirmed=0";
        $result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$sqlu=("UPDATE users SET isEmailConfirmed=1, token='' WHERE email='$email'");
            $resultu = $conn->query($sqlu);
			$msg='Your email has been verified! You can log in now!';
		} else
			redirect();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dez Doura register Page</title>
        <link rel="stylesheet" href="assets/css/stylem.css">
</head>
<body>

<div class="wrapper">
	<div class="header">
		<div class="top">
			<div class="logo">
				<img src="./assets/img/dezdoura.png" alt="" style="width: 230px;">
			</div>

                        
                                <form id="click"  method="post" action="confirm.php">
                              
                                <?php if ($msg != "") echo $msg . "<br><br>" ?>
                                </form>
		</div>
		<div class="signup">
			<p>Have an account? <a href="login.php">login</a></p>
		</div>
	</div>
		<div class="copyright">
			© 2021 Dez Doura
		</div>
</div>
</body>
</html>