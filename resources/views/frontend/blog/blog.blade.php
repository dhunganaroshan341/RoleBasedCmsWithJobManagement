@extends('frontend.layouts.layout')

@php
$title = 'Blog';
$subTitle = 'Blog';
$css =
'
<link href="' .
        asset('assets/css/module-css/page-title.css') .
        '" rel="stylesheet">
<link href="' .
        asset('assets/css/module-css/news.css') .
        '" rel="stylesheet">
<link href="' .
        asset('assets/css/module-css/blog-sidebar.css') .
        '" rel="stylesheet">
<link href="' .
        asset('assets/css/module-css/subscribe.css') .
        '" rel="stylesheet">
<link href="' .
        asset('assets/css/module-css/footer.css') .
        '" rel="stylesheet">
';
@endphp

@section('content')
<section class="sidebar-page-container p_relative pt_110 pb_120">
    <div class="auto-container">
        <div class="row clearfix">

            {{-- Sidebar --}}
            <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                <div class="blog-sidebar mr_40 mb_30">

                    {{-- Search --}}
                    <div class="search-widget mb_60">
                        <div class="search-form">
                            <form method="GET" action="{{ route('blog') }}">
                                <div class="form-group">
                                    <input type="search" name="search" placeholder="Search"
                                        value="{{ request('search') }}">
                                    <button type="submit"><i class="icon-1"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>

                    {{-- Categories --}}
                    <div class="sidebar-widget category-widget mb_50">
                        <div class="widget-title mb_11">
                            <h3>Categories</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="category-list clearfix">

                                @if (isset($categories) && $categories != null)
                                @foreach ($categories as $category)
                                <li>
                                    <a href="{{ route('blogsByCategory', ['slug' => $category->slug]) }}">
                                        {{ $category->title }} <span>({{ $category->posts_count }})</span>
                                    </a>
                                </li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>

                    {{-- Recent Posts --}}
                    <div class="sidebar-widget post-widget mb_60">
                        <div class="widget-title mb_20">
                            <h3>Latest Posts</h3>
                        </div>
                        <div class="post-inner">
                            @if (isset($recentPosts) && $recentPosts != null)
                            @foreach ($recentPosts as $post)
                            <div class="post">
                                <figure class="post-thumb">
                                    <a href="{{ route('blogDetail', $post->slug) }}">
                                        <img src="{{ $post->first_image_url ?? asset('images/engineer.jpg') }}"
                                            alt="{{ $post->title }}">
                                    </a>
                                </figure>
                                <h6>
                                    <a href="{{ route('blogDetail', $post->slug) }}">
                                        {{ Str::limit($post->title, 40) }}
                                    </a>
                                </h6>
                                <span class="post-date">{{ $post->created_at->format('j M Y') }}</span>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>

                    {{-- Popular Tags --}}
                    <div class="sidebar-widget tags-widget mb_45">
                        <div class="widget-title mb_20">
                            <h3>Popular Tags</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="tags-list clearfix">
                                @if (isset($popularPosts) && $popularPosts != null)
                                @foreach ($popularPosts as $post)
                                @foreach ($post->tags as $tag)
                                <li><a href="{{ route('blog', ['tag' => $tag->id]) }}">{{ $tag->name }}</a>
                                </li>
                                @endforeach
                                @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

            {{-- Blog Grid Content --}}
            <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                <div class="blog-grid-content">
                    <div class="row clearfix">
                        @if (isset($posts) && $posts != null)
                        @foreach ($posts as $post)
                        <div class="col-lg-6 col-md-6 col-sm-12 news-block">
                            <div class="news-block-two wow fadeInUp animated" data-wow-delay="0ms"
                                data-wow-duration="1500ms">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image">
                                            <a href="{{ route('blogDetail', $post->slug) }}">
                                                <img src="{{ $post->first_image_url ?? asset('images/engineer.jpg') }}"
                                                    alt="{{ $post->title }}">
                                            </a>
                                        </figure>
                                        <figure class="overlay-image">
                                            <a href="{{ route('blogDetail', $post->slug) }}">
                                                <img src="{{ $post->first_image_url ?? asset('images/engineer.jpg') }}"
                                                    alt="{{ $post->title }}">
                                            </a>
                                        </figure>
                                    </div>
                                    <div class="lower-content">
                                        @if ($post->categories->count())
                                        <span class="category">{{ $post->categories->first()->name }}</span>
                                        @endif
                                        <h3>
                                            <a href="{{ route('blogDetail', $post->slug) }}">
                                                {{ Str::limit($post->title, 60) }}
                                            </a>
                                        </h3>
                                        <ul class="post-info">
                                            <li>By <a href="#">{{ $post->createdBy->name ?? 'Admin' }}</a>
                                            </li>
                                            <li><span>{{ $post->created_at->format('F j, Y') }}</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>

                    @if (isset($posts) && $posts != null)
                    <div class="pagination-wrapper">
                        {{ $posts->links('pagination::bootstrap-5') }}
                    </div>
                    @endif

                </div>
            </div>

        </div>
    </div>
</section>
@endsection