<?php 
    include_once '../Config/DB.php';
    $conn = new DB();
    $conn = $conn->getConnection();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'] ?? "";
        $job_detail = $_POST['job_detail'] ?? "";
        $job_remark = $_POST['job_remark'] ?? "";
        $job_by = $_POST['job_by'] ?? "";

        if (isset($id, $job_detail, $job_remark, $job_by)) {
            $id = strip_tags($id);
            $job_detail = strip_tags($job_detail);
            $job_remark = strip_tags($job_remark);
            $job_by = strip_tags($job_by);

            $sql = "UPDATE tbl_job
                    SET job_detail = :job_detail, job_remark = :job_remark, job_by = :job_by
                    WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute([
                ':job_detail' => $job_detail,
                ':job_remark' => $job_remark,
                ':job_by' => $job_by,
                ':id' => $id,
            ]);

            if ($result) {
                echo json_encode(['message' => 'Update successful']);
            } else {
                echo json_encode(['message' => 'Fail to updated']);
            }
        }
    } else {
        http_response_code(405);
        echo json_encode(['message' => 'Method Not Allowed']);
        exit;
    }
?>