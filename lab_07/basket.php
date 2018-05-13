<?php
	function ShowBasket(){
		global $basket;
		
		foreach ($basket as $b){
			echo "<li>$b</li>";
		} 
	}

	function SummaryBasket(){
		global $connDB;
		global $basket;
		$summary = 0;
		$result = $connDB->query("SELECT * FROM PRODUCTS");

		foreach ($result as $res) {
			foreach ($basket as $val) {
				if ($res['Name'] == $val){
					$summary += $res['Price'];
				}
			}
		}

		echo $summary;
	}

	function AddToBasket($product){
		global $basket;
		global $connDB;

		$connDB->begin_transaction();
		$connDB->query("LOCK TABLES PRODUCTS WRITE");	//In MySql no lock on rows

		$sql_ask = "SELECT Availability FROM PRODUCTS WHERE Name = '$product'";
		$result  = $connDB->query($sql_ask);
		$row = $result->fetch_assoc();
		
		if($row['Availability'] <= 0){
			$_SESSION['MESSAGE'] = "Lack of product: $product";
		}
		else {
			$basket[] = $product;
			$_SESSION['MESSAGE'] = null;
			$stmt = $connDB->prepare("UPDATE PRODUCTS SET Availability = Availability - 1 WHERE Name = ?");
			$stmt->bind_param("s", $product);
			$stmt->execute();		
			$connDB->commit();
		}
	}
?>