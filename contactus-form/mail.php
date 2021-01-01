<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpMailer/Exception.php';
require_once 'phpMailer/PHPMailer.php';
require_once 'phpMailer/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';
$invalid = '';
$failed = '';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $secretKey = "6LfjUhUaAAAAAGFrhUMNd8sNNEuhh5rB4WqeA-Bk";
    $responseKey = $_POST['g-recaptcha-response'];
    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey";
    $response = file_get_contents($url);
    $response = json_decode($response);

    if(isset($_POST['submit']) == true && $response->success){
      if(filter_var($email, FILTER_VALIDATE_EMAIL) == true){

        try{
          $mail -> isSMTP();
          $mail -> Host = 'smtp.gmail.com';
          $mail -> SMTPAuth = true;
          $mail -> Username = "vgotelv8@gmail.com";
          $mail -> Password = "minisowiredheadphones";
          $mail -> SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
          $mail -> Port = '587';
  
          $mail -> setFrom('vgotelv8@gmail.com');
          $mail -> addAddress('vgotelv8@gmail.com');
  
          $mail -> isHTMl(true);
          $mail -> Subject = "Thank you for your feedback :)";
          $mail -> Body = "<h3>Name: <span>$name</span></h3><br/>
                            <h3>Email: <span>$email</span></h3><br/> 
                            <h3>Message: <span>$message</span></h3>";
          $mail -> send();
          $alert = '<p class="text-center text-lg bg-success text-white w-50 mx-auto rounded">Message Sent! Thank you for contacting us.</p>';
        }
        catch(Exception $e){
          $alert = '<p class="text-center text-lg bg-danger text-white w-25 mx-auto rounded">'.$e -> getMessage().'</p>';
        }
      }
      else{
        $invalid = '<span class="alert-danger text-danger text-uppercase">Email is not valid</span>';
      }
    }
    else{
      $failed = '<p class="text-center text-lg bg-danger text-white w-25 mx-auto rounded">Verification failed</p>';
    }
    
}
?>