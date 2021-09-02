<?php
include("MCrypt.php");
$mcrypt = new MCrypt();

/* Encrypt */
$encrypted = "799b28cb8a001b1806a60276f1149a33";
echo $encrypted.'<br>';
/* Decrypt */
$decrypted = $mcrypt->decrypt($encrypted);
echo $decrypted;
?>