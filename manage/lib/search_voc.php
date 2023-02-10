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

	$keyword_search = $_POST['keyword_search'];
	// We are going to insert the data into our vocabulary table
	$sql = 'SELECT * FROM `vocabulary` WHERE voc_eng LIKE "%' . $keyword_search . '%" OR voc_chi LIKE "%' . $keyword_search . '%";';
	$result = mysqli_query($con, $sql);

	if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo $row["voc_eng"] . ",". $row["voc_chi"] . "," . $row["part_of_speech"] . "<br>";
        }
    }
	// Close connection
        mysqli_close($con);
?>
