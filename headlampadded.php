
<html>
<head>
<title>Add Headlamp</title>
</head>
<body>

<?php

if(isset($_POST['submit'])){
	$data_missing = array();

	if(empty($_POST['year'])){
		$data_missing[] = 'year';
	} else {
		$year = trim($_POST['year']);
	}


	if(empty($_POST['make'])){
		$data_missing[] = 'make';
	} else {
		$make = trim($_POST['make']);
	}


	if(empty($_POST['model'])){
		$data_missing[] = 'model';
	} else {
		$model = trim($_POST['model']);
	}


	if(empty($_POST['lowbeam'])){
		$data_missing[] = 'lowbeam';
	} else {
		$lowbeam = trim($_POST['lowbeam']);
	}


	if(empty($_POST['lbtech'])){
		$data_missing[] = 'lbtech';
	} else {
		$lbtech = trim($_POST['lbtech']);
	}


	if(empty($_POST['highbeam'])){
		$data_missing[] = 'highbeam';
	} else {
		$highbeam = trim($_POST['highbeam']);
	}


	if(empty($_POST['hbtech'])){
		$data_missing[] = 'hbtech';
	} else {
		$hbtech = trim($_POST['hbtech']);
	}


	function baseinsert ($stmt){
//		$stmt = mysqli_prepare($dbc, $query);
		global $year, $make, $model;

		mysqli_stmt_bind_param($stmt, "iss", $year, $make, $model);
		mysqli_stmt_execute($stmt);

		$affected_rows = mysqli_stmt_affected_rows($stmt);
		if($affected_rows == 1){
			echo 'Headlamp Entered';
			mysqli_stmt_close($stmt);
			mysqli_close($dbc);
		} else {
			echo 'Error Occurred <br/>';
			echo mysqli_error();
		
			mysqli_stmt_close($stmt);
			mysqli_close($dbc);
	
		}
	}			
	function versionsinsert($stmt){
		global $style, $lowbeam, $lbtech, $highbeam, $hbtech;
	
		mysqli_stmt_bind_param($stmt, "sssss", $style, $lowbeam, $lbtech, $highbeam, $hbtech);
		mysqli_stmt_execute($stmt);
	
		$affected_rows = mysqli_stmt_affected_rows($stmt);
		if($affected_rows == 1){
			echo 'Headlamp Entered';
			mysqli_stmt_close($stmt);
			mysqli_close($dbc);
		} else {
			echo 'Error Occurred <br/>';
			echo mysqli_error();
		
			mysqli_stmt_close($stmt);
			mysqli_close($dbc);
		
		}
	}

/*
	if(empty($data_missing)){

		require_once('./mysqli_headlamp_connect.php');
		$query = "INSERT INTO base (vehicle_id,year, make, model) VALUES (NULL, ?, ?,?)";
		$stmt = mysqli_prepare($dbc, $query);

		mysqli_stmt_bind_param($stmt, "iss", $year, $make, $model);
		mysqli_stmt_execute($stmt);

		$affected_rows = mysqli_stmt_affected_rows($stmt);
		if($affected_rows == 1){
			echo 'Headlamp Entered';
			mysqli_stmt_close($stmt);
			mysqli_close($dbc);
		} else {
			echo 'Error Occurred <br/>';
			echo mysqli_error();
			
			mysqli_stmt_close($stmt);
			mysqli_close($dbc);
	
		}
	}
*/

	if(empty($data_missing)){		

		require_once('./mysqli_headlamp_connect.php');
		$query = "INSERT INTO base (vehicle_id,year, make, model) VALUES (NULL, ?, ?,?)";
		$stmt = mysqli_prepare($dbc, $query);	
		baseinsert($stmt);


		$query = "INSERT INTO versions (version_id, style, lowbeam, lbtech, highbeam, hbtech, vehicle_id) VALUES (NULL, ?, ?,?,?, ?, LAST_INSERT_ID())";
		$stmt = mysqli_prepare($dbc, $query);	
		versionsinsert($stmt);	

	} else {
		echo 'You need to enter the following data <br />';
		foreach($data_missing as $missing){
			echo "$missing<br />";
		}

	}

}

?>

<form action = "http://76.74.170.191/headlampadded.php" method = "post">
	<b>Add a New Headlamp</b>

	<p>Year:
	<input type = "text" name="year" size="30" value="" />
	</p>


	<p>Make:
	<input type = "text" name="make" size="30" value="" />
	</p>

	<p>Model:
	<input type = "text" name="model" size="30" value="" />
	</p>


	<p>Style:
	<input type = "text" name="style" size="30" value="" />
	</p>

	<p>Low Beam:
	<input type = "text" name="lowbeam" size="30" value="" />
	</p>

	<p>Low Beam Technology:
	<input type = "text" name="lbtech" size="30" value="" />
	</p>

	<p>High Beam:
	<input type = "text" name="highbeam" size="30" value="" />
	</p>

	<p>High Beam Technology:
	<input type = "text" name="hbtech" size="30" value="" />
	</p>

	<p>
		<input type = "submit" name="submit" value="Send" />
	</p>

</form>
</body>
</html>
