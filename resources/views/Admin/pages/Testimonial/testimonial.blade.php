@extends('Admin.layout.master')
@section('content')
<div class="container-fluid">
    @push('button')
    <button class="btn btn-dark addTestimonialBtn ">
        Create
    </button>
    @endpush

    @include('components.admin-bread-crumb-custom-button')
    @include('Admin.pages.Testimonial.testimonialModal')

    <div class="table-responsive card shadow-sm p-2">
        <table class="table table-striped" id="show-testimonial-data">
            <thead class="table-light">
                <tr>
                    <th scope="col">S.N</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    {{-- <th scope="col">Address</th> --}}
                    <th scope="col">Designation</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
        </table>
    </div>

</div>

@endsection