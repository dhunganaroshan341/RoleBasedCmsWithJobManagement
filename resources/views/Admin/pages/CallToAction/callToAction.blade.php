@extends('Admin.layout.master')
@section('content')
<div class="container-fluid">
    <button class="btn btn-dark addCallToActionBtn mb-4 mt-4">Call To Action</button>
    @include('Admin.pages.CallToAction.callToActionModal')

    <div class="table-responsive card shadow-sm p-2">
        <table class="table table-striped" id="show-call-to-action-data">
            <thead class="table-light">
                <tr>
                    <th scope="col">S.N</th>
                    <th scope="col">Image</th>
                    <th scope="col">Page</th>
                    <th scope="col">title</th>
                    <th scope="col">iframe</th>
                    <th scope="col">description</th>
                    <th scope="col">Status</th>
                    <th scope="col">link</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
        </table>
    </div>

</div>
@endsection