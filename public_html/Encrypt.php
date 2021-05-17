<?php
include("MCrypt.php");
$mcrypt = new MCrypt();

  
$encrypted = $mcrypt->encrypt("xx123");
echo $encrypted. '         </br>         ';

$decrypted = $mcrypt->decrypt($encrypted);
echo $decrypted;
/* */
?>