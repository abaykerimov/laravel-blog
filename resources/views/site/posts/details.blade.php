@extends('site.layouts.layout')
@section('meta')
    @if($post)
        <title>{{ $post->seo_title }}</title>
        <meta name='description' itemprop='description' content='{{ $post->seo_description }}' />
        <meta name='keywords' content='{{ $post->seo_keywords }}' />
        <meta property='article:published_time' content='{{ $post->created_at }}' />

        <meta property="og:description" content="{{ $post->seo_description }}" />
        <meta property="og:title" content="{{ $post->seo_title }}" />
        <meta property="og:url" content="{{ url()->current() }}" />
        <meta property="og:locale" content="ru-ru" />
        <meta property="og:image" content="{{ public_path($post->image) }}" />
        <meta property="og:image:url" content="{{ env('APP_URL') . $post->image }}" />
        <meta property="og:image:size" content="300" />
        <meta name="twitter:title" content="{{ $post->seo_title }}" />
    @endif
@endsection
@section('content')
    <div class="container single-page blog-page">
        <div class="row">
            <div class="col-12">
                <post-detail :id="{{ $post->id }}"></post-detail>
                <post-comments :id="{{ $post->id }}"></post-comments>
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
@endsection