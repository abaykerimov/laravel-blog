@extends('admin.layouts.layout')
@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                Список
            </h1>
        </div>
        <div class="row row-cards row-deck">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Рассказы</h3>
                    </div>

                    <post-list></post-list>
                </div>
            </div>
        </div>
    </div>
@stop
<script type="text/javascript" href=""></script>