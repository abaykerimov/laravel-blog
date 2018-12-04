@extends('site.layouts.layout')
@section('meta')
    <title>{{ env('APP_NAME') }}</title>
    {{--<meta name='description' itemprop='description' content='{{ $post->seo_description }}' />--}}
    {{--<meta name='keywords' content='{{ $post->seo_keywords }}' />--}}

    {{--<meta property="og:description" content="{{ $post->seo_description }}" />--}}
    <meta property="og:title" content="{{ env('APP_NAME') }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:locale" content="ru-ru" />
    {{--<meta property="og:image" content="{{ public_path($post->image) }}" />--}}
    {{--<meta property="og:image:url" content="{{ env('APP_URL') . $post->image }}" />--}}
    {{--<meta property="og:image:size" content="300" />--}}
    <meta name="twitter:title" content="{{ env('APP_NAME') }}" />
@endsection
@section('content')
    <post-list></post-list>
    {{--<div class="col-12 col-lg-9">--}}

        {{--<div class="content-wrap">--}}
            {{--<header class="entry-header">--}}
                {{--<div class="posted-date">--}}
                    {{--January 30, 2018--}}
                {{--</div><!-- .posted-date -->--}}

                {{--<h2 class="entry-title">Test</h2>--}}

                {{--<div class="tags-links">--}}
                    {{--<a href="#">#test</a>--}}
                    {{--<a href="#">#test</a>--}}
                    {{--<a href="#">#test</a>--}}
                    {{--<a href="#">#test</a>--}}
                {{--</div><!-- .tags-links -->--}}
            {{--</header><!-- .entry-header -->--}}

            {{--<figure class="featured-image">--}}
                {{--<img src="{{ asset('images/layout/3.jpg') }}" alt="">--}}
            {{--</figure><!-- .featured-image -->--}}

            {{--<div class="entry-content">--}}
                {{--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vel tortor facilisis, volutpat nulla placerat, tincidunt mi. Nullam vel orci dui. Suspendisse sit amet laoreet neque. Fusce sagittis suscipit sem a consequat. Proin nec interdum sem. Quisque in porttitor magna, a imperdiet est. </p>--}}
            {{--</div><!-- .entry-content -->--}}

            {{--<footer class="entry-footer flex flex-column flex-lg-row justify-content-between align-content-start align-lg-items-center">--}}
                {{--<div class="comments-count flex align-items-center order-1 order-lg-1 text-left">--}}
                    {{--<a href="#">2 Comments</a>--}}
                {{--</div><!-- .comments-count -->--}}

                {{--<a class="read-more order-2" href="{{ url()->route('posts.details', 1) }}">Read more</a>--}}

                {{--<ul class="post-share flex align-items-center order-3 order-lg-3 text-right">--}}
                    {{--<label>Share</label>--}}
                    {{--<li><a href="#"><i class="fa fa-vk"></i></a></li>--}}
                    {{--<li><a href="#"><i class="fa fa-facebook"></i></a></li>--}}
                    {{--<li><a href="#"><i class="fa fa-twitter"></i></a></li>--}}
                    {{--<li><a href="#"><i class="fa fa-linkedin"></i></a></li>--}}
                {{--</ul><!-- .post-share -->--}}
            {{--</footer><!-- .entry-footer -->--}}
        {{--</div><!-- .content-wrap -->--}}

        {{--<div class="content-wrap">--}}
            {{--<header class="entry-header">--}}
                {{--<div class="posted-date">--}}
                    {{--January 30, 2018--}}
                {{--</div><!-- .posted-date -->--}}

                {{--<h2 class="entry-title">Test</h2>--}}

                {{--<div class="tags-links">--}}
                    {{--<a href="#">#test</a>--}}
                    {{--<a href="#">#test</a>--}}
                    {{--<a href="#">#test</a>--}}
                    {{--<a href="#">#test</a>--}}
                {{--</div><!-- .tags-links -->--}}
            {{--</header><!-- .entry-header -->--}}

            {{--<figure class="featured-image">--}}
                {{--<img src="{{ asset('images/layout/2.jpg') }}" alt="">--}}
            {{--</figure><!-- .featured-image -->--}}

            {{--<div class="entry-content">--}}
                {{--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vel tortor facilisis, volutpat nulla placerat, tincidunt mi. Nullam vel orci dui. Suspendisse sit amet laoreet neque. Fusce sagittis suscipit sem a consequat. Proin nec interdum sem. Quisque in porttitor magna, a imperdiet est. </p>--}}
            {{--</div><!-- .entry-content -->--}}

            {{--<footer class="entry-footer flex flex-column flex-lg-row justify-content-between align-content-start align-lg-items-center">--}}
                {{--<ul class="post-share flex align-items-center order-3 order-lg-1">--}}
                    {{--<label>Share</label>--}}
                    {{--<li><a href="#"><i class="fa fa-vk"></i></a></li>--}}
                    {{--<li><a href="#"><i class="fa fa-facebook"></i></a></li>--}}
                    {{--<li><a href="#"><i class="fa fa-twitter"></i></a></li>--}}
                    {{--<li><a href="#"><i class="fa fa-linkedin"></i></a></li>--}}
                {{--</ul><!-- .post-share -->--}}

                {{--<a class="read-more order-2" href="{{ url()->route('posts.details', 1) }}">Read more</a>--}}

                {{--<div class="comments-count order-1 order-lg-3">--}}
                    {{--<a href="#">2 Comments</a>--}}
                {{--</div><!-- .comments-count -->--}}
            {{--</footer><!-- .entry-footer -->--}}
        {{--</div><!-- .content-wrap -->--}}

        {{--<div class="content-wrap">--}}
            {{--<header class="entry-header">--}}
                {{--<div class="posted-date">--}}
                    {{--January 30, 2018--}}
                {{--</div><!-- .posted-date -->--}}

                {{--<h2 class="entry-title">Test</h2>--}}

                {{--<div class="tags-links">--}}
                    {{--<a href="#">#test</a>--}}
                    {{--<a href="#">#test</a>--}}
                    {{--<a href="#">#test</a>--}}
                    {{--<a href="#">#test</a>--}}
                {{--</div><!-- .tags-links -->--}}
            {{--</header><!-- .entry-header -->--}}

            {{--<figure class="featured-image">--}}
                {{--<img src="{{ asset('images/layout/3.jpg') }}" alt="">--}}
            {{--</figure><!-- .featured-image -->--}}

            {{--<div class="entry-content">--}}
                {{--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vel tortor facilisis, volutpat nulla placerat, tincidunt mi. Nullam vel orci dui. Suspendisse sit amet laoreet neque. Fusce sagittis suscipit sem a consequat. Proin nec interdum sem. Quisque in porttitor magna, a imperdiet est. </p>--}}
            {{--</div><!-- .entry-content -->--}}

            {{--<footer class="entry-footer flex flex-column flex-lg-row justify-content-between align-content-start align-lg-items-center">--}}
                {{--<ul class="post-share flex align-items-center order-3 order-lg-1">--}}
                    {{--<label>Share</label>--}}
                    {{--<li><a href="#"><i class="fa fa-vk"></i></a></li>--}}
                    {{--<li><a href="#"><i class="fa fa-facebook"></i></a></li>--}}
                    {{--<li><a href="#"><i class="fa fa-twitter"></i></a></li>--}}
                    {{--<li><a href="#"><i class="fa fa-linkedin"></i></a></li>--}}
                {{--</ul><!-- .post-share -->--}}

                {{--<a class="read-more order-2" href="{{ url()->route('posts.details', 1) }}">Read more</a>--}}

                {{--<div class="comments-count order-1 order-lg-3">--}}
                    {{--<a href="#">2 Comments</a>--}}
                {{--</div><!-- .comments-count -->--}}
            {{--</footer><!-- .entry-footer -->--}}
        {{--</div><!-- .content-wrap -->--}}
    {{--</div><!-- .col -->--}}
    @include('site.blocks.sidebar')

@endsection