<?php include_once('./includes/header.php'); ?>

<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3">
        <h2>Jobs Management system</h2>

        <!-- button open modal #addModal -->
        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addModal">
            Add Jobs
        </button>
    </div>

    <table id="users_table" class="display mt-2">
        <thead>
            <tr>
                <th width="5%">ID</th>
                <th width="25%">Name</th>
                <th width="25%">Job Remark</th>
                <th width="15%">Job By</th>
                <th width="20%">Created At</th>
                <th align="center" width="15%">Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Data loaded dynamically -->
        </tbody>
    </table>
</div>

<!-- Modals -->
<?php include('./modals/add_modal.php'); ?>
<?php include('./modals/edit_modal.php'); ?>
<?php include('./modals/delete_modal.php'); ?>

<!-- โหลด JS libraries (jQuery (ใช้สำหรับ DataTables and AJAX), DataTables plugin (จัดการตาราง), Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- JS -->
<script src="./assets/js/script.js"></script>

<?php include_once('./includes/footer.php'); ?>