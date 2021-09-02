<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("head.php"); ?>		
</head>
<body>
<style>
.date{
	color:red;
}
</style>
	<?php
		$t=time();
		date_default_timezone_set('Asia/Taipei');
		$date_y=date("Y");
		$date=date("Y/m/d");
		$time=date("His");
		$name=$_POST["name"];
		$tel=$_POST["tel"];
		$email=$_POST["email"];
		$suggest=str_replace(PHP_EOL,"",$_POST["suggest"]);
		
		require 'db_login.php';
				

		$sql = "INSERT INTO suggest (today_year, today_date, today_time , name, phone , email , suggest)
		VALUES ('$date_y', '$date', '$time', '$name', '$tel', '$email', '$suggest')";		
				

		if (mysqli_query($db, $sql)) {
			echo '<script language="javascript">';
			echo 'alert("填寫成功！");';
			echo 'window.location.href = "聯絡我們";';
			echo '</script>';
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}	

		mysqli_close($db);	
		
		//-------------------------------------------------------------------------------------------------------------------
		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\Exception;

		//Load Composer's autoloader
		require ('vendor/autoload.php');

		$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
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
			$mail->setFrom('sendapprize@gmail.com', '亞紀塾');
			$mail->addAddress('xx250919@gmail.com', 'pfnh');     // Add a recipient
			$mail->addAddress('sonyzone2004@gmail.com', '林德誠');     // Add a recipient
			//Content
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = '亞紀塾新問題單';
			$mail->Body    = "
				<table style='border:1px solid #DFDFDF;font-size:16px;font-weight:bold;height:200px;border-collapse:collapse;margin-left:50px;margin-top:20px;margin-bottom:30px;'>
					<tr style='height:50px;'>
						<td style='background-color:#F0F0F0;border-bottom: 1px solid #ddd;text-align:center;padding-top:10px;width:100px;'>日期</td>
						<td style='border-bottom: 1px solid #ddd;text-align:left;width:500px;padding-top:10px;padding-left:20px;'>".$date."</td>
					</tr>
					<tr style='height:50px;'>
						<td style='background-color:#F0F0F0;border-bottom: 1px solid #ddd;text-align:center;padding-top:10px;width:100px;'>時間</td>
						<td style='border-bottom: 1px solid #ddd;text-align:left;width:500px;padding-top:10px;padding-left:20px;'>".$time."</td>
					<tr style='height:50px;'>
						<td style='background-color:#F0F0F0;border-bottom: 1px solid #ddd;text-align:center;padding-top:10px;width:100px;'>姓名 </td>
						<td style='border-bottom: 1px solid #ddd;text-align:left;width:500px;padding-top:10px;padding-left:20px;'>".$name."</td>
					</tr>
					<tr style='height:50px;'>
						<td style='background-color:#F0F0F0;border-bottom: 1px solid #ddd;text-align:center;padding-top:10px;width:100px;'>連絡電話 </td>
						<td style='border-bottom: 1px solid #ddd;text-align:left;width:500px;padding-top:10px;padding-left:20px;'>".$tel."</td>
					</tr>
					<tr style='height:50px;'>
						<td style='background-color:#F0F0F0;border-bottom: 1px solid #ddd;text-align:center;padding-top:10px;width:100px;'>E-mail </td>
						<td style='border-bottom: 1px solid #ddd;text-align:left;width:500px;padding-top:10px;padding-left:20px;'>".$email."</td>
					</tr>
					<tr style='height:50px;'>
						<td style='background-color:#F0F0F0;border-bottom: 1px solid #ddd;text-align:center;padding-top:10px;width:100px;'>您的建議 </td>
						<td style='border-bottom: 1px solid #ddd;text-align:left;width:500px;padding-top:10px;padding-left:20px;'>".$suggest."</td>
					</tr>
					<tr style='height:50px;'>
						<td style='background-color:#F0F0F0;text-align:center;padding-top:10px;'>資料查詢 </td>
						<td style='text-align:left;padding-top:10px;padding-left:20px;'><a href='http://localhost/akkyschool/%E6%9F%A5%E8%A9%A2%E5%95%8F%E9%A1%8C%E5%96%AE'>客戶填表資料</a></td>
					</tr>
				</table>
			";
			$mail->send();
		} catch (Exception $e) {
			echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
		}	
		echo '<script language="javascript">';
		echo 'alert("填寫成功！");';
		echo 'window.location.href = "聯絡我們";';
		echo '</script>';
	?>
</body>
</html>