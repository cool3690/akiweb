<?php
include("MCrypt.php");
$mcrypt = new MCrypt();

/* Encrypt */
$encrypted = $mcrypt->encrypt("asdddd");
echo $encrypted.'                  ';
/* Decrypt */
$decrypted = $mcrypt->decrypt($encrypted);
echo $decrypted;
?>