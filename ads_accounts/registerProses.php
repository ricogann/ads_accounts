<?php

    require ('./config/koneksi.php');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require './PHPMailer-master/src/Exception.php';
    require './PHPMailer-master/src/SMTP.php';
    require './PHPMailer-master/src/PHPMailer.php';

    $email= $_POST['email'];
    $code = random_int(100000,999999);

    $sql = "SELECT * FROM accounts where email='$email'";
    $query = mysqli_query($con,$sql);

    $user = mysqli_fetch_assoc($query);
    $verified = $user['is_verified'];

    if(mysqli_num_rows($query) > 0 && $verified==1){
        $code = $user['code'];

        try{

            $mail = new PHPMailer(true);
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'burgerrrrking12@gmail.com';                     //SMTP username
            $mail->Password   = 'oyzvgmjwgumpdueq';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
            $mail->setFrom('no-reply@yourwebsite.com', 'Your Website Services');
            $mail->addAddress($email);
            
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'OTP Code Verification - Burger King';
            $body = "Hi,<br>here's your OTP Code : ".$code;
            $mail->Body    = $body;
            $mail->AltBody = 'OTP Code Verification';
            
            
            $mail->send();
            echo '<script>alert("Message Sent");</script>';
            header("location: ../ads_accounts/loginVerification.php");
            
            }catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            
    }else{
        $sql = "INSERT INTO accounts (code,email)VALUES('$code','$email')";
        $query = mysqli_query($con,$sql);

        try{

            $mail = new PHPMailer(true);
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'burgerrrrking12@gmail.com';                     //SMTP username
            $mail->Password   = 'oyzvgmjwgumpdueq';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
            $mail->setFrom('no-reply@yourwebsite.com', 'Your Website Services');
            $mail->addAddress($email);
            
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'OTP Code Verification - Burger King';
            $body = "Hi,<br>here's your OTP Code : ".$code;
            $mail->Body    = $body;
            $mail->AltBody = 'OTP Code Verification';
    
    
            $mail->send();
            echo '<script>alert("Message Sent");</script>';
            
            }catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

        header("location: http://localhost/ads_accounts/datadiri.php");
    }

?>