@extends('Admin.layout.master')
@section('content')
<div class="container-fluid">
    <button class="btn btn-dark addServiceBtn mb-4 mt-4">Add Services</button>
    @include('Admin.pages.Services.servicemodal')

    <div class="table-responsive card shadow-sm p-2">
        <table class="table table-striped" id="show-testimonial-data">
            <thead class="table-light">
                <tr>
                    <th scope="col">S.N</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Short Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
        </table>
    </div>

</div>

@endsection