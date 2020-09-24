<?php 

$_POST = json_decode( file_get_contents("php://input"), true );

$name = $_POST['name'];;
$phone = $_POST['phone'];;

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

// $mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.yandex.ru';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'shkola.bilyarda@yandex.ru';                 // Наш логин
$mail->Password = 'ScoolBil2020';                           // Наш пароль от ящика
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
 
$mail->setFrom('shkola.bilyarda@yandex.ru', 'Школа бильярда');   // От кого письмо 
$mail->addAddress('mechkovskiy.oleg@yandex.ru');     // Add a recipient

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Данные';
$mail->Body    = 'Пользователь оставил данные <br> 
                  Имя: ' . $name . ' <br>
                  Номер телефона: ' . $phone . '';

if(!$mail->send()) {
    return false;
} else {
    return true;
}

?>