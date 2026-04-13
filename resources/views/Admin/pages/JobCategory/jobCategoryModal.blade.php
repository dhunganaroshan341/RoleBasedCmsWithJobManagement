<div class="modal fade" id="jobCategoryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="jobCategoryModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="jobCategoryForm" class="form">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="jobCategoryModalTitle">Add Job Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="validationErrors" class="alert alert-danger d-none"></p>
                    <div class="row">
                        @csrf
                        <div class="col-md-6">
                            <label class="form-label">Name<span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="">
                        </div>

                        <div class="col-md-6 mt-3">
                            <label class="form-label">Icon Class</label>
                            <input type="text" name="icon_class" id="icon_class" class="form-control" placeholder="">
                        </div>

                        <div class="col-md-6 mt-3">
                            <label class="form-label">Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                            <div id="jobCategoryImagePreview" class="mt-2"></div>
                        </div>

                        <div class="col-md-12 mt-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control summernote" id="jobCategoryDescription" name="description"
                                rows="4"></textarea>
                        </div>

                        <div class="col-md-12 mt-3">
                            <label class="form-label">Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control" placeholder="">
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success submitBtn">Submit</button>
                    <button type="submit" class="btn btn-success updateBtn" style="display:none;">Update Job
                        Category</button>
                </div>
            </form>
        </div>
    </div>
</div>