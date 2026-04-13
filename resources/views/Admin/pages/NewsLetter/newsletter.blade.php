@extends('Admin.layout.master')
@section('content')
<div class="container-fluid">
    <button class="btn btn-dark addTestimonialBtn mb-4 mt-4">NewsLetter Subscribers</button>

    <div class="table-responsive card shadow-sm p-2">
        <table class="table table-striped" id="show-newsletter-data">
            <thead class="table-light">
                <tr>
                    <th scope="col">S.N</th>
                    <th scope="col">Email</th>
                    <th scope="col">Submitted Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
        </table>

    </div>

</div>
@endsection