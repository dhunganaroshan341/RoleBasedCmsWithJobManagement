@extends('Admin.layout.master')


@section('content')
<div class="container-fluid">
    <!-- <button class="btn btn-dark mb-4 mt-4 " id="addPageBtn">Add Pages</button> -->
    <div class="card mb-3 shadow-sm">
        <div class="row justify-around card-body">
            <div class="col-6">
                <small class="mb-3">
                    {{ ucwords(str_replace('/', ' > ', request()->path())) }}
                </small>
            </div>
            <div class="col-6 text-end">
                <button id="addPageBtn" type="button" class="btn btn-dark  {{ $buttonClass??'addUserButton'}}"
                    data-action="add">
                    <i class="fas fa-plus"></i> Create
                </button>
            </div>
        </div>
    </div>

    <div class="table-responsive card shadow-sm p-2">
        <table class="table-bordered table table-striped" id="show-page-data">
            <thead class="table-light">
                <tr>
                    <th scope="col">S.N</th>
                    <th scope="col">Title</th>
                    <th scope="col">Slug</th>
                    <!-- <th scope="col">Status</th> -->
                    <th scope="col">Action</th>
                </tr>
            </thead>


        </table>
    </div>
    @include('Admin.pages.pages.pageModal')
</div>
@endsection