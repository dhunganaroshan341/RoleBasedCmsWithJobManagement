@extends('Admin.layout.master')
@section('content')

<div class="container-fluid">
    <x-admin-bread-crumb-no-button />

    <div class="card shadow-sm">



        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-striped" id="fetch-applications">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Job</th>
                            <th>Resume</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        {{-- DataTables injects data --}}
                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection


@push('scripts')

<!-- <script src="{{ asset('js/datatables/job-applications.js') }}"></script> -->

@endpush