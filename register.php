<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


$msg="";
include ('class/connectdb.php');

if (isset($_POST['submit'])){

        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $cPassword=$_POST['cPassword'];  

        if ($name ==''||$email==''||$password!=$cPassword)
                $msg="Please fill up your inputs!";
        else {
                $sql="SELECT id FROM users where email='$email'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0){
                        $msg="Email already exists in the database!";
                }
                else{
                $token = 'qwertzuiopasdfghjklyxcvbnmQWERTZUIOPASDFGHJKLYXCVBNM0123456789!$/()*';
                $token = str_shuffle($token);
                $token = substr($token, 0, 10);   
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

                $sqli ="INSERT INTO users (name,email,password,isEmailConfirmed,token)
		VALUES ('$name', '$email', '$hashedPassword', '0', '$token')";
                $resulti = $conn->query($sqli);

                //send email verification
                $mail = new PHPMailer();
                        //Server settings
                        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                        $mail->isSMTP();                                            //Send using SMTP
                        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                        $mail->Username   = 'noreplyb0t.tn@gmail.com';                     //SMTP username
                        $mail->Password   = 'marouene125MM@';                               //SMTP password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                        $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                        //Recipients
                        $mail->setFrom('noreplyb0t.tn@gmail.com', 'DezDoura Support');
                        $mail->addAddress($email, $name);     //Add a recipient
                        //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = 'verification';
                        $mail->Body    = "
                        Please click on the link below:<br><br>
                        <a href='http://localhost:8000/confirm.php?email=$email&token=$token'>Click Here</a>
                    ";                      
                        if ($mail->send())
                        $msg = "You have been registered! Please verify your email!";
                    else
                        $msg = "Something wrong happened! Please try again!";
                }
        }
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
                        <div>
                        <?php echo $msg . "<br><br>" ?>
                        </div>
                                <form id="click"  method="post" action="register.php">
                                
                                        <div class="form">
                                                <div class="input_field">
                                                        <input name="name" type="text" placeholder="Name" class="input"><br></br>
                                                        <input name="email" type="text" placeholder="email" class="input"><br></br>
                                                        <input name="password" type="password" placeholder="Password" class="input"><br></br>
                                                        <input name="cPassword" type="password" placeholder="confirm Password" class="input"><br></br>
                                                </div>
                                                <div name ="register" class="btn"><a href="#"><input type="submit" name="submit" class="button_active" value="register"></a></div>
                                                
                                        </div>
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