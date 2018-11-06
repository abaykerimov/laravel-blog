@extends('admin.layouts.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $post->title }}</h3>
                    </div>

                    <post-details v-bind:id="{{ $post->id }}"></post-details>
                </div>
            </div>
        </div>
    </div>
@stop
@push('scripts')
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=cgb46t2y39y00y9slf9cgs81l747j3rihvja55fjrv47w5po"></script>
    <script>
        tinymce.init({
            selector:'textarea',
            plugins: "a11ychecker, advcode, linkchecker, media mediaembed, powerpaste, tinydrive, tinymcespellchecker",
            toolbar: "a11ycheck, code, insertfile"
        });
    </script>
@endpush