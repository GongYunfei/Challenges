<?php



	if(!session_start()) {
		// If the session couldn't start, present an error
		header("Location: error.php");
		exit;
	}
	
	
	// Check to see if the user has already logged in
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
	
	if ($loggedIn) {
 
	}
      else
      {
          echo "<script>alert('Please login!');window.location.href='login.php';</script>";
          exit;
      }
    
	
	
?>
