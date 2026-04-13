@extends('Admin.layout.master')
@section('content')
<div class="container-fluid">
    <!-- Button trigger modal -->

    <x-admin-bread-crumb breadCrumbTitle="User" />

    {{-- Table --}}
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="mb-3 d-flex gap-2">
                    <select id="userFilter" class="form-select w-auto">
                        <option value="">All Users</option>
                        <option value="admin">Admins</option>
                        <option value="jobseekers">Job Seekers</option>
                    </select>

                    <button id="resetFilter" class="btn btn-dark">Reset</button>
                </div>
                <div class="table-responsive card shadow-sm p-2">
                    <table class="table table-striped" id="show-user-data">
                        <thead class="table-light">
                            <tr>
                                <th> S.N </th>
                                <th> Image </th>
                                <th> Full Name </th>
                                <th> Email </th>
                                <th> Position </th>
                                <th> Phone Number </th>
                                <th> Role </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- Table --}}

    <!-- Modal -->
    @include('Admin.pages.User.usermodal')
</div>
@endsection