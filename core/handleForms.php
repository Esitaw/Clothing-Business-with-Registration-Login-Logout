<?php 
require_once 'dbConfig.php'; 
require_once 'models.php';

// Start the session for user authentication
session_start();

if (isset($_POST['registerBtn'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); 
    
    $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
    $stmt->execute(['username' => $username, 'password' => $password]);
    
    echo "<h3>Registration successful!</h3>";
    echo '<a href="/BusinessIdea/login.php"><button>Go to Login</button></a>';
    exit(); 
}


if (isset($_POST['loginBtn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();
    
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        header("Location: ../index.php");
        exit(); 
    } else {
        echo "Invalid credentials!";
    }
}


if (isset($_POST['insertDesignerBtn'])) {
    
    if (!isset($_SESSION['username'])) {
        echo "You must be logged in to add a designer.";
        exit();
    }
    
    $query = insertDesigner($pdo, $_POST['username'], $_POST['first_name'], 
        $_POST['last_name'], $_POST['date_of_birth'], $_POST['department']);

    if ($query) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Insertion failed";
    }
}


if (isset($_POST['editDesignerBtn'])) {
    if (!isset($_SESSION['username'])) {
        echo "You must be logged in to edit a designer.";
        exit();
    }
    
    $query = updateDesigner($pdo, $_POST['first_name'], $_POST['last_name'], 
        $_POST['date_of_birth'], $_POST['department'], $_GET['designer_id']);
    
    if ($query) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Update failed";
    }
}


if (isset($_POST['deleteDesignerBtn'])) {
    if (!isset($_SESSION['username'])) {
        echo "You must be logged in to delete a designer.";
        exit();
    }
    
    $query = deleteDesigner($pdo, $_GET['designer_id']);

    if ($query) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Deletion failed";
    }
}


if (isset($_POST['insertNewPurchaseBtn'])) {
    if (!isset($_SESSION['username'])) {
        echo "You must be logged in to add a purchase.";
        exit();
    }
    
    $designer_id = $_POST['designer_id']; 
    
    $stmt = $pdo->prepare("SELECT designer_id FROM designers WHERE username = :username");
    $stmt->execute(['username' => $_SESSION['username']]);
    $added_by = $stmt->fetchColumn(); 

    if ($added_by) {
        $query = insertPurchase($pdo, $_POST['customer_name'], $_POST['item_name'], $_POST['price'], $designer_id, $added_by);

        if ($query) {
            header("Location: ../viewpurchases.php?designer_id=" . htmlspecialchars($designer_id));
            exit();
        } else {
            echo "Insertion failed";
        }
    } else {
        echo "Unable to find designer ID for the logged-in user.";
    }
}



if (isset($_POST['editPurchaseBtn'])) {
    if (!isset($_SESSION['username'])) {
        echo "You must be logged in to edit a purchase.";
        exit();
    }
    
    $query = updatePurchase($pdo, $_POST['item_name'], $_POST['price'], $_GET['purchase_id']);

    if ($query) {
        header("Location: ../viewpurchases.php?designer_id=" . $_GET['designer_id']);
        exit();
    } else {
        echo "Update failed";
    }
}



if (isset($_POST['deletePurchaseBtn'])) {
    if (!isset($_SESSION['username'])) {
        echo "You must be logged in to delete a purchase.";
        exit();
    }
    
    $query = deletePurchase($pdo, $_GET['purchase_id']);

    if ($query) {
        header("Location: ../viewpurchases.php?designer_id=" . $_GET['designer_id']);
        exit();
    } else {
        echo "Deletion failed";
    }
}
?>
