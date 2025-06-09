<?php 
    include_once '../Config/DB.php';
    $conn = new DB();
    $conn = $conn->getConnection();

    if (isset($_POST['id'])) {
        $id = strip_tags($_POST['id']);
        $sql = "SELECT * FROM tbl_job WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([$id]);

        if ($result) {
            echo json_encode($stmt->fetch(PDO::FETCH_ASSOC));
        } else {
            echo json_encode(['error' => 'User not found']);
        }
    } else {
        echo json_encode(['error' => 'ID not provided']);
    }
?>