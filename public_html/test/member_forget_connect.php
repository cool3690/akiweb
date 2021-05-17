<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("head.php"); ?>		
</head>
<body>
	<?php
		require 'db_login.php';
		$account=$_POST["account"];
		$email=$_POST["email"];
		$sql = mysqli_query($db, "SELECT * FROM user where email = '$email' and account = '$account'");
		if (mysqli_num_rows($sql) > 0) {	
			$check='1';
			$word = array_merge(range('a', 'z'), range('A', 'Z'));
			shuffle($word);
			$passwd_word=substr(implode($word), 0, 5);
			$passwd_num=rand(10000, 99999);
			$new_passwd=$passwd_word . $passwd_num;			
					
			$sql2= "UPDATE user SET passwd='$new_passwd' where email = '$email' and account = '$account'";
			
			if (mysqli_query($db, $sql2)) {
				echo '<script language="javascript">';
				echo 'alert("已重新寄送密碼，請至信箱查詢並重新設定您的密碼！");';
				echo 'window.location.href = "login.php";';
				echo '</script>';
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}

			mysqli_close($db);											
		} else {	
			$check='2';
			echo '<script language="javascript">';
			echo 'alert("請輸入您註冊時的E-mail");';
			echo 'window.location.href = "member_forget.php";';
			echo '</script>';
		}
		// Import PHPMailer classes into the global namespace
		// These must be at the top of your script, not inside a function
		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\Exception;

		//Load Composer's autoloader
		require ('vendor/autoload.php');

		$mail = new PHPMailer(true);                              // Passing `true` enables exceptions

		
		if($check==1){		
			try {
				//Server settings
				$mail->CharSet = 'UTF-8';
				$mail->SMTPDebug = 0;                                 // Enable verbose debug output
				$mail->isSMTP();                                      // Set mailer to use SMTP
				$mail->Host = 'smtp.gmail.com';  					  // Specify main and backup SMTP servers
				$mail->SMTPAuth = true;                               // Enable SMTP authentication
				$mail->Username = 'xx250919@gmail.com';               // SMTP username
				$mail->Password = 'depend06123';                      // SMTP password
				$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
				$mail->Port = 587;                                    // TCP port to connect to

				//Recipients
				$mail->setFrom('xx250919@gmail.com', '亞紀塾日文補習班');
				$mail->addAddress($email);     // Add a recipient

				//Content
				$mail->isHTML(true);                                  // Set email format to HTML
				$mail->Subject = '亞紀塾日文補習班重新設定密碼';
				$mail->Body    = "您的密碼為".$new_passwd."<br>請重新登入系統並重新設定您的密碼！";
				$mail->send();
		//		echo 'Message has been sent';
			} catch (Exception $e) {
				echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
			}
		}
	?>
</body>
</html>