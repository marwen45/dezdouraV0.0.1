<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


$msg="";
include ('class/connectdb.php');

if (isset($_POST['submit'])){
        $email=$_POST['email'];
        if ($email=='')
                $msg="Please fill up your inputs!";
        else{
                $mail = new PHPMailer();

try {

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
                        $mail->addAddress($email);     //Add a recipient
                        //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = 'reset password';
                        $mail->Body    = "
                        Please click on the link below:<br><br>
                        <a href='http://localhost:8000/newpw.php?email=$email'>Click Here</a>
                    ";     

                    $mail->send();
                    $msg = "You have been registered! Please verify your email!";
                } catch (Exception $e) {
                        $msg = "Something wrong happened! Please try again!: {$mail->ErrorInfo}";
                
                }
                
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
			 							<form id= "test" action="" method="post">    
											<div class="form">
													<div class="input_field">
                                                        <p></p>
															<input name="email" type="text" placeholder="email" class="input"><br></br>														
													</div>
													<div name ="send" class="btn"><a href="#"><input type="submit" name="submit" class="button_active" value="send"></a></div>	
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