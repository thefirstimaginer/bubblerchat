<?php

$dbhost = "localhost";
$dbuser = "adryan";
$dbpass = "pssswd2026!";
$dbname = "login_lim_db";

if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname))
{
	die("Não Foi Possível Conectar!, Encerrado!");
}
