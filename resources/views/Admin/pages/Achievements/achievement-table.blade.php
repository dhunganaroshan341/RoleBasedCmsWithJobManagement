@extends('Admin.layout.master')
@section('content')
<div class="container-fluid">
    <button class="btn btn-dark addAchievementBtn mb-4 mt-4">Add Achievement</button>
    @include('Admin.pages.Achievements.achievementModal')

    <div class="table-responsive card shadow-sm p-2">
        <table class="table table-striped" id="show-achievement-data">
            <thead class="table-light">
                <tr>
                    <th>S.N</th>
                    <th>FontAwesome Icon</th>
                    <th>Title</th>
                    <th>Count</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection