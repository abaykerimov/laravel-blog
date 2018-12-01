<?php
  auth()->check() ? $a = 'y' : $a = 'n';
//  dd($a);
?>
@extends('admin.layouts.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-login mx-auto">
                <div class="text-center mb-6">
                    <img src="./demo/brand/tabler.svg" class="h-6" alt="">
                </div>
                <login></login>
            </div>
        </div>
    </div>
@endsection
