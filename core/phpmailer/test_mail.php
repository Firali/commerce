<?php
require("class.phpmailer.php");
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 1; 
$mail->SMTPAuth = true; 
$mail->SMTPSecure = 'tls'; 
$mail->Host = "zeynalov.net"; // Mail Server
$mail->Port = 587;
$mail->IsHTML(true);
$mail->SetLanguage("az", "language");
$mail->CharSet = "utf-8";
$mail->Username = "test@zeynalov.net"; // Mail
$mail->Password = "]fMjhBpVQe5["; // Mail parol
$mail->SetFrom("test@zeynalov.net", "Project ITLC");
$mail->AddAddress("zeynalov.sahil@gmail.com"); // Gönderilecek mail
$mail->Subject = "Parol Yenilemek"; // BAŞLIQ
$mail->Body = "Salam"; // Mesaj
if (!$mail->Send()) {
	echo "Email Gönderim Hatasi: " . $mail->ErrorInfo;
} else {
	echo "Email Gonderildi";
}
?>