@extends('Admin.layout.master')

@section('content')
@include('Admin.pages.Job.jobModal')

<div class="container-fluid">
    <button class="btn btn-dark addJobBtn mb-4 mt-4">Add Job</button>

    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle" id="show-job-data" width="100%">
            <thead class="table-light">
                <tr>
                    <th>S.N</th>
                    <!-- <th>Image</th> -->
                    <th>Title</th>
                    <th>Company</th>
                    <th>Vacancy</th>
                    <th>Country</th>
                    <!-- <th>Categories</th> -->
                    <th>Salary</th>
                    <th class="text-end">Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
@endsection