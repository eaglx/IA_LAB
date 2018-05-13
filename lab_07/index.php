<!DOCTYPE html>

<?php include 'core.php';?>

<head>
	<title>SHOP</title>
	<meta charset="UTF-8"></meta>
</head>
<body>
	<table>
		<tr>
			<td style="padding: 15px;">
				<div style="border-style: solid; text-align: left; list-style-position: inside; margin-top: 10px;">
					PRODUCTS:<br>
					<form method=POST action="core.php">
						<ul style="list-style-type: none;"><?php ShowProducts(); ?>	</ul>
					</form>
				</div>
			</td>
			<td style="padding: 15px;">	
				<div style="border-style: solid; text-align: left; list-style-position: inside; margin-top: 10px;">
					<br>BASKET:
					<ul">
						<?php ShowBasket(); ?>
					</ul>
					<form method=POST action="core.php">
						<br>SUMMARY: <?php SummaryBasket(); ?> <br>
						<button type="submit" name="BUY">BUY</button>
						<button type="submit" name="CLEAR">CANCEL</button>
					</form>
				</div>
			</td>
		</tr>
	</table>
</body>