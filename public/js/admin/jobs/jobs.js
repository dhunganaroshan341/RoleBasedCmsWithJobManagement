$(function () {

    // ====================== CSRF Setup ======================
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    // ====================== Summernote ======================
    $(".summernote").summernote({ height: 300 });

    $(".generalRequirementsSummernote")
        .on("summernote.init", function () {
            $(this).summernote("code", `
                <ul>
                    <li>Age: 21-40 years</li>
                    <li>Sex: Male/Female</li>
                    <li>Education: High School / Diploma or above</li>
                    <li>Experience: Relevant Field Experience preferred</li>
                    <li>Skills: Teamwork, adaptability</li>
                </ul>
            `);
        })
        .summernote();

    // ====================== Modal ======================
    const jobModal = new bootstrap.Modal(document.getElementById("JobFormModal"));

    // ====================== DataTable ======================
    const table = $("#show-job-data").DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {
            url: "/admin/jobs",
            type: "GET", // ✅ IMPORTANT
        },
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        order: [[2, "asc"]],
        columns: [
            { data: "DT_RowIndex", orderable: false, searchable: false },
            { data: "title", name: "title" },
            { data: "vacancy_title", defaultContent: "<em>No Vacancy</em>" },
            { data: "vacancy_company", defaultContent: "<em>Not Assigned</em>" },
            { data: "vacancy_country", defaultContent: "<em>Not Set</em>" },
            { data: "salary", name: "salary" },
            { data: "status", orderable: false, searchable: false },
            { data: "action", orderable: false, searchable: false },
        ],
        dom: '<"d-flex justify-content-between align-items-center mb-2"Bf>rtip',
        buttons: [
            { extend: "print", className: "btn btn-outline-secondary btn-sm" },
            { extend: "excel", className: "btn btn-outline-success btn-sm" },
        ],
        columnDefs: [{ className: "text-center align-middle", targets: "_all" }],
    });

    table.on("draw", () => $('[data-bs-toggle="tooltip"]').tooltip());

    // ====================== Select2 ======================
    $('#JobFormModal').on('shown.bs.modal', function () {
        $('#category_ids').select2({
            dropdownParent: $('#JobFormModal'),
            width: '100%',
            allowClear: true
        });

        $('#our_country_id').select2({
            dropdownParent: $('#JobFormModal'),
            width: '100%',
            allowClear: true
        });
    });

    // ====================== OPEN MODAL ======================
    function openModal(action, id = null) {
        clearModal();

        if (action === "add") {
            $(".submitBtn").show();
            $(".updateBtn").hide();
        } else {
            $(".submitBtn").hide();
            $(".updateBtn").show().data("id", id);
        }

        $("#jobModalTitle").text(action === "add" ? "Add Job" : "Update Job");

        jobModal.show();

        if (action === "update" && id) {
            $.get("/admin/jobs/" + id, function (res) {
                if (res.success) populateModal(res.data);
            });
        }
    }

    $(document).on("click", ".addJobBtn", () => openModal("add"));

    $(document).on("click", ".editUserButton", function () {
        openModal("update", $(this).data("id"));
    });

    // ====================== POPULATE ======================
    function populateModal(job) {
        console.log(job);
        $('#title').val(job.title);
        $('#salary').val(job.salary);
        $('#status').val(job.status);
        // vacancy (single select)
        $('#vacancy_id').val(job.vacancy_id);
        $('#interview_date').val(job.interview_date);

        $('#total_openings').val(job.total_openings);
        $('#male_opening').val(job.male_opening);
        $('#female_opening').val(job.female_opening);

        $('#requirements').val(job.requirements);

        // Select2 safe populate
        if (job.our_country_id) {
            $('#our_country_id').val(job.our_country_id).trigger('change');
        }

        if (job.categories) {
            $('#category_ids')
                .val(job.categories.map(c => c.id))
                .trigger('change');
        }

        // Image preview
        $("#previewImage").html(
            job.image
                ? `<img src="/${job.image}" width="100" height="100">`
                : `<img src="/user.png" width="100" height="100">`
        );

        // Openings mode
        const mode =
            (job.male_opening > 0 || job.female_opening > 0)
                ? "male-female"
                : "total";

        $('#openingsMode').val(mode).trigger("change");
        $('#openings_mode').val(mode);
    }

    // ====================== SUBMIT ======================
    function submitForm(action, id = "") {

        const form = $("#jobForm")[0];
        const formData = new FormData(form);

        if (action === "update") {
            formData.append("_method", "PUT");
        }

        $.ajax({
            type: "POST",
            url: action === "add"
                ? "/admin/jobs"
                : "/admin/jobs/" + id,
            data: formData,
            contentType: false,
            processData: false,

            success: function (res) {
                if (res.success) {
                    Swal.fire({
                        icon: "success",
                        title: action === "add" ? "Created" : "Updated",
                        timer: 1000,
                        showConfirmButton: false
                    });

                    table.ajax.reload(null, false);
                    jobModal.hide();
                }
            },

            error: function (xhr) {

                if (xhr.status === 422) {
                    let html = "<ul>";

                    $.each(xhr.responseJSON.errors, (k, v) => {
                        html += `<li>${v[0]}</li>`;
                    });

                    html += "</ul>";

                    $("#validationErrors")
                        .removeClass("d-none")
                        .html(html);
                }
            },
        });
    }

    // ====================== BUTTONS ======================
    $(".submitBtn").on("click", function (e) {
        e.preventDefault();
        submitForm("add");
    });

    $(".updateBtn").on("click", function (e) {
        e.preventDefault();
        submitForm("update", $(this).data("id"));
    });

    // ====================== DELETE ======================
    $(document).on("click", ".deleteData", function () {

        const id = $(this).data("id");

        Swal.fire({
            icon: "warning",
            title: "Are you sure?",
            showCancelButton: true,
        }).then((result) => {

            if (!result.isConfirmed) return;

            $.ajax({
                url: "/admin/jobs/" + id,
                type: "POST",
                data: { _method: "DELETE" },

                success: function (res) {
                    if (res.success) {
                        table.ajax.reload(null, false);
                    }
                },
            });
        });
    });

    // ====================== STATUS ======================
    $(document).on("change", ".statusIdData", function () {

        const checkbox = $(this);
        const id = checkbox.data("id");

        $.get("/admin/jobs/status/" + id, function () {
            table.ajax.reload(null, false);
        });
    });

    // ====================== OPENINGS MODE ======================
    $("#openingsMode").on("change", function () {

        const mode = this.value;

        $("#openings_mode").val(mode);

        if (mode === "male-female") {
            $("#totalOpeningsWrapper").addClass("d-none");
            $("#maleFemaleWrapper").removeClass("d-none");
        } else {
            $("#totalOpeningsWrapper").removeClass("d-none");
            $("#maleFemaleWrapper").addClass("d-none");
        }
    });

    // ====================== CLEAR ======================
    function clearModal() {
        $("#jobForm")[0].reset();

        $("#validationErrors").addClass("d-none").html("");

        $(".summernote").summernote("code", "");

        $("#category_ids, #our_country_id").val(null).trigger("change");

        $("#previewImage").html("");

        $(".submitBtn").show();
        $(".updateBtn").hide();
    }

});