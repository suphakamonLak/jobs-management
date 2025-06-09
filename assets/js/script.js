$(document).ready(function () {
    // Initialize DataTable (Create Data Table and Load data)
    const table = $('#users_table').DataTable({
        ajax: 'api/fetch_user.php',// ดึงข้อมูลจากไฟล์ json
        columns: [// กำหนดคอลัมน์ให้ตรงกับ key ใน json
            { data: 'id' },
            { data: 'job_detail' },
            { data: 'job_remark' },
            { data: 'job_by'},
            { data: 'date_save' },
            { data: 'action' }
        ]
    });

    // open modal and load user data (เมื่อคลิกปุ่มที่มีคลาส btn-edit)
    $(document).on('click', '.btn-edit', function() {
        const id = $(this).data('id'); 
        $.post('api/get_user.php', { id: id }, function (data) {
            const user = JSON.parse(data);// change type json into obj
            // filled form
            $('#edit-id').val(user.id);
            $('#edit-job_detail').val(user.job_detail);
            $('#edit-job_remark').val(user.job_remark);
            $('#edit-job_by').val(user.job_by);
            $('#editModal').modal('show');// display modal
        });
    });

    // save change via AJAX (ส่งแบบฟอร์มแก้ไข)
    $('#editForm').on('submit', function(e) {
        e.preventDefault();
        // get value from form
        const id = $('#edit-id').val();
        const job_detail = $('#edit-job_detail').val();
        const job_remark = $('#edit-job_remark').val();
        const job_by = $('#edit-job_by').val();

        // send to update
        $.post('api/update_user.php', { id: id, job_detail: job_detail, job_remark: job_remark, job_by: job_by }, function (response) {
            const res = JSON.parse(response);
            alert(res.message);
            $('#editModal').modal('hide');// close modal
            table.ajax.reload();// reload DataTable
        });
    });

    // open delte modal and show user data
    $(document).on('click', '.btn-delete', function() {
        const id = $(this).data('id');
        $.post('api/get_user.php', { id: id }, function (data) {
            const user = JSON.parse(data);

            if (user) {
                $('#delete-id').val(user.id);
                $('#delete-job_detail').val(user.job_detail);
                // $('#delete-job_remark').val(user.job_remark);
                // $('#delete-job_by').val(user.job_by);
                $('#deleteModal').modal('show');
            } else {
                alert('No user found!');
            }
        }).fail(function() {
            alert('Error fetching user data');
        });
    });

    // confirm delete user
    $('#confirm-delete').on('click', function() {
        const id = $('#delete-id').val();
        $.post('api/delete_user.php', { id: id }, function(response) {
            const res = JSON.parse(response);
            alert(res.message);
            $('#deleteModal').modal('hide');
            table.ajax.reload();// Reload Data Table
        });
    });

    // insert data
    $(document).on('click', '#saveBtn', function(e) {
        e.preventDefault();

        const job_detail = $('#add-job_detail').val();
        const job_remark = $('#add-job_remark').val();
        const job_by = $('#add-job_by').val();

        // Check data
        if (job_detail && job_remark && job_by) {
            $.ajax({
                type: 'POST',
                url: 'api/insert_user.php',
                data: {
                    job_detail: job_detail,
                    job_remark: job_remark,
                    job_by: job_by
                },
                success: function(response) {
                    const res = JSON.parse(response);
                    alert(res.message);
                    $('#addModal').modal('hide');
                    $('#addForm')[0].reset(); // reset form
                    $('#users_table').DataTable().ajax.reload();// update DataTable
                },
                error: function(err) {
                    alert(err);
                }
            });
        } else {
            alert('Error while inserting data.');
        }
    });
})