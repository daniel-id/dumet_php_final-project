<?php 
global $connect;

$dbhost		= "localhost";
$dbuser		= "root";
$dbpass		= "";
$dbname		= "dumet_final";

$connect	= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

/** CEK KONEKSI **/
if(!$connect) {
    die("Connection failed: ".mysqli_connect_error());
}
?>