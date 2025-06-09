<?php 
    include_once '../Config/DB.php';
    $conn = new DB();
    $conn = $conn->getConnection();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = strip_tags($_POST['id']);
        $sql = "DELETE FROM tbl_job WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([':id' => $id]);
        
        if ($result) {
            echo json_encode(['message' => 'Delete successful']);
        } else {
            echo json_encode(['message' => 'Fail to delete!']);
        }
    } else {
        http_response_code(405);
        echo json_encode(['message' => 'Method Not Allowed']);
    }
?>