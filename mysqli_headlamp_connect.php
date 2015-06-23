<?php
DEFINE ('DB_USER', 'web');
DEFINE ('DB_PASSWORD', 'zsxdcf');
DEFINE ('DB_HOST', '76.74.170.191');
DEFINE ('DB_NAME', 'vehicles');

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL ' .
	mysqli_connect_error());;

?>
