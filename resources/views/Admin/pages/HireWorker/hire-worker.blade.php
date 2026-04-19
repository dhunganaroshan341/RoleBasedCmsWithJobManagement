@extends('Admin.layout.master')
@section('content')
<div class="container-fluid">
    <x-admin-bread-crumb-no-button />
    <div class="table-responsive card shadow-sm p-2">
        <table id="fetch-contact-data" class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Company</th>
                    <th>Job</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
    @include('Admin.pages.HireWorker.modal')
</div>
@endsection