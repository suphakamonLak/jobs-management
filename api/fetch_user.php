<?php 
    include_once '../Config/DB.php';
    $conn = new DB();
    $conn = $conn->getConnection();

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $data = [];// using result each row
        $sql = "SELECT id, job_detail, job_remark, job_by,
        DATE_FORMAT(date_save, '%d/%m/%Y') as date_save FROM tbl_job";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {// อ่านข้อมูลในลูปแบบ associative array
            $row['action'] = 
            '<button class="btn btn-primary btn-sm btn-edit me-2" data-id="' . $row['id'] . '">Edit</button>'.
            '<button class="btn btn-danger btn-delete btn-sm" data-id="' . $row['id'] . '">Delete</button>'
            ;

            $data[] = $row;
        }

        echo json_encode(['data' => $data]);// แปลงข้อมูลเป็น json
    } else {
        http_response_code(405);
        echo json_encode(['message' => 'Method Not Allowed']);
    }
?>