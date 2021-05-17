<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<?php
 include("vendor/phpps.php");
 
$mcrypt = new MCrypt();

/* Encrypt */
$encrypted = $mcrypt->encrypt("Text to encrypt");
echo "encrypted--------".$encrypted.'<br>';
/* Decrypt */
$decrypted = $mcrypt->decrypt($encrypted);
echo "decrypted--------".$decrypted.'<br>';



?>
</body>
</html>
