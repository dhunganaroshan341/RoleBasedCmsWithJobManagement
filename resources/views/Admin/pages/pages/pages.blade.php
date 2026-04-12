@extends('Admin.layout.master')


@section('content')
<div class="container-fluid">
    <button class="btn btn-dark mb-4 mt-4 " id="addPageBtn">Add Pages</button>



    <div class="table-responsive">
        <table class="table table-striped" id="show-page-data">
            <thead>
                <tr>
                    <th scope="col">S.N</th>
                    <th scope="col">Title</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>


        </table>
    </div>
    @include('Admin.pages.pages.pageModal')
</div>
@endsection