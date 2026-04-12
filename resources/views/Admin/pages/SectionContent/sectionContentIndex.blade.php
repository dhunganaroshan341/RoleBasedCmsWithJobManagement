@extends('Admin.layout.master')
@section('content')
<div class="container-fluid d-flex justify-content-between align-items-center">
    <button class="btn btn-dark addContentBtn mb-4 mt-4">Add Section Content</button>

    <!-- Category Filter -->
    @include('Admin.pages.SectionContent.categoryFilter')
</div>

@include('Admin.pages.SectionContent.sectionContentModal')

<div class="table-responsive">
    <table class="table table-striped" id="section-content-table">
        <thead>
            <tr>
                <th scope="col">S.N</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Image</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
    </table>
</div>
@endsection