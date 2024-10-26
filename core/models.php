
<?php 
    //Category Table Crud
    function insertCategory ($pdo, $category_name, $description) {

        $sql = "INSERT INTO Category (category_name, description) VALUES (?,?)";

        $stmt = $pdo->prepare($sql);
        $executeQuery = $stmt->execute([$category_name, $description]);

        if ($executeQuery) {
            return true;
        }
    }

    function updateCategory ($pdo, $category_name, $description, $category_id) {

        $sql = "UPDATE Category
				SET category_name = ?,
					description = ?
				WHERE category_id = ?
			";
        $stmt = $pdo->prepare($sql);
        $executeQuery = $stmt->execute([$category_name, $description, $category_id]);

        if ($executeQuery) {
            return true;
        }
    }

    function deleteCategory($pdo, $category_id) {
        $deleteCategoryproduct = "DELETE FROM Category WHERE category_id = ?";
        $deleteStmt = $pdo->prepare($deleteCategoryproduct);
        $executeDeleteQuery = $deleteStmt->execute([$category_id]);
    
        if ($executeDeleteQuery) {
            $sql = "DELETE FROM Category WHERE category_id = ?";
            $stmt = $pdo->prepare($sql);
            $executeQuery = $stmt->execute([$category_id]);
    
            if ($executeQuery) {
                return true;
            }
    
        }
        
    }

    function getAllCatgory($pdo) {
        $sql = "SELECT * FROM category";
        $stmt = $pdo->prepare($sql);
        $executeQuery = $stmt->execute();
    
        if ($executeQuery) {
            return $stmt->fetchAll();
        }
    }
    
    function getWebDevByID($pdo, $category_id) {
        $sql = "SELECT * FROM Category WHERE category_id = ?";
        $stmt = $pdo->prepare($sql);
        $executeQuery = $stmt->execute([$category_id]);
    
        if ($executeQuery) {
            return $stmt->fetch();
        }
    }

    //Products Table CRUD
    function insertProducts($pdo, $product_name, $price, $stock, 
	$category_id) {

	$sql = "INSERT INTO Products (product_name, price, stock, 
		category_id) VALUES(?,?,?,?)";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$product_name, $price, $stock, 
		$category_id]);

	if ($executeQuery) {
		return true;
	}
}
?>

