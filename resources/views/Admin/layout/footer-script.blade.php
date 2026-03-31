<!-- plugins:js -->
<script src="{{ asset('admin/vendors/js/vendor.bundle.base.js') }}"></script>


<script src="{{ asset('admin/js/template.js') }}"></script>
<!-- DataTables JS -->
<!-- Summernote JS -->
<!-- Your global JS -->
<script src="{{ asset('js/admin/global.js') }}"></script>


{{-- Select 2 --}}

@isset($extraJs)
@foreach ($extraJs as $js)
<script src="{{ $js }}"></script>
@endforeach
@endisset


{{-- routes --}}
<script>
    window.Routes = {
        admin: {
            job_categories: {
                index: '/admin/job-categories',
                store: '/admin/job-categories',
                update: (id) => `/admin/job-categories/${id}`,
                destroy: (id) => `/admin/job-categories/${id}`,
                status: (id) => `/admin/job-categories/status/${id}`,
            },
            jobs: {
                index: '/admin/jobs',
                store: '/admin/jobs',
            }
        }
    };

    // Place this at the top of your main JS file (or in a separate helpers.js included globally)
    window.previewImage = function (url, width = 100, height = 100, fallback = '/user.png') {
        return `<img src="${url}" alt="Image Preview" width="${width}" height="${height}" onerror="this.src='${fallback}';">`;
    };
</script>
{{-- endo of routes --}}


@php
$path = Request::path();
$dir_path = public_path() . '/js/' . $path;
if (is_dir($dir_path)) {
$directory = new DirectoryIterator($dir_path);
// Loop runs while directory is valid
while ($directory->valid()) {
if (!$directory->isDir()) {
$filename = url('js/' . $path . '/' . $directory->getFilename());
echo '
<script src="' . $filename . '?v=0.3.1"></script>';
}
// Move to the next element
$directory->next();

}
}
@endphp
@stack('scripts')