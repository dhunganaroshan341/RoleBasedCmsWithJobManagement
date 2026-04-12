@extends('Admin.layout.master')

@section('content')
@include('Admin.pages.Job.jobModal')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mt-4 mb-3">

        <button class="btn btn-dark addJobBtn">+ Add Job</button>

        {{-- FILTER BY VACANCY --}}
        <select id="vacancyFilter" class="form-control" style="width: 250px;">
            <option value="">-- Filter by Vacancy --</option>
            @foreach(\App\Models\Vacancy::pluck('title','id') as $id => $title)
            <option value="{{ $id }}">{{ $title }}</option>
            @endforeach
        </select>

    </div>

    <div class="table-responsive">
        <table class="table table-bordered align-middle" id="show-job-data" width="100%">
            <thead class="table-light">
                <tr>
                    <th>S.N</th>
                    <th>Title</th>
                    <th>Vacancy</th>
                    <th>Company</th>
                    <th>Country</th>
                    <th>Male</th>
                    <th>Female</th>
                    <th>Total</th>
                    <th>Salary</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>

</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endpush

@push('scripts')
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

@push('scripts')
<script>
    $(function () {

        let table = $('#show-job-data').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('admin.jobs.index') }}",
                data: function (d) {
                    d.vacancy_id = $('#vacancyFilter').val(); // 🔥 filter
                }
            },
            columns: [
                { data: 'DT_RowIndex', name: 'id', orderable: false, searchable: false },

                { data: 'title', name: 'title' },

                { data: 'vacancy_title', name: 'vacancy.title' },

                { data: 'company', name: 'company' },

                { data: 'country', name: 'country' },

                { data: 'male_openings', name: 'male_openings' },

                { data: 'female_openings', name: 'female_openings' },

                { data: 'total_openings', name: 'total_openings' },

                { data: 'salary', name: 'salary' },

                { data: 'status', name: 'status', orderable: false, searchable: false },

                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });

        // 🔥 FILTER CHANGE
        $('#vacancyFilter').change(function () {
            table.draw();
        });

    });
</script>
@endpush