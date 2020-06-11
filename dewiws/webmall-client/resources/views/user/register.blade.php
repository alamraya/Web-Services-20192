@extends('layouts.master')

@section('title','Register')

@section('breadcrumb')
    <span>Register</span>
@endsection

@section('content')

<!-- Register Section Begin -->
<div class="register-login-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="register-form">
                    <h2>Register</h2>
                    <form action="{{url('/register/store')}}" method="POST">
                        @csrf
                        <div class="group-input">
                            <label for="username">Username*</label>
                            <input type="text" id="username" name="name" required>
                        </div>
                        <div class="group-input">
                            <label for="email">Email*</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="group-input">
                            <label for="pass">Password *</label>
                            <input type="password" id="pass" name="password" required>
                        </div>
                        <div class="group-input">
                            <label for="con-pass">Confirm Password *</label>
                            <input type="password" name="c_password" id="con-pass">
                        </div>
                        <button type="submit" class="site-btn register-btn">REGISTER</button>
                    </form>
                    <div class="switch-login">
                        <a href="{{route('login')}}" class="or-login">Or Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Register Form Section End -->

@endsection
