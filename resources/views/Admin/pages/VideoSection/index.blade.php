@extends('Admin.layout.master')

@section('content')

@php
function isYouTube($url) {
return str_contains($url, 'youtube.com') || str_contains($url, 'youtu.be');
}

function getYouTubeId($url) {
preg_match('/(?:youtube\.com.*v=|youtu\.be\/)([^&]+)/', $url, $matches);
return $matches[1] ?? null;
}
@endphp

<div class="container mt-4">
    <x-admin-bread-crumb-no-button />
    {{-- HEADER --}}
    <div class="card mb-3">
        <div class="card-body d-flex justify-content-between align-items-center flex-wrap gap-2">

            <a href="{{ route('admin.video-sections.create') }}" class="btn btn-dark">
                + Add Video Section
            </a>

            <form method="GET" action="{{ route('admin.video-sections.index') }}"
                class="d-flex gap-2 align-items-center">

                <input type="text" name="search" class="form-control" style="width: 250px;"
                    placeholder="Search section..." value="{{ request('search') }}">

                <button class="btn btn-dark">Search</button>

                <a href="{{ route('admin.video-sections.index') }}" class="btn btn-light">Reset</a>

            </form>

        </div>
    </div>

    <x-session-success-table-message />

    {{-- TABLE --}}
    <div class="card">
        <div class="card-body table-responsive">

            <table class="table table-striped table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Section</th>
                        <th>Videos</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($videoSections as $index => $section)
                    <tr>

                        <td>{{ $index + 1 }}</td>

                        {{-- SECTION --}}
                        <td>
                            <span class="badge bg-dark text-uppercase">
                                {{ str_replace('_', ' ', $section->section) }}
                            </span>
                        </td>

                        {{-- VIDEOS --}}
                        <td>

                            @if(!empty($section->video_urls))

                            <span class="badge bg-success mb-2">
                                {{ count($section->video_urls) }} Videos
                            </span>

                            <div class="d-flex flex-wrap gap-2">

                                @foreach($section->video_urls as $video)

                                @php
                                $url = $video['url'] ?? null;
                                $thumb = $video['thumbnail'] ?? null;
                                $youtubeId = isYouTube($url) ? getYouTubeId($url) : null;
                                @endphp

                                {{-- YOUTUBE --}}
                                @if($youtubeId)
                                <div class="video-thumb" data-video="{{ $youtubeId }}"
                                    style="width:120px; cursor:pointer;">

                                    <img src="https://img.youtube.com/vi/{{ $youtubeId }}/hqdefault.jpg" width="120"
                                        height="70" class="rounded border">

                                </div>

                                {{-- CUSTOM THUMB --}}
                                @elseif($thumb)
                                <div class="video-thumb" data-url="{{ $url }}" style="width:120px; cursor:pointer;">

                                    <img src="{{ $thumb }}" width="120" height="70" class="rounded border">

                                </div>

                                {{-- FALLBACK LINK --}}
                                @else
                                <a href="{{ $url }}" target="_blank" class="btn btn-sm btn-outline-dark">
                                    View
                                </a>
                                @endif

                                @endforeach

                            </div>

                            @else
                            <span class="text-muted">No videos</span>
                            @endif

                        </td>

                        {{-- ACTION --}}
                        <td class="text-center">

                            <div class="dropdown">

                                <button class="btn p-0 bg-transparent border-0" data-bs-toggle="dropdown">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>

                                <ul class="dropdown-menu dropdown-menu-end">

                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('admin.video-sections.edit', $section->id) }}">
                                            Edit
                                        </a>
                                    </li>

                                    <li>
                                        <form action="{{ route('admin.video-sections.destroy', $section->id) }}"
                                            method="POST" onsubmit="return confirm('Delete this section?')">

                                            @csrf
                                            @method('DELETE')

                                            <button class="dropdown-item text-danger">
                                                Delete
                                            </button>

                                        </form>
                                    </li>

                                </ul>

                            </div>

                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-4">
                            No video sections found
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>

        </div>
    </div>

</div>

{{-- ================= MODAL ================= --}}
<div class="modal fade" id="videoModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body p-0">
                <iframe id="videoFrame" width="100%" height="450" frameborder="0" allowfullscreen></iframe>
            </div>

        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
    $(document).on('click', '.video-thumb', function () {

        let videoId = $(this).data('video');
        let url = $(this).data('url');

        if (videoId) {
            $('#videoFrame').attr('src', 'https://www.youtube.com/embed/' + videoId);
        } else {
            $('#videoFrame').attr('src', url);
        }

        $('#videoModal').modal('show');
    });

    $('#videoModal').on('hidden.bs.modal', function () {
        $('#videoFrame').attr('src', '');
    });
</script>
@endpush