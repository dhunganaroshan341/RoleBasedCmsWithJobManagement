@extends('Admin.layout.master')

@section('content')

<div class="container mt-4">
    <x-admin-bread-crumb-no-button />

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-3">


        <!-- <a href="{{ route('admin.video-sections.index') }}" class="btn btn-dark">
            <i class="fas fa-arrow-left me-1"></i> Back
        </a> -->
    </div>

    <x-session-message />

    <form method="POST"
        action="{{ $videoSection ? route('admin.video-sections.update', $videoSection->id) : route('admin.video-sections.store') }}"
        enctype="multipart/form-data">

        @csrf
        @if($videoSection) @method('PUT') @endif

        <div class="row">

            {{-- LEFT --}}
            <div class="col-md-8">

                <div class="card shadow-sm">
                    <div class="card-body">

                        <h5 class="mb-3">Video Section Info</h5>

                        {{-- SECTION --}}
                        <div class="mb-3">
                            <label class="form-label">Page Section *</label>

                            <select name="section" class="form-select" required>
                                <option value="">Select Section</option>

                                <option value="home_1" {{ old('section', $videoSection->section ?? '') == 'home_1' ?
                                    'selected' : '' }}>Home Section 1</option>

                                <option value="home_2" {{ old('section', $videoSection->section ?? '') == 'home_2' ?
                                    'selected' : '' }}>Home Section 2</option>

                                <option value="home_3" {{ old('section', $videoSection->section ?? '') == 'home_3' ?
                                    'selected' : '' }}>Home Section 3</option>
                            </select>
                        </div>

                        {{-- VIDEOS --}}
                        <div class="mb-3">
                            <label class="form-label">Videos</label>

                            @php
                            $videos = old('video_urls', $videoSection->video_urls ?? [['url'=>'','thumbnail'=>'']]);
                            @endphp

                            <div id="video-wrapper">

                                @foreach($videos as $i => $video)

                                <div class="card mb-2 p-2 video-row">

                                    <div class="row g-2">

                                        {{-- URL --}}
                                        <div class="col-md-8">
                                            <input type="url" name="video_urls[{{ $i }}][url]"
                                                class="form-control video-url" value="{{ $video['url'] ?? '' }}"
                                                placeholder="https://youtube.com/...">
                                        </div>

                                        {{-- THUMBNAIL FILE --}}
                                        {{-- THUMBNAIL --}}
                                        <div class="col-md-4">

                                            <input type="file" name="video_urls[{{ $i }}][thumbnail]"
                                                class="form-control">

                                            {{-- 👇 SHOW EXISTING IMAGE --}}
                                            @if(!empty($video['thumbnail']))
                                            <img src="{{ asset('uploads/'. $video['thumbnail']) }}"
                                                class="mt-2 rounded border" width="100">
                                            @endif

                                        </div>


                                    </div>

                                    <button type="button" class="btn btn-danger btn-sm mt-2 remove-video">
                                        Remove
                                    </button>

                                </div>

                                @endforeach

                            </div>

                            <button type="button" class="btn btn-sm btn-dark" id="add-video">
                                + Add Video
                            </button>

                        </div>

                    </div>
                </div>

            </div>

            {{-- RIGHT --}}
            <div class="col-md-4">

                <div class="card shadow-sm">
                    <div class="card-body">

                        <h5 class="mb-3">Actions</h5>

                        <button class="btn btn-success w-100 mb-2">
                            {{ $videoSection ? 'Update' : 'Save' }}
                        </button>

                        <a href="{{ route('admin.video-sections.index') }}" class="btn btn-light w-100">
                            Cancel
                        </a>

                    </div>
                </div>

            </div>

        </div>

    </form>

</div>

@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
    $(document).ready(function () {

        let index = {{ count($videos ?? [])
    }};

    // ➕ Add video
    $('#add-video').on('click', function () {

        let html = `
        <div class="card mb-2 p-2 video-row">

            <div class="row g-2">

                <div class="col-md-8">
                    <input type="url"
                        name="video_urls[`+ index + `][url]"
                        class="form-control video-url"
                        placeholder="https://youtube.com/...">
                </div>

                <div class="col-md-4">
                    <input type="file"
                        name="video_urls[`+ index + `][thumbnail]"
                        class="form-control">
                </div>

            </div>

            <button type="button" class="btn btn-danger btn-sm mt-2 remove-video">
                Remove
            </button>

        </div>
        `;

        $('#video-wrapper').append(html);
        index++;
    });

    // ❌ Remove
    $(document).on('click', '.remove-video', function () {
        $(this).closest('.video-row').remove();
    });

});
</script>
@endpush