<div class="modal fade" id="JobFormModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="jobModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="jobForm" class="form">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="jobModalTitle">Add Job</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="validationErrors" class="alert alert-danger d-none"></p>

                    <div class="row">

                        {{-- Custom Company (default open) --}}
                        <div class="col-md-6">
                            <label class="form-label">Custom Company Name</label>
                            <input type="text" name="custom_company_name" id="custom_company_name" class="form-control" placeholder="Enter company name">
                        </div>

                        {{-- Country --}}
                        <div class="col-md-6">
                            <label class="form-label">Country</label>
                            <select name="our_country_id" id="our_country_id" class="form-control">
                                <option value="" selected>-- Select Country --</option>
                                @foreach(\App\Models\Country::all() as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Job Title --}}
                        <div class="col-md-6 mt-3">
                            <label class="form-label">Job Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Enter job title" required>
                        </div>

                        {{-- Multiple Categories --}}
                        <div class="col-md-6 mt-3">
                            <label class="form-label">Categories</label>
                            <select name="category_ids[]" id="category_ids" class="form-control" multiple>
                                @foreach(\App\Models\Category::all() as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Interview Date --}}
                        <div class="col-md-6 mt-3">
                            <label class="form-label">Interview Date</label>
                            <input type="date" name="interview_date" id="interview_date" class="form-control">
                        </div>

                        {{-- Status --}}
                        <div class="col-md-6 mt-3">
                            <label class="form-label">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="active" selected>Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success submitBtn">Save Job</button>
                </div>
            </form>
        </div>
    </div>
</div>
