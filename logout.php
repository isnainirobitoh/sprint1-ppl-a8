<?php

session_start();
// session_destroy(); 
// header("Location: index.php");

echo '<script>';
echo 'if(confirm("Apakah anda yakin ingin logout?")){';
echo 'window.location.href="index.php";';
echo '} else {';
echo 'window.history.back();';
echo '}';
echo '</script>';

?>