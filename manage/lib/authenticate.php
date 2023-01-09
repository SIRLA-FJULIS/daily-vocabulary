<?php
	include('connection.php');
	session_start();

	// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
	$sql = "SELECT id, password FROM accounts WHERE username = ?";
	
	if ($stmt = $con->prepare($sql)) {

		// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
		$stmt->bind_param('s', $_POST['username']);
		$stmt->execute();

		// Store the result so we can check if the account exists in the database.
		$stmt->store_result();

		if ($stmt->num_rows > 0) {
			$stmt->bind_result($id, $password);
			$stmt->fetch();

			// Account exists, now we verify the password.
			// Note: remember to use password_hash in your registration file to store the hashed passwords.
			if (password_verify($_POST['password'], $password)) {
				
				// Verification success! User has logged-in!
				// Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
				session_regenerate_id();
				$_SESSION['loggedin'] = TRUE;
				$_SESSION['name'] = $_POST['username'];
				$_SESSION['id'] = $id;

				header('Location: ../dashboard.html');
			} else {
				echo 'Incorrect username and/or password!';
			}
		} else {
			echo 'Incorrect username and/or password!';
		}

		$stmt->close();
	}
?>