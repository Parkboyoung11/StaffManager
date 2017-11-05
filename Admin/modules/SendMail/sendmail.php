<?php
	function SendMail($emailto){
		$title = "Reset Password";
		$content = "Admin have reset password. Your current password is 'boyoung'. Please sign in to change your password !";
		$mailto = $emailto;

		require 'library/PHPMailerAutoload.php';

		$mail = new PHPMailer;
		$mail->isSMTP();                                     
		$mail->Host = 'smtp.gmail.com'; 
		$mail->SMTPAuth = true;                               
		$mail->Username = 'vuhongsonjv11@gmail.com';                
		$mail->Password = 'wnzuiphgvwgrmmlv';                          
		$mail->SMTPSecure = 'tls'; 
		$mail->Port = 587;                                    
		$mail->setFrom('vuhongsonjv11@gmail.com', $title);
		$mail->addAddress($mailto);               
		$mail->isHTML(true);                                  
		$mail->Subject = $title;
		$mail->Body    = $content;

		if(!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			echo 'Message has been sent';
		}
	}	
?>