<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title> {{ $title ?? 'Aurora ' }} | Admin Panel </title>


<!-- jQuery -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
<!-- Add SortableJS CDN -->
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>


{{--
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
<link rel="stylesheet" href="{{ asset('admin/vendors/mdi/css/materialdesignicons.min.css') }}">

{{-- Font Awesome --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
{{-- Font Awesome --}}

<link rel="stylesheet" href="{{ asset('admin/vendors/font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
<link rel="shortcut icon" href="{{ asset('assets/images/logo-bg.png') }}" />




{{-- Sweet Alert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{-- Sweet Alert --}}
<!-- Then app.js -->
<script>
    window.appBaseUrl = "{{ url('/') }}";

    window.routes = {
        // Dashboard
        dashboard: "{{ route('admin.dashboard') }}",

        // Achievements
        achievements: {
            index: "{{ route('admin.achievements.index') }}",
            store: "{{ route('admin.achievements.store') }}",
            show: "{{ url('admin/achievements') }}/", // append ID in JS
            edit: "{{ url('admin/achievements') }}/", // append ID in JS
            destroy: "{{ url('admin/achievements') }}/", // append ID in JS
            toggle: "{{ url('admin/achievements/status/toggle') }}/", // append ID in JS
        },

        // Clients
        clients: {
            index: "{{ route('admin.client.index') }}",
            store: "{{ route('admin.client.store') }}",
            status: "{{ url('admin/client/status') }}/", // append ID in JS
            destroy: "{{ url('admin/client/delete') }}/", // append ID in JS
        },

        // Testimonials
        testimonials: {
            index: "{{ route('admin.testimonial') }}",
            store: "{{ route('admin.testimonial.store') }}",
            update: "{{ url('admin/testimonial/update') }}/", // append ID in JS
            destroy: "{{ url('admin/testimonial/delete') }}/", // append ID in JS
            status: "{{ url('admin/testimonial/status') }}/", // append ID in JS
        },

        // Notices
        notices: {
            index: "{{ route('admin.notice.index') }}",
            store: "{{ route('admin.notice.store') }}",
            update: "{{ url('admin/notice') }}/", // append ID
            destroy: "{{ url('admin/notice') }}/", // append ID
            status: "{{ url('admin/notice/status') }}/", // append ID
        },

        // Users
        users: {
            index: "{{ route('admin.user') }}",
            store: "{{ route('admin.user.store') }}",
            update: "{{ url('admin/user/update') }}/", // append ID
            destroy: "{{ url('admin/user/delete') }}/", // append ID
            resetPassword: "{{ url('admin/user/reset-password') }}/", // append ID
        },

        // Jobs (new)
        jobs: {
            index: "{{ route('admin.jobs.index') }}",
            store: "{{ route('admin.jobs.store') }}",
            update: "{{ url('admin/jobs/update') }}/", // append ID
            destroy: "{{ url('admin/jobs/delete') }}/", // append ID
            status: "{{ url('admin/jobs/status') }}/", // append ID
        }
    };
</script>
{{-- widnow routes setting up --}}
<style>
    /* Remove underline from icon links inside the datatable */
    table.dataTable a.addItineraryBtn,
    table.dataTable a.viewItineraryBtn,
    table.dataTable a.addTourBatchBtn,
    table.dataTable a.viewTourBatchBtn,
    table.dataTable a.imageListPopup,
    table.dataTable a.editUploads {
        text-decoration: none !important;
        cursor: pointer;
    }

    /* Optional: On hover, keep color but no underline */
    table.dataTable a:hover {
        text-decoration: none !important;
    }

    .modal-body {
        max-height: 70vh;
        overflow-y: auto;
    }
</style>

@isset($extraCs)
@foreach ($extraCs as $css)
{{--
<script src="{{ asset($cs) }}?v=0.3.1"></script> --}}
<link rel="stylesheet" href="{{ $css }}">
@endforeach
@endisset

@stack('styles')