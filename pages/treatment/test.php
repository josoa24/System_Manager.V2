<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer-master/src/Exception.php';

require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'josoarazafimandimby66@gmail.com';
$mail->Password = 'Volamihaja1jos\'';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->setFrom('josoarazafimandimby66@gmail.com');
$mail->addAddress('mamiarilaza.to@gmail.com');
$mail->Subject = "Test";
$mail->Body = "Test body";
$mail->send();
