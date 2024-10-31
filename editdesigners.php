<?php require_once '/Users/saman/OneDrive/Documents/WEBSITE/BusinessIdea/core/handleForms.php'; ?>
<?php require_once '/Users/saman/OneDrive/Documents/WEBSITE/BusinessIdea/core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<?php $getDesignerByID = getDesignerByID($pdo, $_GET['designer_id']); ?>
	<h1>Edit the user!</h1>
	<form action="/BusinessIdea/core/handleForms.php?designer_id=<?php echo $_GET['designer_id']; ?>" method="POST">
    	<p>
        	<label for="first_name">First Name</label> 
        	<input type="text" name="first_name" value="<?php echo $getDesignerByID['first_name']; ?>">
    	</p>
    	<p>
        	<label for="last_name">Last Name</label> 
        	<input type="text" name="last_name" value="<?php echo $getDesignerByID['last_name']; ?>">
    	</p>
    	<p>
        	<label for="date_of_birth">Date of Birth</label> 
        	<input type="date" name="date_of_birth" value="<?php echo $getDesignerByID['date_of_birth']; ?>">
    	</p>
    	<p>
        	<label for="department">Department</label> 
        	<input type="text" name="department" value="<?php echo $getDesignerByID['department']; ?>">
    	</p>
    	<p>
        	<input type="submit" name="editDesignerBtn" value="Update Designer">
    </p>
</form>

</body>
</html>
