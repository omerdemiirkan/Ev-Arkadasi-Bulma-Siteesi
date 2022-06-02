<?php



$db = new PDO("mysql:host=localhost;dbname=ikinciel;charset=utf8", "root", "");
$db->exec("SET NAMES utf8");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
