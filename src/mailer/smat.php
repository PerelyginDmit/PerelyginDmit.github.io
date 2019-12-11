<?php 

$mark = $_POST['user_mark'];
$model = $_POST['user_model'];
$year = $_POST['user_year'];
$textarea = $_POST['user_textarea'];
$text = $_POST['user_text'];
$name = $_POST['user_nam'];
$phone = $_POST['user_phon'];

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'dmitry_perelyg@mail.ru';                 // Наш логин
$mail->Password = '12367RUSSIa16';                           // Наш пароль от ящика
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
 
$mail->setFrom('dmitry_perelyg@mail.ru', 'Dmitry Perelygin');   // От кого письмо 
$mail->addAddress('diperelygin@yandex.ru');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Заказ цены';
$mail->Body    = '
	Пользователь оставил свои данные <br> 
	Марка: ' . $mark . ' <br>
	Модель: ' . $model . ' <br>
	Гол выпуска: ' . $year . ' <br>
	Сообщение: ' . $textarea . ' <br>
	Имя: ' . $text . ' <br>
	Имя: ' . $name . ' <br>
	Телефон: ' . $phone . '';
$mail->AltBody = 'Это альтернативный текст';

if(!$mail->send()) {
    return false;
} else {
    return true;
}

?>