@extends('admin.app')
@section('title')
    <title>Авторизоваться</title>
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <div style="padding:2rem;text-align:center">
                    <a href="{{ route('home') }}">
                        <img alt="Image" src="{{ asset('front/images/locas_horisont_color.png') }}" width="120px"
                            class="logo-black">

                    </a>
                </div>
                <form action="{{ route('login') }}" method="POST"
                    style="padding:2rem;border:2px solid #efefef;margin:2rem">
                    @csrf
                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" type="text" class="form-control" value="" placeholder="Email">
                        @error('phone_number')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input name="password" type="password" value="" class="form-control" placeholder="*******">
                        @error('password')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="clearfix add_bottom_30">
                        <div class="checkboxes float-left">
                            <label class="container_check">Remember me
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="float-right mt-1"><a id="forgot" href="javascript:void(0);"></a></div>
                    </div>
                    <button type="submit" class="btn btn-info">Login</button>
                </form>
            </div>
            <div class="col-md-3">
            </div>
        </div>
    </div>
@endsection
