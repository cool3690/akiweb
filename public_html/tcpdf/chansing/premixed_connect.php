<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("head.php"); ?>		
</head>
<body>
	<div class="container">
		<?php
			session_start();
			include_once ("db_login.php");
			$sql = mysqli_query($db, "SELECT * FROM 28strength order by snum ASC");

			$customer = '';
			$today = date("Ymd");
			$owner = '';
			$supervision = '';
			$ee_address = '';
			$ee_name = '';
			$ee_phone = '';
			$ee_fax = '';
			$sdate = '';
			$edate = '';
			$strength1_1 = '';
			$strength1_2 = '';
			$turbulence1 = '';
			$aggregate1 = '';
			$number1 = '';
			$price1 = '';
			$remark1 = '';
			$strength2_1 = '';
			$strength2_2 = '';
			$turbulence2 = '';
			$aggregate2 = '';
			$number2 = '';
			$price2 = '';
			$remark2 = '';
			$strength3_1 = '';
			$strength3_2 = '';
			$turbulence3 = '';
			$aggregate3 = '';
			$number3 = '';
			$price3 = '';
			$remark3 ='';
			$strength4_1 = '';
			$strength4_2 = '';
			$turbulence4 = '';
			$aggregate4 = '';
			$number4 = '';
			$price4 = '';
			$remark4 = '';
			$strength5_1 = '';
			$strength5_2 = '';
			$turbulence5 = '';
			$aggregate5 = '';
			$number5 = '';
			$price5 = '';
			$remark5 = '';
			$strength6_1 = '';
			$strength6_2 = '';
			$turbulence6 = '';
			$aggregate6 = '';
			$number6 = '';
			$price6 = '';
			$remark6 = '';
			$strength7_1 = '';
			$strength7_2 = '';
			$turbulence7 = '';
			$aggregate7 = '';
			$number7 = '';
			$price7 = '';
			$remark7 = '';
			$business_name = '';
			$business_phone = '';
			$extension = '';
			$specimen_m3 = '';
			$specimen_num = '';
			$night_price = '';
			$terms1 = '';
			$terms2 = '';
			$terms3_1 = '';
			$terms3_2 = '';
			$terms4_1 = '';
			$terms4_2 = '';
			$terms5 = '';
			$terms6 = '';
			$terms7 = '';
			
			foreach ($_POST as $key => $val){
				$$key=$val;

			}

			if($ee_phone!=""){
				if (strlen($ee_phone)<10){
					$ee_nphone= mb_substr($ee_phone, 0, 2).'-'.mb_substr($ee_phone, 2, 7);
				}else{
					$ee_nphone= mb_substr($ee_phone, 0, 4).'-'.mb_substr($ee_phone, 4, 6);
				}	
			}else{
				$ee_nphone = "";
			}
			if($ee_fax!=""){
				if (strlen($ee_fax)<10){
					$ee_nfax= mb_substr($ee_fax, 0, 2).'-'.mb_substr($ee_fax, 2, 7);
				}else{
					$ee_nfax= mb_substr($ee_fax, 0, 4).'-'.mb_substr($ee_fax, 4, 6);
				}	
			}else{
				$ee_nfax = "";
			}	
			if (strlen($business_phone)<11){
				$business_nphone= mb_substr($business_phone, 0, 4).'-'.mb_substr($business_phone, 4, 6);
			}
			if($strength2 == "-" || $strength3 == "-" || $strength4 == "-" || $strength5 == "-" || $strength6 == "-" || $strength7 == "-" || 
			   $remark2 == "-" || $remark3 == "-" || $remark4 == "-" || $remark5 == "-"|| $remark6 == "-" || $remark7 == "-"){
				$strength2="";
				$strength3="";
				$strength4="";
				$strength5="";
				$strength6="";
				$strength7="";
				$remark2="";
				$remark3="";
				$remark4="";
				$remark5="";
				$remark6="";
				$remark7="";
			}
		
			if($terms5 == ""){
				$specimen_m3 = "";
				$specimen_num = "";
			}
			
			if($terms6 == ""){
				$night_price = "";
			}
			$sql = "INSERT INTO `clsm`(`today`, `customer`, `owner`, `supervision`, `ee_address`, `ee_name`, `ee_phone`, `ee_fax`, `sdate`, `edate`, `strength1`, `turbulence1`, `aggregate1`, `number1`, `price1`, `remark1`, `strength2`, `turbulence2`, `aggregate2`, `number2`, `price2`, `remark2`, `strength3`, `turbulence3`, `aggregate3`, `number3`, `price3`, `remark3`, `strength4`, `turbulence4`, `aggregate4`, `number4`, `price4`, `remark4`, `strength5`, `turbulence5`, `aggregate5`, `number5`, `price5`, `remark5`, `strength6`, `turbulence6`, `aggregate6`, `number6`, `price6`, `remark6`, `strength7`, `turbulence7`, `aggregate7`, `number7`, `price7`, `remark7`, `business_name`, `business_phone`, `extension`, `terms1`, `terms2`, `terms3_1`, `terms3_2`, `terms4_1`, `terms4_2`, `terms5`, `terms6`, `terms7`, `specimen_m3`, `specimen_num`, `night_price`) VALUES ('$today', '$customer', '$owner', '$supervision', '$ee_address', '$ee_name', '$ee_nphone', '$ee_nfax', '$sdate', '$edate', '$strength1', '$turbulence1', '$aggregate1', '$number1', '$price1', '$remark1', '$strength2', '$turbulence2', '$aggregate2', '$number2', '$price2', '$remark2', '$strength3', '$turbulence3', '$aggregate3', '$number3', '$price3', '$remark3', '$strength4', '$turbulence4', '$aggregate4', '$number4', '$price4', '$remark4', '$strength5', '$turbulence5', '$aggregate5', '$number5', '$price5', '$remark5', '$strength6', '$turbulence6', '$aggregate6', '$number6', '$price6', '$remark6', '$strength7', '$turbulence7', '$aggregate7', '$number7', '$price7', '$remark7', '$business_name', '$business_nphone', '$extension', '$terms1', '$terms2', '$terms3_1', '$terms3_2', '$terms4_1', '$terms4_2', '$terms5', '$terms6', '$terms7', '$specimen_m3', '$specimen_num', '$night_price')";

			
			if (mysqli_query($db, $sql)) {
				$clsm = mysqli_query($db, "SELECT * FROM clsm where today = '$today' and customer = '$customer' and ee_address = '$ee_address'");
				while ($row = mysqli_fetch_array($clsm)) {	
					$_SESSION['num'] = $row['num'];
					echo '<h1 class="text-center" style="padding-top:450px;">報  表  產  出  中&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="spinner-border text-success"></span></h1>';
				}		
				echo '<meta http-equiv=REFRESH CONTENT=1;url=report_clsm.php>';
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($db);
			}

		?> 
	</div>
</body>
</html>     