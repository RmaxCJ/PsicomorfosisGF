<?php
//  print_r($_POST);
// echo "<br>".$_POST['name'];
// echo "<br>".$_POST['email'];
// echo "<br>".$_POST['subject'];
// echo "<br>".$_POST['message'];
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require 'path/to/PHPMailer/src/Exception.php';
// require 'path/to/PHPMailer/src/PHPMailer.php';
// require 'path/to/PHPMailer/src/SMTP.php';

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
$mail = new PHPMailer(true);


try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
   // $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'mail.psicomorfosisgf.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->SMTPSecure = 'tls';
    $mail->Username   = 'ps_gabriela.gf@psicomorfosisgf.com';                     // SMTP username
    $mail->Password   = '@nimaAnimus1028';                               // SMTP password
    $mail->Port       = 465;

    $mail->setFrom($_POST['email'], $_POST['name']);
    $mail->addAddress('gab.gadeafalcon@gmail.com','psicomorfosisgf');     // Add a recipient




    //$mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $_POST['subject'];
    $mail->Body    = $_POST['message'];

   if ($mail->send())
    {
      // echo "<pre>";    
      // print_r($mail);
      // echo "</pre>";
      // exit();
echo json_encode('success', JSON_FORCE_OBJECT);

    }
    else
    {
      echo json_encode('error', JSON_FORCE_OBJECT);

     // echo $mail->ErrorInfo;
    }
    
} catch (Exception $e) {
    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    echo $e->errorMessage();
}