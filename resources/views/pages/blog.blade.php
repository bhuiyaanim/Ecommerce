@extends('layouts.app')
@section('content')

@include('layouts.menubar')

<!-- Home -->

<div class="home">
    <div class="home_background parallax-window" data-parallax="scroll" data-image-src="{{ asset('public/frontend/images/shop_background.jpg') }}"></div>
    <div class="home_overlay"></div>
    <div class="home_content d-flex flex-column align-items-center justify-content-center">
        <h2 class="home_title">Technological Blog</h2>
    </div>
</div>

<!-- Blog -->

<div class="blog">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="blog_posts d-flex flex-row align-items-start justify-content-between">
                    
                    <!-- Blog post -->
                    @foreach ($post as $post)
                        <div class="blog_post">
                            <div class="blog_image" style="background-image:url({{ asset($post->post_image) }})"></div>
                            @if(session()->get('lang') == 'bangla')
                                <div class="blog_text">{{ $post->post_title_bn }}</div>
                                <div class="blog_button"><a href="blog_single.html">বিস্তারিত পড়ুন</a></div>
                            @else    
                                <div class="blog_text">{{ $post->post_title_en }}</div>
                                <div class="blog_button"><a href="blog_single.html">Continue Reading</a></div>
                            @endif
                            
                        </div>
                    @endforeach
                    
                </div>
            </div>
                
        </div>
    </div>
</div>

@endsection