<?php 


setcookie('adminlogin',md5($_POST['pass']),strtotime('-1 day'),"/");

header('location:index.php');

?>