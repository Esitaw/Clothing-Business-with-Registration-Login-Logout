<?php 
require_once '/Users/saman/OneDrive/Documents/WEBSITE/BusinessIdea/core/models.php'; 
require_once '/Users/saman/OneDrive/Documents/WEBSITE/BusinessIdea/core/dbConfig.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Manage Purchases</title>
	<link rel="stylesheet" href="styles.css">
	<style>
    table {
        width: 100%;
        margin-top: 50px;
        border-collapse: collapse;
    }
    th, td {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: center; 
    }
    th {
        background-color: #f2f2f2;
    }
    tr:hover {
        background-color: #f5f5f5;
    }
</style>

</head>
<body>
	<a href="/BusinessIdea/index.php">Return to home</a>

	<?php 
	$getDesignerByID = getDesignerByID($pdo, $_GET['designer_id']); 
	?>

	<h1>Username: <?php echo htmlspecialchars($getDesignerByID['username']); ?></h1>

	<h1>Add New Purchase from Customer</h1>

	<form action="/BusinessIdea/core/handleForms.php?designer_id=<?php echo htmlspecialchars($_GET['designer_id']); ?>" method="POST">
    <p>
        <label for="customerName">Customer Name</label>
        <input type="text" name="customer_name" required>
    </p>
    <p>
        <label for="itemName">Item Name</label>
        <input type="text" name="item_name" required>
    </p>
    <p>
        <label for="price">Price</label>
        <input type="text" name="price" required>
        <input type="hidden" name="designer_id" value="<?php echo htmlspecialchars($_GET['designer_id']); ?>">
        <input type="submit" name="insertNewPurchaseBtn" value="Add Purchase">
    </p>
</form>


	<table style="width:100%; margin-top: 50px; text-align: center;">
	  <thead>
	    <tr>
	      <th>Purchase ID</th>
	      <th>Item Name</th>
	      <th>Price</th>
	      <th>Designer</th>
	      <th>Date Added</th>
	      <th>Action</th>
	    </tr>
	  </thead>
	  <tbody>
	  <?php 

	  $getPurchasesFromDesigner = getPurchasesFromDesigner($pdo, $_GET['designer_id']); 
	  foreach ($getPurchasesFromDesigner as $row) { 
	  ?>
	  <tr>
	  	<td><?php echo htmlspecialchars($row['purchase_id']); ?></td>	  	
	  	<td><?php echo htmlspecialchars($row['item_name']); ?></td>	  	
	  	<td><?php echo htmlspecialchars($row['price']); ?></td>	  	
	  	<td><?php echo htmlspecialchars($getDesignerByID['username']); ?></td> 
	  	<td><?php echo htmlspecialchars($row['date_added']); ?></td>
	  	<td>
	  		<a href="editpurchases.php?purchase_id=<?php echo $row['purchase_id']; ?>&designer_id=<?php echo htmlspecialchars($_GET['designer_id']); ?>">Edit</a>
	  		<a href="deletepurchases.php?purchase_id=<?php echo $row['purchase_id']; ?>&designer_id=<?php echo htmlspecialchars($_GET['designer_id']); ?>">Delete</a>
	  	</td>	  	
	  </tr>
	  <?php } ?>
	  </tbody>
	</table>

</body>
</html>