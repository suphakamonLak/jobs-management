<div class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Jobs</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="addForm">
                    <div class="mb-3">
                        <label class="form-label">Job Detail</label>
                        <input type="text" class="form-control" id="add-job_detail" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Job Remark</label>
                        <input type="text" class="form-control" id="add-job_remark" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Job By</label>
                        <input type="text" class="form-control" id="add-job_by" required>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="saveBtn">Save</button>
            </div>
        </div>
    </div>
</div>