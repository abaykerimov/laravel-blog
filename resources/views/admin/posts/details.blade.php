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
@push('styles')
    <!-- Include CSS for icons. -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <!-- Include Editor style. -->
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.0/css/froala_style.min.css" rel="stylesheet" type="text/css" />

@endpush
@push('scripts')
    {{--<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=cgb46t2y39y00y9slf9cgs81l747j3rihvja55fjrv47w5po"></script>--}}
    {{--<script>--}}
        {{--tinymce.init({--}}
            {{--selector:'textarea',--}}
            {{--plugins: "a11ychecker, advcode, linkchecker, media mediaembed, powerpaste, tinydrive, tinymcespellchecker",--}}
            {{--toolbar: "a11ycheck, code, insertfile"--}}
        {{--});--}}
    {{--</script>--}}

    <!-- Include jQuery lib. -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include Editor JS files. -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@2.9.0/js/froala_editor.pkgd.min.js"></script>

    <!-- Initialize the editor. -->
    <script>
        $(function() {
            $('textarea').froalaEditor()
        });
    </script>
@endpush