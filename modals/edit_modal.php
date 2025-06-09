<div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Job</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="editForm">
                    <input type="hidden" id="edit-id">

                    <div class="mb-3">
                        <label id="form-label">Detail</label>
                        <input type="text" class="form-control" id="edit-job_detail" required>
                    </div>
                    <div class="mb-3">
                        <label id="form-label">Remark</label>
                        <input type="text" class="form-control" id="edit-job_remark" required>
                    </div>
                    <div class="mb-3">
                        <label id="form-label">Job by</label>
                        <input type="text" class="form-control" id="edit-job_by" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>