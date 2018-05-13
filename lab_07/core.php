<?php
	include 'config.php';
	include 'basket.php';
	include 'products.php';
	
	function Clear(){
		global $basket;
		global $connDB;

		if(!empty($basket)) {
			foreach($basket as $name){
				$stmt = $connDB->prepare("UPDATE PRODUCTS SET Availability = Availability + 1 WHERE Name = ?");
				$stmt->bind_param("s", $name);
				$stmt->execute();	
			}
			$connDB->commit();
		}
		$basket = array();
		$_SESSION['MESSAGE'] = null;
	}

	function Buy(){
		global $basket;
		global $connDB;
		
		$connDB->begin_transaction();
		$connDB->query("LOCK TABLES PRODUCTS WRITE");	//In MySql no lock on rows
		
		if(!empty($basket)){
			Clear();
			$_SESSION['MESSAGE'] = "Purchase made!!!";
		}else{
			$_SESSION['MESSAGE'] = "Basket is empty!!!";
		}
	}


	if ($_SERVER["REQUEST_METHOD"] === "POST"){
		//$action = SafeString($_POST['ACTION']) //TODO
		if(isset($_POST['BUY'])){
			Buy();
			$_SESSION['CARD'] = $basket;
			header('Location: index.php');
			exit();
		}
		else if(isset($_POST['CLEAR'])){
			Clear();
			$_SESSION['CARD'] = $basket;
			header('Location: index.php');
			exit();
		}
		else if(isset($_POST['TOBASKET'])){
			AddToBasket($_POST['TOBASKET']);
			$_SESSION['CARD'] = $basket;
			header('Location: index.php');
			exit();
		}
		else {
			$_SESSION['MESSAGE'] = "Security issue!!!!"; //TODO
			exit();
		}
	}
?>