<section class="training-section">
    <div class="auto-container">
        <div class="sec-title centred pb_60 sec-title-animation animation-style2">
            <span class="sub-title mb_10 title-animation">Training & Orientation</span>
            <h2 class="title-animation">Recent Workshops & Skill Programs</h2>
        </div>
    </div>

    <div class="inner-container clearfix">

        @if(!empty($videos?->video_urls))

        {{-- ✅ Dynamic Content --}}
        @foreach(collect($videos->video_urls)->take(4) as $video)
        <div class="training-block-one">
            <div class="inner-box"
                style="background-image: url('{{ asset('uploads/'.$video['thumbnail'] ?? 'default.jpg') }}')">

                <div class="video-content mb_150 centred">
                    <a href="{{ $video['url'] ?? 'https://www.youtube.com/watch?v=nfP5N9Yc72A&t=28s' }}" a
                        class="lightbox-image video-btn">
                        <i class="icon-8"></i>
                    </a>
                </div>

                <div class="text-box">
                    <h3>
                        <a href="{{ url('jobs') }}">
                            {{ $video['title'] ?? 'Training Program' }}
                        </a>
                    </h3>

                    <div class="link">
                        <a href="{{ url('jobs') }}">
                            View Details
                            <img src="{{ asset('assets/images/icons/icon-8.png') }}" alt="">
                        </a>
                    </div>
                </div>

            </div>
        </div>
        @endforeach

        @else

        {{-- ⚡ Static Fallback --}}

        <div class="training-block-one">
            <div class="inner-box" style="background-image: url('{{ asset('construction.jpg') }}')">
                <div class="video-content mb_150 centred">
                    <a href="https://www.youtube.com/watch?v=nfP5N9Yc72A" class="lightbox-image video-btn">
                        <i class="icon-8"></i>
                    </a>
                </div>
                <div class="text-box">
                    <h3><a href="{{ url('jobs') }}">Pre-Departure Orientation for Gulf Countries</a></h3>
                    <div class="link"><a href="{{ url('jobs') }}">View Details</a></div>
                </div>
            </div>
        </div>

        <div class="training-block-one">
            <div class="inner-box" style="background-image: url('{{ asset('hospitality.jpg') }}')">
                <div class="video-content mb_150 centred">
                    <a href="https://www.youtube.com/watch?v=nfP5N9Yc72A" class="lightbox-image video-btn">
                        <i class="icon-8"></i>
                    </a>
                </div>
                <div class="text-box">
                    <h3><a href="{{ url('jobs') }}">Hospitality & Customer Service Training</a></h3>
                    <div class="link"><a href="{{ url('jobs') }}">View Details</a></div>
                </div>
            </div>
        </div>

        <div class="training-block-one">
            <div class="inner-box" style="background-image: url('{{ asset('technician.jpg') }}')">
                <div class="video-content mb_150 centred">
                    <a href="https://www.youtube.com/watch?v=nfP5N9Yc72A" class="lightbox-image video-btn">
                        <i class="icon-8"></i>
                    </a>
                </div>
                <div class="text-box">
                    <h3><a href="{{ url('jobs') }}">Technical Skills & Safety Workshop</a></h3>
                    <div class="link"><a href="{{ url('jobs') }}">View Details</a></div>
                </div>
            </div>
        </div>

        <div class="training-block-one">
            <div class="inner-box" style="background-image: url('{{ asset('security.jpg') }}')">
                <div class="video-content mb_150 centred">
                    <a href="https://www.youtube.com/watch?v=nfP5N9Yc72A" class="lightbox-image video-btn">
                        <i class="icon-8"></i>
                    </a>
                </div>
                <div class="text-box">
                    <h3><a href="{{ url('jobs') }}">Language & Cultural Adaptation Sessions</a></h3>
                    <div class="link"><a href="{{ url('jobs') }}">View Details</a></div>
                </div>
            </div>
        </div>

        @endif

    </div>
</section>