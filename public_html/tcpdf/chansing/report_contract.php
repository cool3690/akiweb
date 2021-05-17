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
							預拌混凝土訂購合約
						</td>
	  				</tr>
				</table>
				<table border="1" cellpadding="2.0">
					<tr>
						<td style="width:95px;letter-spacing:10px;"><b>訂貨客戶</b></td>
						<td style="width:240px;">'.$customer.'</td>
						<td style="width:75px;letter-spacing:11px;"><b>負責人</b></td>
						<td style="width:155px;"></td>
					</tr>
					<tr>
						<td style="letter-spacing:10px;"><b>帳單地址</b></td>
						<td></td>
						<td style="letter-spacing:5px;"><b>統一編號</b></td>
						<td></td>
					</tr>
					<tr>
						<td style="letter-spacing:10px;"><b>工程名稱</b></td>
						<td colspan="4">'.$ee_name.'</td>
					</tr>	
					<tr>
						<td style="letter-spacing:10px;"><b>監造單位</b></td>
						<td colspan="4">'.$supervision.'</td>
					</tr>	
					<tr>
						<td style="letter-spacing:32px;"><b>業主</b></td>
						<td colspan="4">'.$owner.'</td>
					</tr>	
					<tr>
						<td style="letter-spacing:10px;"><b>交貨地點</b></td>
						<td>'.$ee_address.'</td>
						<td style="letter-spacing:1px;"><b>工地負責人</b></td>
						<td></td>
					</tr>
					<tr>
						<td style="letter-spacing:1px;"><b>訂購有限期限</b></td>
						<td>'.$sdate.'</td>
						<td style="letter-spacing:5px;"><b>聯絡電話</b></td>
						<td>'.$ee_phone.'</td>
					</tr>
				</table>
				<table border="1" cellpadding="2.0" style="text-align:center;">
					<tr style="margin-top:15px;">
						<td rowspan="9"  style="width:25px;line-height: 43px;text-align:center;">訂貨內容</td>
						<td colspan="2" style="width:120px;line-height:20px;">抗壓強度</td>
						<td  rowspan="2" style="width:60px;line-height:20px;">坍流度<br>( cm )</td>
						<td  rowspan="2" style="width:60px;line-height:20px;">骨材<br>( m / m )</td>
						<td rowspan="2" style="width:60px;line-height:20px;">數量<br>( m³ )</td>
						<td rowspan="2" style="width:70px;line-height:20px;">單價<br> ( 元 / m³ )</td>
						<th rowspan="2" style="width:170px;line-height: 40px;">備註</th>
	  				</tr>
					<tr>
						<td style="width:60px;line-height:20px;">kgf / cm²</td>
						<td style="width:60px;line-height:20px;">psi</td>
	  				</tr>
	  				<tr>
						<td>'.$strength1_1.'</td>
						<td>'.$strength1_2.'</td>
						<td>'.$turbulence1.'</td>
						<td>'.$aggregate1.'</td>
						<td style="width:60px;">'.$number1.'</td>
						<td style="width:70px;">'.$price1.'</td>
						<td style="width:170px;text-align:left;">'.$remark1.'</td>
					</tr>
	  				<tr>
						<td>'.$strength2_1.'</td>
						<td>'.$strength2_2.'</td>
						<td>'.$turbulence2.'</td>
						<td>'.$aggregate2.'</td>
						<td>'.$number2.'</td>
						<td>'.$price2.'</td>
						<td style="width:170px;text-align:left;">'.$remark2.'</td>
					</tr>
	  				<tr>
						<td>'.$strength3_1.'</td>
						<td>'.$strength3_2.'</td>
						<td>'.$turbulence3.'</td>
						<td>'.$aggregate3.'</td>
						<td>'.$number3.'</td>
						<td>'.$price3.'</td>
						<td style="width:170px;text-align:left;">'.$remark3.'</td>
					</tr>
					<tr>
						<td>'.$strength4_1.'</td>
						<td>'.$strength4_2.'</td>
						<td>'.$turbulence4.'</td>
						<td>'.$aggregate4.'</td>
						<td>'.$number4.'</td>
						<td>'.$price4.'</td>
						<td style="width:170px;text-align:left;">'.$remark4.'</td>
					</tr>
					<tr>
						<td>'.$strength5_1.'</td>
						<td>'.$strength5_2.'</td>
						<td>'.$turbulence5.'</td>
						<td>'.$aggregate5.'</td>
						<td>'.$number5.'</td>
						<td>'.$price5.'</td>
						<td style="width:170px;text-align:left;">'.$remark5.'</td>
					</tr>
					<tr>
						<td>'.$strength6_1.'</td>
						<td>'.$strength6_2.'</td>
						<td>'.$turbulence6.'</td>
						<td>'.$aggregate6.'</td>
						<td>'.$number6.'</td>
						<td>'.$price6.'</td>
						<td style="width:170px;text-align:left;">'.$remark6.'</td>
					</tr>
					<tr>
						<td>'.$strength7_1.'</td>
						<td>'.$strength7_2.'</td>
						<td>'.$turbulence7.'</td>
						<td>'.$aggregate7.'</td>
						<td>'.$number7.'</td>
						<td>'.$price7.'</td>
						<td style="width:170px;text-align:left;">'.$remark7.'</td>
					</tr>
				</table>		
				<table border="1" cellpadding="2.0" style="text-align:left;">
					<tr>
						<td rowspan="9"  style="width:25px;line-height: 18px;text-align:center;">付款辦法</td>
						<td style="width:540px;"> '.$terms1.'1．本合約單價				含5%營業稅。</td>
					</tr>
					<tr>
						<td style="width:540px;"> '.$terms2.'2．本合約單價				未含試體試驗費。</td>
	  				</tr>
					<tr>
						<td style="width:540px;"> '.$terms3_1.'3．每月請付款各 1 次							結帳日	當月30日		帳單送達日		當月	月底前。</td>
	  				</tr>
					<tr>
						<td style="width:540px;"> '.$terms4_1.'4．付款條件			月結 30天				支付方式	現金。</td>
	  				</tr>
				</table>	
				<table border="1" cellpadding="2.0" style="text-align:left;">
					<tr>
						<td rowspan="9"  style="width:25px;line-height: 28px;text-align:center;">約定事項</td>
						<td style="width:540px;"> '.$terms1.'1．附件混凝土訂貨辦法及授權書為本單契約之ㄧ部分。</td>
					</tr>
					<tr>
						<td style="width:540px;"> '.$terms2.'2．上開數量乃預定數量，計價按送貨單實際送貨數量計價。</td>
	  				</tr>
					<tr>
						<td style="width:540px;"> '.$terms3_1.'3．本合約試體以標單數量為主：抗壓圓柱試體***<br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							鑽心試體***(累進計算)，超出部分其試驗費由客戶自行負擔。
						</td>
	  				</tr>
					<tr>
						<td style="width:540px;"> '.$terms4_1.'4．驗收鑽心試體抗壓結果未符合規範，則由本公司負全責。</td>
	  				</tr>
					<tr>
						<td style="width:540px;"> '.$terms5.'5．本案採用焚化爐底渣，其採用底渣約定事項如附件一。</td>
	  				</tr>
					<tr>
						<td style="width:540px;"> '.$terms7.'6．本合約報價未含驗廠試拌、圓柱及粗細骨材所產生之試驗費用。</td>
	  				</tr>
				</table>
				<table cellpadding="2.0" style="text-align:left;border: 1px solid black;">
					<tr style="margin-top:15px;text-align:center;">
						<td colspan="2" style="width:305px;border-right: 1px solid black;border-bottom: 1px solid black;">客戶簽章</td>
						<td colspan="2" style="width:260px;border-bottom: 1px solid black;">公司簽章</td>
					</tr>
					<tr style="margin-top:15px;">
						<td style="width:100px;border-right: 1px solid black;border-bottom: 1px solid black;letter-spacing:12px;">客戶名稱</td>
						<td style="width:205px;border-right: 1px solid black;border-bottom: 1px solid black;">'.$customer.'</td>
						<td style="width:70px;border-right: 1px solid black;border-bottom: 1px solid black;letter-spacing:4px;">公司名稱</td>
						<td style="width:190px;border-bottom: 1px solid black;">全興資源再生股份有限公司</td>
					</tr>
					<tr>
						<td style="border-right: 1px solid black;border-bottom: 1px solid black;letter-spacing:20px;">負責人</td>
						<td style="border-right: 1px solid black;border-bottom: 1px solid black;"></td>
						<td style="border-right: 1px solid black;border-bottom: 1px solid black;letter-spacing:10px;">負責人</td>
						<td style="border-bottom: 1px solid black;">李英桐</td>
					</tr>
					<tr>
						<td style="border-right: 1px solid black;border-bottom: 1px solid black;letter-spacing:12px;">統一編號</td>
						<td style="border-right: 1px solid black;border-bottom: 1px solid black;"></td>
						<td style="border-right: 1px solid black;border-bottom: 1px solid black;letter-spacing:4px;">統一編號</td>
						<td style="border-bottom: 1px solid black;">28047548</td>
					</tr>
					<tr>
						<td style="border-right: 1px solid black;border-bottom: 1px solid black;letter-spacing:12px;">公司地址</td>
						<td style="border-right: 1px solid black;border-bottom: 1px solid black;"></td>
						<td style="border-right: 1px solid black;border-bottom: 1px solid black;letter-spacing:4px;">公司地址</td>
						<td style="border-bottom: 1px solid black;">台南市山上區明和里北勢洲21-1號</td>
					</tr>
					<tr>
						<td style="border-right: 1px solid black;border-bottom: 1px solid black;letter-spacing:12px;">公司電話</td>
						<td style="border-right: 1px solid black;border-bottom: 1px solid black;"></td>
						<td style="border-right: 1px solid black;border-bottom: 1px solid black;letter-spacing:4px;">公司電話</td>
						<td style="border-bottom: 1px solid black;">06-5781821</td>
					</tr>
					<tr>
						<td style="border-right: 1px solid black;border-bottom: 1px solid black;letter-spacing:12px;">公司傳真</td>
						<td style="border-right: 1px solid black;border-bottom: 1px solid black;"></td>
						<td style="border-right: 1px solid black;border-bottom: 1px solid black;letter-spacing:4px;">調度專線</td>
						<td style="border-bottom: 1px solid black;">06-5784666，06-5784728</td>
					</tr>
					<tr>
						<td style="border-right: 1px solid black;border-bottom: 1px solid black;letter-spacing:1px;">連帶保證人簽章</td>
						<td style="border-right: 1px solid black;border-bottom: 1px solid black;"></td>
						<td style="border-right: 1px solid black;border-bottom: 1px solid black;letter-spacing:4px;">公司傳真</td>
						<td style="border-bottom: 1px solid black;">06-5782788</td>
					</tr>
					<tr>
						<td style="border-right: 1px solid black;border-bottom: 1px solid black;letter-spacing:20px;">保證人</td>
						<td style="border-right: 1px solid black;border-bottom: 1px solid black;"></td>
						<td style="border-right: 1px solid black;border-bottom: 1px solid black;letter-spacing:4px;">接洽人員</td>
						<td style="border-bottom: 1px solid black;">'.$business_name.'</td>
					</tr>
					<tr>
						<td style="border-right: 1px solid black;border-bottom: 1px solid black;letter-spacing:7px;">身分證字號</td>
						<td style="border-right: 1px solid black;border-bottom: 1px solid black;"></td>
						<td style="border-right: 1px solid black;border-bottom: 1px solid black;letter-spacing:4px;">聯絡電話</td>
						<td style="border-bottom: 1px solid black;">'.$business_phone.'</td>
					</tr>
					<tr>
						<td style="border-right: 1px solid black;border-bottom: 1px solid black;letter-spacing:36px;">地址</td>
						<td style="border-right: 1px solid black;border-bottom: 1px solid black;"></td>
						<td style="border-right: 1px solid black;border-bottom: 1px solid black;letter-spacing:4px;">電子信箱</td>
						<td style="border-bottom: 1px solid black;">chansing16888@gmail.com</td>
					</tr>														

				</table>	
				<div style="text-align:ceter;">
					本合約書一式兩份，由客戶與本公司分別存執
				</div>	
				<br>	
				<table border="0" cellpadding="0.5">
					<tr style="line-height:20px;">
						<td style="width:80px;"></td>
						<td style="width:460px;"><img src="image/logo_text.jpg" style="width:400px;"></td>
						<td style="width:50px;font-size:10px;"></td>
					</tr>
					<tr>
						<td style="width:590px;font-size:14px;text-align:center;">
							訂購、收款及驗收辦法
						</td>
	  				</tr>
				</table>
				<table cellpadding="0.5" style="font-size:11px;text-align:left;letter-spacing:0.7px;">
					<tr>
						<td colspan="2">
							壹、 訂購
						</td>
	  				</tr>	
					<tr>
						<td style="width:35px;"></td>
						<td style="width:530px;">
							<p style="text-indent:-23px;">
								一、本公司預拌混凝土售價均以立方公尺為單位計價。<br>
								二、本合約訂購數量及設計圖之設計方數僅供參考，應依實際出料數量計價。<br>
								三、預拌混凝土可由客戶在本公司售價表所列範圍內，指定需要規格或由客戶特別指定配合比例，但由客戶配合比例。者，應另於合約中議定註明，其售價另議，其品質由客戶自行負責。<br>
								
								四、本合約簽定生效後，若遇供料及油電、運輸等價格成本漲跌，或遇稅則修改時，合約單價可協議調整。<br>	
								五、本合約自簽約日後，如未依約執行開工交貨時，得另行議價，若協議不成則本公司有解除合約之權利。若遇混凝土原物料價格波動，合約單價不隨物價指數調整。	
							</p>
						</td>
	  				</tr>	
					<br>	
					<tr>
						<td colspan="2">
							貳、 交貨
						</td>
	  				</tr>	
					<tr>
						<td style="width:35px;"></td>
						<td style="width:530px;">
							<p style="text-indent:-23px;">
								一、送貨時間盡量配合客戶需要，由客戶指定聯絡人於澆置前一天通知本公司，如因天候、停電等不可抗拒之因素，或當日車輛調度不可克服因素時，其出貨日期或方式雙方同意協調之。<br>
								二、工地道路不良或設備欠周，導致攪拌車通行易遭危險時，客戶應即負責修補。工地通行地點如須收費，應由客戶負擔。<br>
								三、攪拌車在工地等待卸貨或正在卸貨中，如受居民或有機關管區人員干涉（包括環保問題及交通違規罰款等），或發生其他糾紛時，概由訂貨者負責處理。<br>
								四、工地若使用泵浦車，本公司產品之認定需在進入泵浦車入料斗前，管尾坍度及強度不列入品質之一部份。<br>
								五、經通知送達工地（包括已經出廠者）之混凝土，如因客戶工程之因素或遇雨天無法澆置時，應由客戶簽收作為交貨數量論之。<br>
								六、本公司預拌混凝土於出貨時，送貨單一式三聯隨車送達，客戶之工地應有收料員簽收，並交回簽收單後二聯予司機帶回，客戶應依[預拌混凝土送貨單]之客戶代表人簽收為憑，不得以其簽收人非其代表人或非其本人為由否認，必須承認該簽收單真實代表性。  
							</p>
						</td>
	  				</tr>
					<br>			
					<tr>
						<td colspan="2">
							參、 驗收  
						</td>
	  				</tr>	
					<tr>
						<td style="width:35px;"></td>
						<td style="width:530px;">
							<p style="text-indent:-23px;">
								一、送達工地之混凝土一日內超過100立方公尺以上時，得應客戶之要求隨時塑製圓柱試體以供檢驗（以未經施工前之車內裝貨料為準）。至於施工過程中諸變動因素並非本公司所能控制，故施工後之品質恕難負責。<br>
								二、試體之塑作個數，依CNS規定塑製之（合約設計數量,如需特別增做應敘述註明全部數量），試體由客戶檢驗人員簽認後交由本公司養護，屆試驗日期時，若無其他另行議定由公司送至具TAF認證之試驗單位執行。<br>
								三、若依施工規範條款，需執行材料檢驗，由本公司提供材料進行試驗。<br>
								四、實施抗壓試驗時，客戶（或業主）若不克會壓，則視同已承認試驗結果，不得異議。<br>
								五、混凝土強度檢驗標準以CNS3090-2042-15、16為依據。<br>
								六、送貨單載明混凝土之規格、數量及重量，卸料前由本公司負責，若有疑問請於卸料前提出。若卸料後，發現送貨單載明方數有明顯差異時，請立即通知廠方查證。<br>
								七、混凝土規格：客戶對數量認為有抽查必要時，應於簽收當日抽磅三車以上取其平均值，並以業主設計之配比單位重量2300kg/M3計算，其允許公差為3%，倘因計算數量與該車運送方數不符時，不足部分核計以當日運送數量為限。CLSM（控制性低強度回填材料）規格：客戶對數量認為有抽查必要時，應於簽收當日抽磅三車以上取其平均值，並以業主設計之配比單位重量1550±5%kg/M3計算，其允許公差為5%，倘因計算數量與該車運送方數不符時，不足部分核計以當日運送數量為限。<br>
								八、若客戶對混凝土重量與方數比有爭議時，得以會同本公司人員現場丈量數據並計算適當之損耗告知本公司改進。<br>
								九、厚度部分:坡面驗收厚度（鑽心試體與厚度一同取樣時不在此限）、排水孔數量預留不足、水保局護岸及及固床工穿透（驗收除外）或穿透長度超過180cm時、請廠商自行處理。<br>
								
								十、試體數量增作部分之試驗費由客戶自行負擔。
							</p>
						</td>
	  				</tr>	
					<br>		
					<tr>
						<td colspan="2">
							肆、 付款方式 
						</td>
	  				</tr>	
					<tr>
						<td style="width:35px;"></td>
						<td style="width:530px;">
							<p style="text-indent:-23px;">
								一、收款經雙方議定金額計價，依請款時間範圍內並完成交貨時，即憑送貨簽收單連同統一發票收足該期實交貨款，如未按約支付貨款或未依合約之簽訂票期支付款項時，本公司得以暫停送貨或加收利息。<br>
								二、客戶如未依約交付貨款或所交付之期票不能兌現時，本公司有權中止訂購合約，買方並應一次清償所有未結清款項。若有涉訴訟時，雙方同意以台南地方法院為第一管轄法院。
							
							</p>
						</td>
	  				</tr>
				</table>
				<br>	
				<div style="font-size:11px;text-align:center;">
					本辦法為訂貨契約之條件，均經雙方確認無誤並確實遵守，如需修改時亦須經雙方同意後，始得修改。
				</div>					
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