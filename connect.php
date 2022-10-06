<?php
$serwer='localhost'; //127.0.0.1  
$user='root';
$pass='';
$baza='pkn';
$db = new mysqli($serwer, $user, $pass, $baza);
if(!$db){die('Błąd połączenia: ');}
?>