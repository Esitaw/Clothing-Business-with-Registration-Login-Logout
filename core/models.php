<?php  

function insertDesigner($pdo, $username, $first_name, $last_name, 
	$date_of_birth, $department) {

	$sql = "INSERT INTO designers (username, first_name, last_name, 
		date_of_birth, department) VALUES(?,?,?,?,?)";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$username, $first_name, $last_name, 
		$date_of_birth, $department]);

	if ($executeQuery) {
		return true;
	}
}


function updateDesigner($pdo, $first_name, $last_name, $date_of_birth, $department, $designer_id) {
    $sql = "UPDATE designers
            SET first_name = ?,
                last_name = ?,
                date_of_birth = ?,
                department = ?
            WHERE designer_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$first_name, $last_name, $date_of_birth, $department, $designer_id]);
    
    if ($executeQuery) {
        return true;
    }
    return false; 
}



function deleteDesigner($pdo, $designer_id) {
	$deleteDesignerPurchase = "DELETE FROM purchases WHERE designer_id = ?";
	$deleteStmt = $pdo->prepare($deleteDesignerPurchase);
	$executeDeleteQuery = $deleteStmt->execute([$designer_id]);

	if ($executeDeleteQuery) {
		$sql = "DELETE FROM designers WHERE designer_id = ?";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$designer_id]);

		if ($executeQuery) {
			return true;
		}

	}
	
}


function getAllDesigner($pdo) {
	$sql = "SELECT * FROM designers";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();

	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}



function getDesignerByID($pdo, $designer_id) {
    $sql = "SELECT * FROM designers WHERE designer_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$designer_id]);

    if ($executeQuery) {
        return $stmt->fetch();
    }
}


function getPurchasesFromDesigner($pdo, $designer_id) {
    $sql = "SELECT 
                purchases.purchase_id AS purchase_id,
                purchases.item_name AS item_name,
                purchases.price AS price,
                purchases.date_of_purchase AS date_added,  
                CONCAT(designers.first_name, ' ', designers.last_name) AS designer_name
            FROM purchases
            JOIN designers ON purchases.designer_id = designers.designer_id
            WHERE purchases.designer_id = ? 
            GROUP BY purchases.item_name;";

    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$designer_id]);
    if ($executeQuery) {
        return $stmt->fetchAll();
    }
}



function insertPurchase($pdo, $customer_name, $item_name, $price, $designer_id, $added_by) {
    $sql = "INSERT INTO purchases (customer_name, item_name, price, designer_id, added_by) 
            VALUES (:customer_name, :item_name, :price, :designer_id, :added_by)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        'customer_name' => $customer_name,
        'item_name' => $item_name,
        'price' => $price,
        'designer_id' => $designer_id,
        'added_by' => $added_by,
    ]);
}


 


function getPurchaseByID($pdo, $purchase_id) {
	$sql = "SELECT 
				purchases.purchase_id AS purchase_id,
				purchases.customer_name AS customer_name,
				purchases.item_name AS item_name,
				purchases.price AS price,
				purchases.date_of_purchase AS date_of_purchase,
				CONCAT(designers.first_name, ' ', designers.last_name) AS designer_name
			FROM purchases
			JOIN designers ON purchases.designer_id = designers.designer_id
			WHERE purchases.purchase_id = ?";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$purchase_id]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
	return false;
}


function updatePurchase($pdo, $item_name, $price, $purchase_id) {
    $sql = "UPDATE purchases
            SET item_name = ?, price = ?
            WHERE purchase_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$item_name, $price, $purchase_id]);

    if ($executeQuery) {
        return true;
    }
    return false; 
}

function deletePurchase($pdo, $purchase_id) {
	$sql = "DELETE FROM purchases WHERE purchase_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$purchase_id]);
	if ($executeQuery) {
		return true;
	}
}


?>