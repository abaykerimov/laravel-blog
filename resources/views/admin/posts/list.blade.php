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
                        <button type="button" class="btn btn-outline-primary btn-sm btn-post-create" data-toggle="modal" data-target="#createParent"><i class="fe fe-plus"></i> Создать</button>
                    </div>
                    <post-list></post-list>
                </div>
            </div>
        </div>
    </div>

    <div id="createParent" class="modal fade" role="dialog">
        <post-create></post-create>
    </div>
    <div id="createChild" class="modal fade" role="dialog">
        <post-create :type="'child'"></post-create>
    </div>
@stop
@push('styles')
<style>
    .btn-post-create {
        float: right;
        margin-left: 10px;
    }
</style>
@endpush