<?php
session_start();
session_destroy();
//var_dump($_SESSION['user_id']);
header("location:http://$_SERVER[HTTP_HOST]/colorart/login");
exit();
?>