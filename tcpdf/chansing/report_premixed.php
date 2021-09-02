<?php
	// Include the main TCPDF library (search for installation path).
	require_once('tcpdf_include.php');
	require_once('db_login.php');
	session_start();
	// create new PDF document
		$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
	// set document information
		$pdf->SetTitle('報 價 單'); //Titlo del pdf
		$pdf->setPrintHeader(false); //No se imprime cabecera
		$pdf->setPrintFooter(0); //No se imprime pie de pagina
	// set margins
		$pdf->SetMargins(5, 5, 5, false); //Se define margenes izquierdo, alto, derecho
	// set auto page breaks
		$pdf->SetAutoPageBreak(true, 0); //Se define un salto de pagina con un limite de pie de pagina
	// set font
		$pdf->SetFont('droidsansfallback', '', 12);
	// add a page
		$pdf->AddPage();

	// $num=$_POST['num'];
	if (isset($_POST['submit'])) {
		$num = $_POST['num'];		
	}else{
		$num = '1';	
	}
//	$clsm = mysqli_query($db, "SELECT * FROM premixed num = '$num'");
	$clsm = mysqli_query($db, "SELECT * FROM premixed");
	$html = '';
	$item = 1;

	while ($row = mysqli_fetch_array($clsm)) {	
		$customer = $row['customer'];
		$owner = $row['owner'];
		$supervision = $row['supervision'];
		$ee_address = $row['ee_address'];
		$ee_name = $row['ee_name'];
		$ee_phone = $row['ee_phone'];
		$ee_fax = $row['ee_fax'];
		$sdate = $row['sdate'];
		$edate = $row['edate'];
		$strength1_1 = $row['strength1_1'];
		$strength1_2 = $row['strength1_2'];
		$turbulence1 = $row['turbulence1'];
		$aggregate1 = $row['aggregate1'];
		$number1 = ($row['number1'] == 0 ? "":$row['number1']);
		$price1 = ($row['price1'] == 0 ? "":$row['price1']);
		$type1 = $row['type1'];
		$remark1 = $row['remark1'];
		$strength2_1 = $row['strength2_1'];
		$strength2_2 = $row['strength2_2'];
		$turbulence2 = $row['turbulence2'];
		$aggregate2 = $row['aggregate2'];
		$number2 = ($row['number2'] == 0 ? "":$row['number2']);
		$price2 = ($row['price2'] == 0 ? "":$row['price2']);
		$type2 = $row['type2'];
		$remark2 = $row['remark2'];
		$strength3_1 = $row['strength3_1'];
		$strength3_2 = $row['strength3_2'];
		$turbulence3 = $row['turbulence3'];
		$aggregate3 = $row['aggregate3'];
		$number3 = ($row['number3'] == 0 ? "":$row['number3']);
		$price3 = ($row['price3'] == 0 ? "":$row['price3']);
		$type3 = $row['type3'];
		$remark3 = $row['remark3'];
		$strength4_1 = $row['strength4_1'];
		$strength4_2 = $row['strength4_2'];
		$turbulence4 = $row['turbulence4'];
		$aggregate4 = $row['aggregate4'];
		$number4 = ($row['number4'] == 0 ? "":$row['number4']);
		$price4 = ($row['price4'] == 0 ? "":$row['price4']);
		$type4 = $row['type4'];
		$remark4 = $row['remark4'];
		$strength5_1 = $row['strength5_1'];
		$strength5_2 = $row['strength5_2'];
		$turbulence5 = $row['turbulence5'];
		$aggregate5 = $row['aggregate5'];
		$number5 = ($row['number5'] == 0 ? "":$row['number5']);
		$price5 = ($row['price5'] == 0 ? "":$row['price5']);
		$type5 = $row['type5'];
		$remark5 = $row['remark5'];
		$strength6_1 = $row['strength6_1'];
		$strength6_2 = $row['strength6_2'];
		$turbulence6 = $row['turbulence6'];
		$aggregate6 = $row['aggregate6'];
		$number6 = ($row['number6'] == 0 ? "":$row['number6']);
		$price6 = ($row['price6'] == 0 ? "":$row['price6']);
		$type6 = $row['type6'];
		$remark6 = $row['remark6'];		$strength7_1 = $row['strength7_1'];
		$strength7_2 = $row['strength7_2'];
		$turbulence7 = $row['turbulence7'];
		$aggregate7 = $row['aggregate7'];
		$number7 = ($row['number7'] == 0 ? "":$row['number7']);
		$price7 = ($row['price7'] == 0 ? "":$row['price7']);
		$type7 = $row['type7'];
		$remark7 = $row['remark7'];
		$business_name = $row['business_name'];
		$business_phone = $row['business_phone'];
		$extension = $row['extension'];
		$specimen_m3 = ($row['specimen_m3'] == 0 ? "*":$row['specimen_m3']);
		$specimen_num = ($row['specimen_num'] == 0 ? "*":$row['specimen_num']);
		$night_price = ($row['night_price'] == 0 ? "*":$row['night_price']);
		$terms1 = ($row['terms1'] == 1 ? '<span style="font-family: zapfdingbats;">n </span>':'<span style="font-family: zapfdingbats;">r </span>'); 
		$terms2 = ($row['terms2'] == 1 ? '<span style="font-family: zapfdingbats;">n </span>':'<span style="font-family: zapfdingbats;">r </span>'); 
		$terms3_1 = ($row['terms3_1'] == 1 ? '<span style="font-family: zapfdingbats;">n </span>':'<span style="font-family: zapfdingbats;">r </span>'); 
		$terms3_2 = ($row['terms3_2'] == 1 ? '<span style="font-family: zapfdingbats;">n </span>':'<span style="font-family: zapfdingbats;">r </span>'); 
		$terms4_1 = ($row['terms4_1'] == 1 ? '<span style="font-family: zapfdingbats;">n </span>':'<span style="font-family: zapfdingbats;">r </span>'); 
		$terms4_2 = ($row['terms4_2'] == 1 ? '<span style="font-family: zapfdingbats;">n </span>':'<span style="font-family: zapfdingbats;">r </span>'); 
		$terms5 = ($row['terms5'] == 1 ? '<span style="font-family: zapfdingbats;">n </span>':'<span style="font-family: zapfdingbats;">r </span>'); 
		$terms6 = ($row['terms6'] == 1 ? '<span style="font-family: zapfdingbats;">n </span>':'<span style="font-family: zapfdingbats;">r </span>'); 
		$terms7 = ($row['terms7'] == 1 ? '<span style="font-family: zapfdingbats;">n </span>':'<span style="font-family: zapfdingbats;">r </span>'); 

		$html .= '
				<table border="0" cellpadding="2.4">
					<tr style="width:60px;line-height:10px;">
						<td style="width:75px;"></td>
						<td style="width:460px;"><img src="image/logo_text.jpg" style="width:400px;"></td>
						<td style="width:50px;font-size:10px;">Ver 1.0</td>
					</tr>
					<tr>
						<td style="width:590px;font-size:18px;text-align:center;letter-spacing:5px;">
							報價單
						</td>
	  				</tr>
				</table>
				<table border="0" cellpadding="4.7">
					<tr>
						<td style="width:70px;"><b>客&nbsp;&nbsp;&nbsp;戶：</b></td>
						<td style="width:260px;">'.$customer.'</td>
						<td style="width:70px;"><b>聯絡電話：</b></td>
						<td style="width:150px;">'.$ee_phone.'</td>
					</tr>
					<tr>
						<td><b>業&nbsp;&nbsp;&nbsp;主：</b></td>
						<td>'.$owner.'</td>
						<td><b>傳真電話：</b></td>
						<td>'.$ee_fax.'</td>
					</tr>
					<tr>
						<td><b>監造單位：</b></td>
						<td>'.$supervision.'</td>
						<td><b>報價日期：</b></td>
						<td>'.$sdate.'</td>
					</tr>
					<tr>
						<td><b>工程地點：</b></td>
						<td>'.$ee_address.'</td>
						<td><b>報價期限：</b></td>
						<td>'.$edate.'</td>
					</tr>
					<tr>
						<td><b>工程名稱：</b></td>
						<td colspan="4">'.$ee_name.'</td>
					</tr>	
				</table>
				<table border="1" cellpadding="4.7" style="text-align:center;">
					<tr style="margin-top:15px;">
						<th colspan="6" style="width:320px;">預  拌  混  凝  土  規  格</th>
						<td rowspan="3" style="width:60px;line-height:30px;">數量<br>( m³ )</td>
						<td rowspan="3" style="width:70px;line-height:30px;">單價<br> ( 元 / m³ )</td>
						<th rowspan="3" style="width:115px;line-height: 60px;">備註</th>
					</tr>
					<tr>
						<td colspan="2" style="width:120px;">28天抗壓強度</td>
						<td  rowspan="2" style="width:60px;line-height:20px;">坍流度<br>( cm )</td>
						<td  rowspan="2" style="width:60px;line-height:20px;">骨材<br>( m / m )</td>
						<td  rowspan="2" style="width:80px;line-height:40px;"> 水 泥 型 別 </td>
	  				</tr>
					<tr>
						<td style="width:60px;">kgf / cm²</td>
						<td style="width:60px;">Lbs / in²</td>
	  				</tr>
	  				<tr>
						<td>'.$strength1_1.'</td>
						<td>'.$strength1_2.'</td>
						<td>'.$turbulence1.'</td>
						<td>'.$aggregate1.'</td>
						<td>'.$type1.'</td>
						<td style="width:60px;">'.$number1.'</td>
						<td style="width:70px;">'.$price1.'</td>
						<td style="width:115px;text-align:left;">'.$remark1.'</td>
					</tr>
	  				<tr>
						<td>'.$strength2_1.'</td>
						<td>'.$strength2_2.'</td>
						<td>'.$turbulence2.'</td>
						<td>'.$aggregate2.'</td>
						<td>'.$type2.'</td>
						<td>'.$number2.'</td>
						<td>'.$price2.'</td>
						<td style="width:115px;text-align:left;">'.$remark2.'</td>
					</tr>
	  				<tr>
						<td>'.$strength3_1.'</td>
						<td>'.$strength3_2.'</td>
						<td>'.$turbulence3.'</td>
						<td>'.$aggregate3.'</td>
						<td>'.$type3.'</td>
						<td>'.$number3.'</td>
						<td>'.$price3.'</td>
						<td style="width:115px;text-align:left;">'.$remark3.'</td>
					</tr>
					<tr>
						<td>'.$strength4_1.'</td>
						<td>'.$strength4_2.'</td>
						<td>'.$turbulence4.'</td>
						<td>'.$aggregate4.'</td>
						<td>'.$type4.'</td>
						<td>'.$number4.'</td>
						<td>'.$price4.'</td>
						<td style="width:115px;text-align:left;">'.$remark4.'</td>
					</tr>
					<tr>
						<td>'.$strength5_1.'</td>
						<td>'.$strength5_2.'</td>
						<td>'.$turbulence5.'</td>
						<td>'.$aggregate5.'</td>
						<td>'.$type5.'</td>
						<td>'.$number5.'</td>
						<td>'.$price5.'</td>
						<td style="width:115px;text-align:left;">'.$remark5.'</td>
					</tr>
					<tr>
						<td>'.$strength6_1.'</td>
						<td>'.$strength6_2.'</td>
						<td>'.$turbulence6.'</td>
						<td>'.$aggregate6.'</td>
						<td>'.$type6.'</td>
						<td>'.$number6.'</td>
						<td>'.$price6.'</td>
						<td style="width:115px;text-align:left;">'.$remark6.'</td>
					</tr>
					<tr>
						<td>'.$strength7_1.'</td>
						<td>'.$strength7_2.'</td>
						<td>'.$turbulence7.'</td>
						<td>'.$aggregate7.'</td>
						<td>'.$type7.'</td>
						<td>'.$number7.'</td>
						<td>'.$price7.'</td>
						<td style="width:115px;text-align:left;">'.$remark7.'</td>
					</tr>
				</table>		
				<table border="1" cellpadding="4.7" style="text-align:left;">
					<tr>
						<td rowspan="7"  style="width:40px;line-height: 37px;text-align:center;">訂<br>貨<br>條<br>款</td>
						<td style="width:525px;"> '.$terms1.'1．上列單價如遇原料、燃料、工資等價格波動時，得比照市價調整之。</td>
					</tr>
					<tr>
						<td style="width:525px;"> '.$terms2.'2．上述價格係保證強度價格，貴客戶若另有要求時單價另議。</td>
	  				</tr>
					<tr>
						<td style="width:525px;"> '.$terms3_1.'3．本報價單未含加值營業稅。&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$terms3_2.'．本報價單已含加值營業稅。</td>
	  				</tr>
					<tr>
						<td style="width:525px;"> '.$terms4_1.'4．本報價單未含試體試驗費。&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$terms4_2.'．本報價單已含試體試驗費。</td>
	  				</tr>
					<tr>
						<td style="width:525px;"> '.$terms5.'5．依施工規範每 <u> '.$specimen_m3.' </u>M<sup>3</sup>加作一組試體，採累進制。每組 <u> '.$specimen_num.' </u>顆試體</td>
	  				</tr>
					<tr>
						<td style="width:525px;"> '.$terms6.'6．夜間施工為19:00起出料，且須協調方可出料，每 M<sup>3</sup> 加收 <u> '.$night_price.' </u>元。</td>
	  				</tr>
					<tr>
						<td style="width:525px;"> '.$terms7.'7．本報價單不含驗廠試拌、圓柱及粗細骨材試驗費用。</td>
	  				</tr>
				</table>
				<table cellpadding="4.7" style="text-align:left;border: 1px solid black;">
					<tr style="margin-top:15px;">
						<td style="width:70px;border-bottom: 1px solid black;">公司名稱：</td>
						<td style="width:260px;border-bottom: 1px solid black;">全興資源再生股份有限公司</td>
						<td rowspan="8" style="width:235px;border-left: 1px solid black;text-align:right;"><br><br><br><br><br><br><br><img src="image/logo1.png" width="100px;"></td>
					</tr>
					<tr>
						<td style="width:70px;border-bottom: 1px solid black;">公司地址：</td>
						<td style="width:260px;border-bottom: 1px solid black;">台南市山上區明和里北勢洲21-1號</td>
					</tr>
					<tr>
						<td style="width:70px;border-bottom: 1px solid black;">公司電話：</td>
						<td style="width:260px;border-bottom: 1px solid black;">06-5781821</td>
					</tr>
					<tr>
						<td style="width:70px;border-bottom: 1px solid black;">調度專線：</td>
						<td style="width:260px;border-bottom: 1px solid black;">06-5784666，06-5784728</td>
					</tr>
					<tr>
						<td style="width:70px;border-bottom: 1px solid black;">接洽人員：</td>
						<td style="width:260px;border-bottom: 1px solid black;">'.$business_name.'</td>
					</tr>
					<tr>
						<td style="width:70px;border-bottom: 1px solid black;">聯絡電話：</td>
						<td style="width:260px;border-bottom: 1px solid black;">'.$business_phone.'</td>
					</tr>
					<tr>
						<td style="width:70px;border-bottom: 1px solid black;">電子信箱：</td>
						<td style="width:260px;border-bottom: 1px solid black;">chansing16888@gmail.com</td>
					</tr>
					<tr>
						<td style="width:70px;border-bottom: 1px solid black;">業務分機：</td>
						<td style="width:260px;border-bottom: 1px solid black;">06-5781821 #'.$extension.'</td>
					</tr>
				</table>				
				';

		$item = $item+1;
	}

	$pdf->writeHTML($html, true, 0, true, 0);

	$pdf->lastPage();
	$pdf->output('Reporte_premixed.pdf', 'I');
	
						// <tr>
						// <td><b>Imagen: </b></td>
						// <td><img src="image/'.$imagen.'" width="120px"></td>
					// </tr>
?>