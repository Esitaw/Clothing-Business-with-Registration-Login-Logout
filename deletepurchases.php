<?php require_once '/Users/saman/OneDrive/Documents/WEBSITE/BusinessIdea/core/dbConfig.php'; ?>
<?php require_once '/Users/saman/OneDrive/Documents/WEBSITE/BusinessIdea/core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Delete Purchase</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<?php 
	$getPurchaseByID = getPurchaseByID($pdo, $_GET['purchase_id']); 

	if ($getPurchaseByID) { 
	?>
	<h1>Are you sure you want to delete this purchase?</h1>
	<div class="container" style="border-style: solid; height: 200px;">
		<h2>Purchase Name: <?php echo htmlspecialchars($getPurchaseByID['item_name']); ?></h2>
		<h2>Price: <?php echo htmlspecialchars($getPurchaseByID['price']); ?></h2>
		<h2>Designer: <?php echo htmlspecialchars($getPurchaseByID['designer_name']); ?></h2>
		<h2>Date Added: <?php echo htmlspecialchars($getPurchaseByID['date_of_purchase']); ?></h2>

		<div class="deleteBtn" style="float: right; margin-right: 10px;">
			<form action="/BusinessIdea/core/handleForms.php?purchase_id=<?php echo $_GET['purchase_id']; ?>&designer_id=<?php echo $_GET['designer_id']; ?>" method="POST">
				<input type="submit" name="deletePurchaseBtn" value="Delete">
			</form>			
		</div>	
	</div>
	<?php 
	} else {
		echo "<h2>Purchase not found.</h2>";
	}
	?>
</body>
</html>
