<?php	
	// DB connection
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "lab_7";

	session_start();

	$connDB = new mysqli($servername, $username, $password, $dbname);
	if($connDB->connect_error) {
		die("______Connection failed: $connDB->connect_error !!!!!!!!!!!!!!!!!!!!!!");
	}

	// SESSION FOR CARD
	if(!isset($_SESSION['CARD'])){
		$basket = array();
	}else{
		$basket = $_SESSION['CARD'];
	}

	// MESSAGE on site
	if(isset($_SESSION['MESSAGE'])){
		$message = $_SESSION['MESSAGE'];
		echo "<script type='text/javascript'>alert('$message');</script>";
	}

	// OPERATE WITH REQUESTS ### TODO
	function SafeString($string) {
		$result = preg_replace("/[^a-zA-Z0-9]+/", " ", $string);
		return $result;
	}
?>