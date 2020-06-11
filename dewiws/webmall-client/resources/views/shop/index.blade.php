@extends('layouts.master')

@section('title','Register Shop')

@section('breadcrumb')
    <span>Register Shop</span>
@endsection

@section('content')

<!-- Register Section Begin -->
<div class="register-login-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="register-form">
                    <h2>Register Shop</h2>
                    <form action="{{route('register_shop')}}" method="POST">
                        @csrf
                        <div class="group-input">
                            <label for="username">Shop Name*</label>
                            <input type="text" id="username" name="name" required>
                        </div>
                        <div class="group-input">
                            <label for="description">Description*</label>
                            <input type="text" id="description" name="description" required>
                        </div>
                        <button type="submit" class="site-btn register-btn">REGISTER</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Register Form Section End -->


@endsection
