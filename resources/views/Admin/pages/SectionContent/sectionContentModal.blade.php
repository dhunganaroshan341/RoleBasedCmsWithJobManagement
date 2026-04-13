<div class="modal fade" id="sectionContentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="sectionContentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="sectionContentForm" class="sectionContentForm">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="sectionContentModalLabel">Add Section Content</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <p id="validationErrors" class="alert alert-danger d-none"></p>

                    <span class="mt-2 mb-4 d-block">
                        <span class="text-danger">Note:</span>
                        (<span class="text-danger">*</span>) fields are required
                    </span>

                    <div class="row g-3">
                        @csrf

                        <!-- Image -->
                        <div class="col-md-12">
                            <label class="form-label fw-bold">Image <span class="text-danger"></span></label>
                            <input type="file" name="image" id="image" class="form-control" accept="image/*" />
                            <div id="imagePreview" class="mt-2">
                                <img src="" alt="Image Preview" id="previewImg" class="img-thumbnail d-none"
                                    style="max-width: 150px;">
                            </div>
                        </div>

                        <!-- Category -->
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Category <span class="text-danger">*</span></label>
                            <select name="section_category_id" id="section_category_id" class="form-control" required>
                                <option value="">Select Category</option>
                                @foreach ($categories ?? [] as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Title -->
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" class="form-control" required />
                        </div>

                        <!-- Icon Class -->
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Icon Class</label>
                            <input type="text" name="icon_class" id="icon_class" class="form-control"
                                placeholder="e.g. fas fa-user" />
                        </div>

                        <!-- Description -->
                        <div class="col-md-12">
                            <label class="form-label fw-bold">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4"
                                placeholder="Write a detailed description..."></textarea>
                        </div>

                        <!-- --- Secondary Fields (Collapsed / Optional) --- -->
                        <div class="col-md-12 mt-4">
                            <a class="btn btn-outline-secondary w-100" data-bs-toggle="collapse" href="#secondaryFields"
                                role="button" aria-expanded="false" aria-controls="secondaryFields">
                                More Options
                            </a>
                            <div class="collapse mt-3" id="secondaryFields">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Short Description</label>
                                        <input type="text" name="short_description" id="short_description"
                                            class="form-control" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Video</label>
                                        <input type="text" name="video" id="video" class="form-control"
                                            placeholder="YouTube/Vimeo link" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">PDF</label>
                                        <input type="text" name="pdf" id="pdf" class="form-control"
                                            placeholder="PDF URL or file path" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Link Title</label>
                                        <input type="text" name="link_title" id="link_title" class="form-control" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Link URL</label>
                                        <input type="text" name="link_url" id="link_url" class="form-control" />
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Description 2</label>
                                        <textarea class="form-control" id="description2" name="description2"
                                            rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Secondary -->
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success submitBtn" data-action="">Submit</button>
                    <button type="submit" class="btn btn-success updateBtn d-none" data-action="edit">
                        Update Section Content
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>