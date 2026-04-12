@props([
'breadCrumbTitle' => 'User',
'buttonClass' => 'addUserButton'
])
@extends('Admin.layout.master')
@section('content')
<div class="container-fluid">
    <!-- <button class="btn btn-dark addJobCategoryBtn mb-4 mt-4">Add Job Category</button> -->
    @include('components.admin-bread-crumb', ['breadCrumbTitle' => 'Job Category', 'buttonClass' =>
    'addJobCategoryBtn'])
    @include('Admin.pages.JobCategory.jobCategoryModal')

    <div class="table-responsive ">
        <table class="table table-striped" id="show-job-category-data">
            <thead>
                <tr>
                    <th scope="col">S.N</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection