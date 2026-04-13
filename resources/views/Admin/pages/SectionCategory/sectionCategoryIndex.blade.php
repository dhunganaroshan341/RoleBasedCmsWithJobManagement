@extends('Admin.layout.master')
@section('content')
<div class="container-fluid">
    @push('button')
    <button class="btn btn-dark addCategoryBtn "> <i class="fas fa-plus"></i> Create</button>

    @endpush
    @include('components.admin-bread-crumb-custom-button')
    @include('Admin.pages.SectionCategory.categoryModal')

    <div class="table-responsive card shadow-sm p-2">
        <table class="table table-striped" id="section-category-table">
            <thead class="table-light">
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