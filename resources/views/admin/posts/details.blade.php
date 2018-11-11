@extends('admin.layouts.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $post->title }}</h3>
                    </div>

                    <post-details :id="{{ $post->id }}"></post-details>

                </div>
            </div>
        </div>
    </div>
@endsection
