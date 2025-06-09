<?php 
    include_once '../Config/DB.php';
    $conn = new DB();
    $conn = $conn->getConnection();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $job_detail = $_POST['job_detail'] ?? "";
        $job_remark = $_POST['job_remark'] ?? "";
        $job_by = $_POST['job_by'] ?? "";

        if (isset($job_detail, $job_remark, $job_by)) {
            $job_detail = strip_tags($job_detail);
            $job_remark = strip_tags($job_remark);
            $job_by = strip_tags($job_by);

            $sql = "INSERT INTO tbl_job(job_detail, job_remark, job_by)
                    VALUES (:job_detail, :job_remark, :job_by)";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute([
                ':job_detail' => $job_detail,
                ':job_remark' => $job_remark,
                ':job_by' => $job_by
            ]); 

            if ($result) {
                echo json_encode(['message' => 'Add successful']);
            } else {
                echo json_encode(['message' => 'Fail to add']);
            }
        }
    } else {
        http_response_code(405);
        echo json_encode(['message' => 'Method Not Allowed']);
    }
?>