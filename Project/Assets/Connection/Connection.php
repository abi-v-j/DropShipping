<?php

$ServerName ="localhost";
$UserName ="root";
$Password ="";
$Database ="db_dropshipping";


$Conn=mysqli_connect($ServerName,$UserName,$Password,$Database);

if(!$Conn)
{
	die("Connection Failed:".mysqli_connect_error());
}

?>