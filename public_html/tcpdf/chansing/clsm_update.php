<?php
	if (isset($_POST['nsubmit'])) {
		$num = $_POST['num'];	
		$customer = '';
		$owner = '';
		$supervision = '';
		$ee_address = '';
		$ee_name = '';
		$ee_phone = '';
		$ee_fax = '';
		$sdate = '';
		$edate = '';
		$strength1 = '';
		$turbulence1 = '';
		$aggregate1 = '';
		$number1 = '';
		$price1 = '';
		$remark1 = '';
		$strength2 = '';
		$turbulence2 = '';
		$aggregate2 = '';
		$number2 = '';
		$price2 = '';
		$remark2 = '';
		$strength3 = '';
		$turbulence3 = '';
		$aggregate3 = '';
		$number3 = '';
		$price3 = '';
		$remark3 ='';
		$strength4 = '';
		$turbulence4 = '';
		$aggregate4 = '';
		$number4 = '';
		$price4 = '';
		$remark4 = '';
		$strength5 = '';
		$turbulence5 = '';
		$aggregate5 = '';
		$number5 = '';
		$price5 = '';
		$remark5 = '';
		$strength6 = '';
		$turbulence6 = '';
		$aggregate6 = '';
		$number6 = '';
		$price6 = '';
		$remark6 = '';
		$strength7 = '';
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
		$terms3 = '';
		$terms4 = '';
		$terms5 = '';
		$terms6 = '';
		$terms7 = '';	
		
		foreach ($_POST as $key => $val){
			$$key=$val;
		
			if($$key == "-" ){
				$$key="";
			}
		}

		if($ee_phone!=""){
			$ee_phone = str_replace("-","",$ee_phone);
			if (strlen($ee_phone)<10){
				$ee_nphone= mb_substr($ee_phone, 0, 2).'-'.mb_substr($ee_phone, 2, 7);
			}else{
				$ee_nphone= mb_substr($ee_phone, 0, 4).'-'.mb_substr($ee_phone, 4, 6);
			}	
		}else{
			$ee_nphone = "";
		}
		
		if($ee_fax!=""){
			$ee_fax = str_replace("-","",$ee_fax);
			if (strlen($ee_fax)<10){
				$ee_nfax= mb_substr($ee_fax, 0, 2).'-'.mb_substr($ee_fax, 2, 7);
			}else{
				$ee_nfax= mb_substr($ee_fax, 0, 4).'-'.mb_substr($ee_fax, 4, 6);
			}	
		}else{
			$ee_nfax = "";
		}	
		
		if (strlen($business_phone)<12){
			$business_phone = str_replace("-","",$business_phone);
			$business_nphone= mb_substr($business_phone, 0, 4).'-'.mb_substr($business_phone, 4, 6);
		}
		
		if($terms5 == ""){
			$specimen_m3 = "";
			$specimen_num = "";
		}
		
		if($terms6 == ""){
			$night_price = "";
		}
		
		$sql = "UPDATE clsm SET 
		customer='$customer', owner='$owner', supervision='$supervision', ee_address='$ee_address', ee_name='$ee_name', ee_phone='$ee_nphone', ee_fax='$ee_nfax', sdate='$sdate', edate='$edate', strength1='$strength1', turbulence1='$turbulence1', aggregate1='$aggregate1', number1='$number1', price1='$price1', remark1='$remark1', strength2='$strength2', turbulence2='$turbulence2', aggregate2='$aggregate2', number2='$number2', price2='$price2', remark2='$remark2', strength3='$strength3', turbulence3='$turbulence3', aggregate3='$aggregate3', number3='$number3', price3='$price3', remark3='$remark3', strength4='$strength4', turbulence4='$turbulence4', aggregate4='$aggregate4', number4='$number4', price4='$price4', remark4='$remark4', strength5='$strength5', turbulence5='$turbulence5', aggregate5='$aggregate5', number5='$number5', price5='$price5', remark5='$remark5', strength6='$strength6', turbulence6='$turbulence6', aggregate6='$aggregate6', number6='$number6', price6='$price6', remark6='$remark6', strength7='$strength7', turbulence7='$turbulence7', aggregate7='$aggregate7', number7='$number7', price7='$price7', remark7='$remark7', business_name='$business_name', business_phone='$business_nphone', extension='$extension', terms1='$terms1', terms2='$terms2', terms3='$terms3', terms4='$terms4', terms5='$terms5', terms6='$terms6', terms7='$terms7', specimen_m3='$specimen_m3', specimen_num='$specimen_num', night_price='$night_price' WHERE num='$num'";

	
		require 'db_login.php';			

		if (mysqli_query($db, $sql)) {
			echo '<script language="javascript">';
			echo 'alert("更改成功！");';
			echo 'window.open("report_clsm.php");';
			echo 'window.location.href = "order_select.php"';
			echo '</script>';	
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($db);
		}
		mysqli_close($db);
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("head.php"); ?>		
</head>
<body>
	<script>
		$(function(){
			$( "#datepicker0" ).datepicker({
				changeMonth:true,
				changeYear:true,
				dateFormat:"yymmdd",
				timeFormat:  "hh:mm:ss"			
			});
			$( "#datepicker1" ).datepicker({
				changeMonth:true,
				changeYear:true,
				dateFormat:"yymmdd",
				timeFormat:  "hh:mm:ss"			
			});
			$( "#datepicker2" ).datepicker({
				changeMonth:true,
				changeYear:true,
				dateFormat:"yymmdd",
				timeFormat:  "hh:mm:ss"			
			});
		});	
	</script>
	<div class="container">
		<?php 
			include_once ("navbar.php");
			include_once ("db_login.php");
			$num = $_POST['num'];	
			$clsm = mysqli_query($db, "SELECT * FROM clsm where num = '$num'");

			while ($row = mysqli_fetch_array($clsm)) {				
				echo '<h4 class="text-center mt-5 mb-5" style="letter-spacing:8px;">CLSM報價單</h4>
				<form method="post" action="clsm_update.php" style="padding-top:2%;padding-bottom:10%;padding-left:2%;padding-right:2%;">
					<div class="text-center mb-5" style="letter-spacing:8px;">
						<div class="form-group row">
							<label class="col-lg-2">客&nbsp;&nbsp;&nbsp;&nbsp;戶：</label>
							<div class="col-lg-4">
								<input type="text" class="form-control" name="customer" value="'.$row['customer'].'">
							</div>
							<label class="col-lg-2">聯絡電話：</label>
							<div class="col-lg-4">
								<input type="text" class="form-control" name="ee_phone" value="'.$row['ee_phone'].'">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-2">業&nbsp;&nbsp;&nbsp;&nbsp;主：</label>
							<div class="col-lg-4">
								<input type="text" class="form-control" name="owner" value="'.$row['owner'].'">
							</div>
							<label class="col-lg-2">傳真電話：</label>
							<div class="col-lg-4">
								<input type="text" class="form-control" name="ee_fax" value="'.$row['ee_fax'].'">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-2">監造單位：</label>
							<div class="col-lg-4">
								<input type="text" class="form-control" name="supervision" value="'.$row['supervision'].'">
							</div>
							<label class="col-lg-2">報價日期：</label>
							<div class="col-lg-4">
									<input type="text" class="form-control" name="sdate" id="datepicker0" value="'.$row['sdate'].'">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-2">工程地點：</label>
							<div class="col-lg-4">
								<input type="text" class="form-control" name="ee_address" value="'.$row['ee_address'].'">
							</div>
							<label class="col-lg-2">報價期限：</label>
							<div class="col-lg-4">
									<input type="text" class="form-control" name="edate" id="datepicker1" value="'.$row['edate'].'">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-2">工程名稱：</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" name="ee_name" value="'.$row['ee_name'].'">
							</div>
						</div>
						<div class="form-group row text-center">
							<label class="col-lg-2">接 洽 人：</label>
							<div class="col-lg-2">
								<input type="text" class="form-control" name="business_name" value="'.$row['business_name'].'">
							</div>
							<label class="col-lg-2">聯絡電話：</label>
							<div class="col-lg-2">
								<input type="text" class="form-control" name="business_phone" value="'.$row['business_phone'].'">
							</div>
							<label class="col-lg-2">業務分機：</label>
							<div class="col-lg-2">
								<input type="text" class="form-control" name="extension" value="'.$row['extension'].'">
							</div>
						</div>
					</div>
					<h5 class="text-center mt-5 mb-3">控制性低強度回填材料(CLSM) 規  格</h5>
					<div class="row text-center" style="line-height:4;letter-spacing:6px;">
						<div class="col-lg-2">28天抗壓強度
						</div>
						<div class="col-lg-2">坍流度
						</div>
						<div class="col-lg-1">骨材
						</div>
						<div class="col-lg-2">數量
						</div>
						<div class="col-lg-1">單價
						</div>
						<div class="col-lg-4">備註
						</div>
						<!--    1  ------------------------------------------------------------------   -->
						';
						
						for($i=1;$i<8 ;$i++){
							$strength = "strength".$i;
							$turbulence = "turbulence".$i;
							$aggregate = "aggregate".$i;
							$number = "number".$i;
							$price = "price".$i;
							$remark = "remark".$i;
							$nnumber=$row["$number"]==0?"":$row["$number"];
							$nprice=$row["$price"]==0?"":$row["$price"];
							$strength_s=substr($row["$strength"], 0, 2);
							$strength_e=substr($row["$strength"], 3, 2);
							// echo '$strength_s:'.$strength_s;
							// echo '$strength_e:'.$strength_e;
							//echo '$turbulence-------------------------'.$turbulence;
							echo '<div class="col-lg-2 mb-3">
								<select class="form-control" name="strength'.$i.'">';
									$strength_sql = mysqli_query($db, "SELECT * FROM clsm_28strength order by snum ASC");
									
									while ($row_strength = mysqli_fetch_array($strength_sql)) {
										echo '<option class="text-center" value="'.$row_strength['snum'].'-'.$row_strength['enum'].'"'; echo $strength_s==$row_strength['snum'] && $strength_e==$row_strength['enum']?" selected":""; echo '>'.$row_strength['snum'].'-'.$row_strength['enum'].'</option>\n';
									}
								echo '
								</select>
							</div>
							<div class="col-lg-2">
								<input type="text" class="form-control" name="turbulence'.$i.'" value="'.$row["$turbulence"].'">
							</div>
							<div class="col-lg-1">
								<input type="text" class="form-control" name="aggregate'.$i.'" value="'.$row["$aggregate"].'">
							</div>
							<div class="col-lg-2">
								<input type="text" class="form-control" name="number'.$i.'" value="'.$nnumber.'">
							</div>
							<div class="col-lg-1">
								<input type="text" class="form-control" name="price'.$i.'" value="'.$nprice.'">
							</div>
							<div class="col-lg-4">
								<select class="form-control" name="remark'.$i.'">';
									$remark_sql = mysqli_query($db, "SELECT * FROM remark");
									while ($row_remark = mysqli_fetch_array($remark_sql)) {
										echo '<option value="'.$row_remark['remark'].'"'; echo $row["$remark"] == $row_remark['remark']?" selected":""; echo '>'.$row_remark['remark'].'</option>';
										
									}
							echo'
								</select>
							</div>';
							
						}
						echo '		
						</div>
						<div style="line-height:4;padding-left:20px;letter-spacing:6px;">
							<div class="form-check">
								<label class="form-check-label form-inline">
									<input type="checkbox" class="form-check-input" name="terms1" value="1" checked>1．上列單價如遇原料、燃料、工資等價格波動時，得比照市價調整之。
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label form-inline">
									<input type="checkbox" class="form-check-input" name="terms2" value="1" checked>2．上述價格係保證強度價格，貴客戶若另有要求時單價另議。
								</label>
							</div>	
							<div class="form-check">
								<label class="form-check-label form-inline">
									<input type="radio" class="form-check-input" name="terms3" value="1"'; echo $row['terms3'] == "1"?" checked ":""; echo '>3．本報價單未含加值營業稅。&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="radio" class="form-check-input" name="terms3" value="2"'; echo $row['terms3'] == "2"?" checked ":""; echo '>．本報價單已含加值營業稅。
								</label>
							</div>	
							<div class="form-check">
								<label class="form-check-label form-inline">
									<input type="radio" class="form-check-input" name="terms4" value="1"'; echo $row['terms4'] == "1"?" checked ":""; echo '>4．本報價單未含試體試驗費。&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="radio" class="form-check-input" name="terms4" value="2"'; echo $row['terms4'] == "2"?" checked ":""; echo '>．本報價單已含試體試驗費。
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-labe form-inline">
									<input type="checkbox" class="form-check-input" name="terms5" value="1"'; echo $row['terms5'] == "1"?" checked ":""; echo '>
									5．依施工規範每&nbsp;<input type="text" class="form-control" name="specimen_m3" maxlength="3" value="'.$row['specimen_m3'].'" style="width:60px">&nbsp;M<sup>3</sup>&nbsp;加作一組試體，
									採累進制。每組&nbsp;<input type="text" class="form-control" name="specimen_num" maxlength="2" value="'.$row['specimen_num'].'" style="width:50px">&nbsp;顆試體
								</label>
							</div>	
							<div class="form-check">
								<label class="form-check-label form-inline">
									<input type="checkbox" class="form-check-input" name="terms6" value="1"'; echo $row['terms6'] == "1"?" checked ":""; echo '>6．夜間施工為19:00起出料，且須協調方可出料，每M<sup>3</sup>&nbsp;加收&nbsp;<input type="text" class="form-control" name="night_price" maxlength="4" value="'.$row['night_price'].'" style="width:70px">&nbsp;元。
								</label>
							</div>	
							<div class="form-check">
								<label class="form-check-label form-inline">
									<input type="checkbox" class="form-check-input" name="terms7" value="1"'; echo $row['terms7'] == "1"?" checked ":""; echo '>7．本報價單不含驗廠試拌、圓柱及粗細骨材試驗費用。
								</label>
							</div>	
						</div>';
			
					}
				echo '<div class="text-center mt-5"><button type="submit" class="btn btn-primary" name="nsubmit">儲存</button></div>
				<input type="hidden" name="num" value="'.$num.'">
			</form>';
		?>		
	</div>
	
	<?php include_once ("footer.php"); ?>	
</body>
</html>
