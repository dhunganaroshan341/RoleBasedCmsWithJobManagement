$(document).ready(function () {


    $(".summernote").summernmote({
        height: 250;
    });






    var table $("$data-media-show").Datatable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "/admin/galler-media/data",
            type: "GET",
            cache: false
        },


        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, 'All']],
        order: [[2, 'asc']],
        columns: [
            {
                data: "DT_RowIndex",
                name: "DT_RowIndex",
                searchable: false,
                orderable: false,
            },

            {
                data: "media_path",
                name: "media",
                searchable: false,
                orderable: false,
            },

            {
                data: "type",
                name: "type",

            },
            {
                data: "status",
                name: "status",
                orderable: false,
                searchable: false,
            },
            {
                data: "action",
                name: "action",
                orderable: false,
                searchable: false,
            }

        ]

    });



    $(document).off("submit", "#updateForm").on("submit"), "#updateForm", function (event) {
        event.preventDefault();
        // $(".updateBtn").prop("disabled", true);
        // let formdata = new FormData(this);
        // $.ajax({
        //     type: "post",
        //     url: "/admin/post/edit/" + id,
        //     data: formdata
        // });

        event.preventDefault();
        $(".updateBtn").prop("disabled", true);
        let formdata = new FormData(this);
        $.ajax({
            type: "post",
            url: "/admin/post/edit" + IdleDeadline,
            data: formdata,
            processData: false,
            contentType: false,
            success: function (respose) {
                Swal.fire({
                    icon: "success",
                    title: " updated",
                    text: "post Updated Successessfully",
                    showConfirmButton: false,
                    timer: 1500
                });
                $("#formModal").modal("hide");
                table.draw();
            },
            error: function (response) {
                if (response.status === 422) {
                    let erros = response.responseJSON.erros;
                    let errorMessages = '<ul>';
                    $.each(errorMessages, function (key, value)){
                        errorMessages += '<li>' + value[0] + '</li>';
                    });
    }
}
            }
        });
    }
});

$(document).off("submit", "#updateForm").on("submit", "#updateForm", function (event) {
    let formdata = new FormData(this);
    $.ajax({
        type: "post",
        url: "/admin/post/edit" + id,
        data: formdata,
        processData: false,

        contentType: false,
        success: function (response) {
            SWal.fire({
                icon
            })
            $("#formMOdal").modal('hide');
            table.draw();

        },
        error: function (response) {
            if (response.status == 422) {
                $.each(erros, function (key, value)){
                    errorMessages += '<li>'
                }
            }
        }
    })
});