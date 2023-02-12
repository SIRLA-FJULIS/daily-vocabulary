<?php
	// Set your connection variables.
	$DATABASE_HOST = 'localhost';
	$DATABASE_USER = 'root';
	$DATABASE_PASS = '';
	$DATABASE_NAME = 'daily-vocabulary';
    
	// Try and connect using the info above.
	$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
	if ( mysqli_connect_errno() ) {
		// If there is an error with the connection, stop the script and display the error.
		exit( "Failed to connect to MySQL: ".mysqli_connect_error() );
	}

	// Taking all values from the form data (input)
	$voc_eng = $_REQUEST['voc_eng'];
	$voc_chi = $_REQUEST['voc_chi'];
	$part_of_speech = $_REQUEST['part_of_speech'];


	// We are going to insert the data into our vocabulary table
        $sql = "INSERT INTO vocabulary VALUES ('$voc_eng', '$voc_chi', '$part_of_speech')";

	// Check if the query is successful
        if(mysqli_query($con, $sql)){
			echo "<script>
				window.alert('單字[  $voc_eng  $voc_chi  $part_of_speech  ]新增完成');
				window.location.href = ' ./dashboard.php' 
				</script>";
	} else {
        	echo "ERROR: Hush! Sorry $sql. " . mysqli_error($con);
        }

	// Close connection
        mysqli_close($con);
?>
