<div class="modal fade" id="VacancyFormModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">

            <form id="vacancyForm" enctype="multipart/form-data">
                @csrf

                <!-- HEADER -->
                <div class="modal-header bg-light">
                    <h5 class="modal-title fw-bold" id="vacancyModalTitle">➕ Add Vacancy</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <!-- Errors -->
                    <div id="validationErrors" class="alert alert-danger d-none"></div>

                    <!-- ================= COMPANY ================= -->
                    <div class="card mb-3 shadow-sm">
                        <div class="card-body">
                            <h6 class="fw-bold mb-3">Company Info</h6>

                            <div class="d-flex gap-4 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="company_type" value="existing"
                                        checked>
                                    <label class="form-check-label">Existing Company</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="company_type" value="custom">
                                    <label class="form-check-label">Custom Company</label>
                                </div>
                            </div>

                            <!-- Existing -->
                            <div id="existingCompanyWrapper">
                                <label class="form-label">Select Company</label>
                                <select name="company_id" id="company_id" class="form-select">
                                    <option value="">-- Select Company --</option>
                                </select>
                            </div>

                            <!-- Custom -->
                            <div id="customCompanyWrapper" class="row g-3 d-none">
                                <div class="col-md-6">
                                    <label class="form-label">Company Name</label>
                                    <input type="text" name="custom_company_name" class="form-control">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Country</label>
                                    <input type="text" name="custom_company_country" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ================= BASIC INFO ================= -->
                    <div class="card mb-3 shadow-sm">
                        <div class="card-body">
                            <h6 class="fw-bold mb-3">Vacancy Info</h6>

                            <div class="row g-3">

                                <div class="col-md-6">
                                    <label class="form-label">Title *</label>
                                    <input type="text" name="title" id="title" class="form-control" required>
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Currency</label>
                                    <select name="currency" class="form-select">
                                        <option value="USD">USD</option>
                                        <option value="NPR">NPR</option>
                                        <option value="JPY">JPY</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Interview Date</label>
                                    <input type="date" name="interview_date" id="interview_date" class="form-control">
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- ================= REQUIREMENTS ================= -->
                    <div class="card mb-3 shadow-sm">
                        <div class="card-body">
                            <h6 class="fw-bold mb-3">General Requirements</h6>

                            <textarea name="general_requirements"
                                class="form-control summernote generalRequirementsSummernote"></textarea>
                        </div>
                    </div>

                    <!-- ================= DESCRIPTION ================= -->
                    <div class="card mb-3 shadow-sm">
                        <div class="card-body">
                            <h6 class="fw-bold mb-3">Description</h6>

                            <textarea name="description" class="form-control summernote"></textarea>
                        </div>
                    </div>

                    <!-- ================= IMAGE ================= -->
                    <div class="card mb-3 shadow-sm">
                        <div class="card-body">
                            <h6 class="fw-bold mb-3">Vacancy Image</h6>

                            <input type="file" name="vacancy_image" id="vacancy_image" class="form-control"
                                accept="image/*">

                            <div id="previewImage" class="mt-2"></div>
                        </div>
                    </div>

                    <!-- ================= STATUS ================= -->
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h6 class="fw-bold mb-3">Status</h6>

                            <select name="status" id="status" class="form-select w-25">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>

                </div>

                <!-- FOOTER -->
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>

                    <button type="button" class="btn btn-success submitBtn">
                        Save Vacancy
                    </button>

                    <button type="button" class="btn btn-dark updateBtn d-none">
                        Update Vacancy
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>