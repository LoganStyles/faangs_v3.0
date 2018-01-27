<?php 
//require_once("init.php");

require_once('PHPMailer/PHPMailerAutoload.php');

class m extends PHPMailer{
function sendmail($reciever,$content,$head){
//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$this->isSMTP();                                      // Set mailer to use SMTP
$this->Host = 'mail.faangs.com';  // Specify main and backup SMTP servers
$this->SMTPAuth = true;                               // Enable SMTP authentication
$this->Username = 'info@faangs.com';                 // SMTP username
$this->Password = '$AvZfmkG$%]o';                           // SMTP password
$this->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$this->Port =  26;                                     // TCP port to connect to

$this->setFrom("info@faangs.com", 'Faangs.com');
//$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
$this->addAddress($reciever);               // Name is optional

$this->isHTML(true);                                  // Set email format to HTML

$this->Subject = $head;
$this->Body    = $content;
$this->AltBody = strip_tags($content);

if(!$this->send()) {
    return false;
} else {
    return true;
}
}}
$mail=new m;
//$mail->sendmail("masterabdul46@gmail.com","hello","head");
?>