<?php




	if(!session_start()) {
		// If the session couldn't start, present an error
		header("Location: error.php");
		exit;
	}
	
	
	// Check to see if the user has already logged in
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
	
	if ($loggedIn) {
     header("Location: index.php");
		exit;
	}
	
	
	$action = empty($_POST['action']) ? '' : $_POST['action'];
	
	if ($action == 'do_login') {
		handle_login();
	} else {
		login_form();
	}
	
	function handle_login() {
		include("conn/conn.php");
		
		$username = empty($_POST['username']) ? '' : $_POST['username'];
		$password = empty($_POST['password']) ? '' : $_POST['password'];
        $result = false;
        if (($username!="")&&($password!="")){
	    $query=mysqli_query($conn, "select tb_forum_user from tb_forum_user where tb_forum_user='$username' AND tb_forum_truepass='$password'");
        $result=mysqli_fetch_array($query);
        }
		if ($result!=false) {
			// Instead of setting a cookie, we'll set a key/value pair in $_SESSION
			$_SESSION['loggedin'] = $username;
            echo "<script>alert('Welcome you to our studyHub world!');window.location.href='index.php';</script>";
            exit;
		} else {
			$error = 'Error: Incorrect username or password';
			require "login_form.php";
		}		
	}
	
	function login_form() {
		$username = "";
		$error = "";
		require "login_form.php";
	}
	
	
?>
