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
	<h1>Are you sure you want to delete this user?</h1>
	<?php $getDesignerByID = getDesignerByID($pdo, $_GET['designer_id']); ?>
	<div class="container" style="border-style: solid; height: 400px;">
		<h2>Username: <?php echo $getDesignerByID['username']; ?></h2>
		<h2>FirstName: <?php echo $getDesignerByID['first_name']; ?></h2>
		<h2>LastName: <?php echo $getDesignerByID['last_name']; ?></h2>
		<h2>Date Of Birth: <?php echo $getDesignerByID['date_of_birth']; ?></h2>
		<h2>Department: <?php echo $getDesignerByID['department']; ?></h2>
		<h2>Date Added: <?php echo $getDesignerByID['date_added']; ?></h2>

		<div class="deleteBtn" style="float: right; margin-right: 10px;">
			<form action="/BusinessIdea/core/handleForms.php?designer_id=<?php echo $_GET['designer_id']; ?>" method="POST">
				<input type="submit" name="deleteDesignerBtn" value="Delete">
			</form>			
		</div>	

	</div>
</body>
</html>
