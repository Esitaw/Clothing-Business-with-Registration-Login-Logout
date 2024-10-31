<?php require_once '/Users/saman/OneDrive/Documents/WEBSITE/BusinessIdea/core/models.php'; ?>
<?php require_once '/Users/saman/OneDrive/Documents/WEBSITE/BusinessIdea/core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<a href="viewpurchases.php?designer_id=<?php echo $_GET['designer_id']; ?>">
	View The Purchases</a>
	<h1>Edit the purchase!</h1>
	<?php $getPurchaseByID = getPurchaseByID($pdo, $_GET['purchase_id']); ?>
	<form action="/BusinessIdea/core/handleForms.php?purchase_id=<?php echo $_GET['purchase_id']; ?>
	&designer_id=<?php echo $_GET['designer_id']; ?>" method="POST">
		<p>
			<label for="itemName">Item Name</label> 
			<input type="text" name="item_name" 
			value="<?php echo $getPurchaseByID['item_name']; ?>">
		</p>
		<p>
			<label for="price">Price</label> 
    		<input type="text" name="price" value="<?php echo $getPurchaseByID['price']; ?>">
    		<input type="submit" name="editPurchaseBtn" value="Update Purchase">
		</p>
	</form>
</body>
</html>
