<div class="modal fade" id="sectionCategoryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="sectionCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="sectionCategoryForm" class="sectionCategoryForm" enctype="multipart/form-data">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="sectionCategoryModalLabel">Add Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <input type="hidden" name="id" id="categoryId">

                <div class="modal-body">
                    <p id="validationErrors" class="alert alert-danger d-none"></p>
                    <div class="row">
                        <span class="mt-2 mb-4"><span class="text-danger">Note:</span> (<span
                                class="text-danger">*</span>) symbol represent that the field is required</span>
                        <div class="col-md-6">
                            @csrf
                            <label class="form-label">Title<span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" class="form-control" required />
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Sub Heading<span class="text-danger">*</span></label>
                            <input type="text" name="sub_heading" id="sub_heading" class="form-control" required />
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control" />
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Main Image</label>
                            <input type="file" name="image" id="image" class="form-control" accept="image/*" />
                            <div id="imagePreview" class="mt-2">
                                <img src="" alt="Image Preview" id="previewImg" class="img-thumbnail d-none"
                                    style="max-width: 150px;">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Video Url</label>
                            <input type="text" name="video" id="video" class="form-control" />
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Multiple Images</label>
                            <div id="sectionCategoryDropzone" class="dropzone"></div>
                        </div>


                        <div class="col-md-12 mt-4 mb-2">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <div class="col-md-12 mt-2 mb-2">
                            <label class="form-label">Description 2</label>
                            <textarea class="form-control" id="description2" name="description2" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success submitBtn" data-action="">Submit</button>
                    <button type="submit" class="btn btn-success updateBtn" data-action="edit">Update Category</button>
                </div>
            </form>
        </div>
    </div>
</div>