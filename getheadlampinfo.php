<?php

echo "Hello World!<br />";


require_once('./mysqli_headlamp_connect.php');



$query = "SELECT year, make, model, style, lowbeam, lbtech, highbeam, hbtech FROM base, versions 
WHERE base.vehicle_id = versions.vehicle_id";
//$query = "SELECT year, make, model
//FROM base";


$response = @mysqli_query($dbc, $query);

if($response){

	echo '<table align = "left"
	cellspacing="5" cellpadding="8">

	<tr><td align = "left"><b>Year</b></td>
	<td align = "left"><b>Make</b></td>
	<td align = "left"><b>Model</b></td>
	<td align = "left"><b>Style</b></td>
	<td align = "left"><b>Low Beam</b></td>
	<td align = "left"><b>Low Beam Tech</b></td>
	<td align = "left"><b>High Beam</b></td>
	<td align = "left"><b>High Beam Tech</b></td></tr>';

	while($row = mysqli_fetch_array($response)){
		echo '<tr><td align = "left">' .
		$row['year'] . '</td><td align="left">' .
		$row['make'] . '</td><td align="left">' .
		$row['model'] . '</td><td align="left">' .
		$row['style'] . '</td><td align="left">' .
		$row['lowbeam'] . '</td><td align="left">' .
		$row['lbtech'] . '</td><td align="left">' .
		$row['highbeam'] . '</td><td align="left">' .
		$row['hbtech'] . '</td><td align="left">';


		echo '</tr>';
	}

	echo '</table>';

}else{
	echo "Couldn't issue database query<br />";
	echo mysqli_error($dbc);

}


mysqli_close($dbc);

?>
