@extends('site.layouts.layout')
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