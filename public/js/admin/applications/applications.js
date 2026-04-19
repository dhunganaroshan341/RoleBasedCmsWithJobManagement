$(document).ready(function () {

    var table = $("#fetch-applications").DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "/admin/applications",
            type: "GET",
            cache: false
        },

        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, 'All']],

        order: [[1, "desc"]],

        columns: [

            { data: "DT_RowIndex", name: "DT_RowIndex", orderable: false, searchable: false },

            { data: "name", name: "name" },

            { data: "email", name: "email" },

            { data: "phone", name: "phone" },

            { data: "job", name: "job", orderable: false },

            { data: "resume", name: "resume", orderable: false, searchable: false },

            { data: "status", name: "status", orderable: false },

            { data: "action", name: "action", orderable: false, searchable: false }

        ],

        language: {
            emptyTable: "No job applications found"
        }
    });

});