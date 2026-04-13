<!-- Add / Edit Post Modal -->
<div class="modal fade" id="formModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="formId" class="form">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel">Add Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <p id="validationErrors" class="alert alert-danger d-none"></p>
                    <div class="row">
                        <span class="mt-2 mb-4 text-muted">
                            <span class="text-danger">*</span> required fields
                        </span>

                        <!-- Categories -->
                        <div class="col-md-12 mb-3">
                            <label for="category_id" class="form-label">Select Categories <span
                                    class="text-danger">*</span></label>
                            <select class="form-select category_ids" name="category_ids[]" id="category_id" multiple>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                            <small class="text-muted">Hold Ctrl (Cmd on Mac) to select multiple.</small>
                        </div>

                        <!-- Tags -->
                        <div class="col-md-12 mb-3">
                            <label for="tag_id" class="form-label">Select Tags</label>
                            <select class="form-select tag_ids" name="tag_ids[]" id="tag_id" multiple>
                                @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                            <small class="text-muted">Hold Ctrl (Cmd on Mac) to select multiple.</small>
                        </div>

                        <!-- Title -->
                        <div class="col-md-12 mb-3">
                            <label for="posttitleData" class="form-label">Title <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="post_title" id="posttitleData" class="form-control">
                        </div>

                        <!-- Images -->
                        <div class="col-md-12 mb-3">
                            <label for="post_image" class="form-label">Images <span class="text-danger">*</span></label>
                            <input type="file" name="post_images[]" id="post_image" class="form-control" multiple>
                            <div class="postImageData mt-2"></div>
                        </div>

                        <!-- Description -->
                        <div class="col-md-12 mb-3">
                            <label for="post_description" class="form-label">Description <span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control summernote" name="post_description" id="post_description"
                                rows="4"></textarea>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success submitBtn">Submit</button>
                    <button type="submit" class="btn btn-success updateBtn d-none">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Image Carousel Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Image List</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner fetch-post-image-data"></div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Comment List Modal -->
<div class="modal fade" id="commentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Comment List</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body fetch-comment-data"></div>
        </div>
    </div>
</div>