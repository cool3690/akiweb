<?php
	$db = mysqli_connect("localhost", "akkysc5_admin", "admin", "akkysc5_cram") or die("Could not connect: " . mysql_error());
	mysqli_query($db, "SET CHARACTER SET UTF8");
	mysqli_set_charset($db,"utf8");
?>