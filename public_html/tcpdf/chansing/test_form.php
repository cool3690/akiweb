<?php
		 include_once ("db_login.php");
					$sql = mysqli_query($db, "SELECT * FROM 28strength order by snum ASC");
					
$i=1;
foreach ($_POST as $key => $val){
	echo '$i-----------'.$i.'<br>';
	echo '$key-----------'.$key.'<br>';
	echo '$val-----------'.$val.'<br>';
	if($key=="t3"){
		
	echo $key.' =>'.$val.'<br>';
	}
	$i++;
}

	echo $_POST[0].' ---------------------=><br>';
	echo $key[0].' ---------------------=>'.$val[0].'<br>';
	echo $key.' ---------------------=>'.$val.'<br>';

INSERT INTO `clsm`(`num`, `customer`, `owner`, `supervision`, `ee_address`, `ee_name`, `ee_phone`, `ee_fax`, `sdate`, `edate`, `strength1`, `turbulence1`, `aggregate1`, `number1`, `price1`, `remark1`, `strength2`, `turbulence2`, `aggregate2`, `number2`, `price2`, `remark2`, `strength3`, `turbulence3`, `aggregate3`, `number3`, `price3`, `remark3`, `strength4`, `turbulence4`, `aggregate4`, `number4`, `price4`, `remark4`, `strength5`, `turbulence5`, `aggregate5`, `number5`, `price5`, `remark5`, `business_name`, `business_phone`, `extension`, `terms1`, `terms2`, `terms3`, `terms4`, `terms5`, `terms6`, `terms7`, `specimen_m3`, `specimen_num`, `night_price`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13],[value-14],[value-15],[value-16],[value-17],[value-18],[value-19],[value-20],[value-21],[value-22],[value-23],[value-24],[value-25],[value-26],[value-27],[value-28],[value-29],[value-30],[value-31],[value-32],[value-33],[value-34],[value-35],[value-36],[value-37],[value-38],[value-39],[value-40],[value-41],[value-42],[value-43],[value-44],[value-45],[value-46],[value-47],[value-48],[value-49],[value-50],[value-51],[value-52],[value-53])
?>      

