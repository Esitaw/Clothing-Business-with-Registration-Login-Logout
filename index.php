<?php require_once '/Users/saman/OneDrive/Documents/WEBSITE/BusinessIdea/core/dbConfig.php'; ?>
<?php require_once '/Users/saman/OneDrive/Documents/WEBSITE/BusinessIdea/core/models.php'; ?>

<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); 
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothing Line Management System</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            position: relative; 
        }
        
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }

        form {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        form p {
            margin: 10px 0;
        }

        form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        form input[type="text"],
        form input[type="date"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }

        form input[type="submit"]:hover {
            background-color: #45a049;
        }

        .container {
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 15px;
            margin-bottom: 20px;
        }

        .container h3 {
            margin: 5px 0;
        }

        .editAndDelete {
            float: right;
        }

        .editAndDelete a {
            margin-left: 10px;
            text-decoration: none;
            color: #4CAF50;
        }

        .editAndDelete a:hover {
            text-decoration: underline;
        }

        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }

        .logout-container {
            bottom: 20px; 
            right: 20px; 
        }

        .logout-button {
            background-color: #4CAF50; 
            border-radius: 4px; 
        }

        .logout-button:hover {
            background-color: #45a049; 
        }
    </style>
</head>
<body>
    <h1>Welcome To Clothing Line Management System. Add New Purchases from Customers!</h1>
    
    <form action="/BusinessIdea/core/handleForms.php" method="POST">
        <p>
            <label for="username">Username</label> 
            <input type="text" name="username" required>
        </p>
        <p>
            <label for="first_name">First Name</label> 
            <input type="text" name="first_name" required>
        </p>
        <p>
            <label for="last_name">Last Name</label> 
            <input type="text" name="last_name" required>
        </p>
        <p>
            <label for="date_of_birth">Date of Birth</label> 
            <input type="date" name="date_of_birth" required>
        </p>
        <p>
            <label for="department">Department</label> 
            <input type="text" name="department" required>
        </p>
        <input type="submit" name="insertDesignerBtn" value="Add Designer">
    </form>

    <?php $getAllDesigner = getAllDesigner($pdo); ?>
    <?php foreach ($getAllDesigner as $row) { ?>
    <div class="container clearfix">
        <h3>Username: <?php echo htmlspecialchars($row['username']); ?></h3>
        <h3>First Name: <?php echo htmlspecialchars($row['first_name']); ?></h3>
        <h3>Last Name: <?php echo htmlspecialchars($row['last_name']); ?></h3>
        <h3>Date Of Birth: <?php echo htmlspecialchars($row['date_of_birth']); ?></h3>
        <h3>Department: <?php echo htmlspecialchars($row['department']); ?></h3>
        <h3>Date Added: <?php echo htmlspecialchars($row['date_added']); ?></h3>

        <div class="editAndDelete">
            <a href="viewpurchases.php?designer_id=<?php echo $row['designer_id']; ?>">View User</a>
            <a href="editdesigners.php?designer_id=<?php echo $row['designer_id']; ?>">Edit</a>
            <a href="deletedesigners.php?designer_id=<?php echo $row['designer_id']; ?>">Delete</a>
        </div>
    </div> 
    <?php } ?>

    
    <div class="logout-container">
        <form action="logout.php" method="POST">
            <input type="submit" class="logout-button" name="logoutBtn" value="Logout">
        </form>
    </div>
</body>
</html>
