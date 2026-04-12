@extends('Admin.layout.master')
@section('content')
<div class="container-fluid">
    <button class="btn btn-dark addCategoryBtn mb-4 mt-4">Add Category</button>
    @include('Admin.pages.SectionCategory.categoryModal')

    <div class="table-responsive">
        <table class="table table-striped" id="section-category-table">
            <thead>
                <tr>
                    <th scope="col">S.N</th>
                    <th scope="col">Title</th>
                    <th scope="col">Sub Heading</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection