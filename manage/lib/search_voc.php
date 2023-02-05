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
	$keyword_search = $_REQUEST['keyword_search'];

	// We are going to insert the data into our vocabulary table
	$sql = 'SELECT * FROM `vocabulary` WHERE voc_eng LIKE "%' . $keyword_search . '%" OR voc_chi LIKE "%' . $keyword_search . '%";';
	$result = mysqli_query($con, $sql) or die("Bad query: $sql");

	echo "<table border='1'>";
	echo "<tr><td>英文單字</td><td>中文翻譯</td><td>單字詞性</td></tr>";
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<tr><td>{$row["voc_eng"]}</td><td>{$row["voc_chi"]}</td><td>{$row["part_of_speech"]}</td></tr>\n";
        }
	echo "</table>";


/*	// Check if the query is successful
	if ($result->num_rows > 0) {
		echo "英文單字、中文翻譯、單字詞性";
		// output data of each row
		while ($row = $result->fetch_assoc()) {
			echo $row["voc_eng"] . "\t". $row["voc_chi"] . "\t" . $row["part_of_speech"];
		}
	} else {
		echo "0 results";
	}
*/

	// Close connection
        mysqli_close($con);
?>
