@extends('admin.layouts.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-login mx-auto">
                <div class="text-center mb-6">
                    <img src="./demo/brand/tabler.svg" class="h-6" alt="">
                </div>
                <form class="card" action="" method="post">
                    <div class="card-body p-6">
                        <div class="card-title">Forgot password</div>
                        <p class="text-muted">Enter your email address and your password will be reset and emailed to you.</p>
                        <div class="form-group">
                            <label class="form-label" for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary btn-block">Send me new password</button>
                        </div>
                    </div>
                </form>
                <div class="text-center text-muted">
                    Forget it, <a href="{{ url()->route('admin.auth.login') }}">send me back</a> to the sign in screen.
                </div>
            </div>
        </div>
    </div>
@endsection
