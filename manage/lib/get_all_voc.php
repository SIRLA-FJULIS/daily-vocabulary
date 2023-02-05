<?php
	$DATABASE_HOST = 'localhost';
	$DATABASE_USER = 'root';
	$DATABASE_PASS = '';
	$DATABASE_NAME = 'daily-vocabulary';
    
	// Try and connect using the info above.
	$conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
	if ( mysqli_connect_errno() ) {
		// If there is an error with the connection, stop the script and display the error.
		exit( "Failed to connect to MySQL: ".mysqli_connect_error() );
	}

    $sql = "SELECT * FROM `vocabulary`";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo $row["voc_eng"] . ",". $row["voc_chi"] . "," . $row["part_of_speech"] . "<br>";
        }
    }
    $conn->close();
?>
