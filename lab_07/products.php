<?php
	function ShowProducts(){
		global $connDB;

		$result = $connDB->query("SELECT * FROM PRODUCTS");
		foreach($result as $res){
			ShowProduct($res);
		}
	}

	function ShowProduct($product){
		echo "<li><table><tr><td style=\"padding: 10px;\">Name: ".$product['Name'].",</td> <td style=\"padding: 10px;\">Price: ".$product['Price'].",	Availability: ".$product['Availability']."</td>	<td style=\"padding: 10px;\"><button type=\"submit\" name=\"TOBASKET\" value=\"".$product['Name']."\" >ADD</button></td></tr></table></li>";
	}
?>