<?php
require "PHPMailerAutoload.php";
require('class.phpmailer.php');
PHPMailerAutoload("smtp");

$mail = new PHPMailer;
$phil_chair = 'alex.kyei94@gmail.com';
if (isset($_POST['body'], $_POST['subject'], $_POST['info-name'], $_POST['info-org'], $_POST['info-email'])){
	$subject = $_POST['subject'];
	$message = $_POST['body'];
	$name = $_POST['info-name'];
	$org = $_POST['info-org'];
	$email = $_POST['info-email'];
	$body = <<<BODY
$message\n
\n
\n
Contact Info \n
Name: $name \n
Organization: $org \n
Email: $email 
BODY;
}
$mail->SMTPDebug = 1;
$mail->isSMTP();
$mail->HOST = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'betaiotaspd@gmail.com';
$mail->Password = 'whatsoeveristrue';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

$mail->From = $email;
$mail->FromName = $name;
$mail->addAddress($phil_chair);
$mail->addReplyTo($email);
$mail->isHTML(true);

$mail->Subject = $subject;
$mail->Body = $body;
$mail->AltBody = $body;

if (!$mail->send()){
	echo 'Message could not be sent.';
	echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
	header('Location: index.html');
}   
?>
