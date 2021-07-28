@extends('layouts.app')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <p style="color:white;font-family:Montserrat;font-weight: 400;"><b>Login</b></p>
    </div>
    @guest
        @if (Route::has('login'))
            <!-- /.login-logo -->
            <div class="card" style="background: none;box-shadow: 0 0 0px rgb(0 0 0 / 13%), 0 0px 0px rgb(0 0 0 / 20%);">
            <div class="card-body login-card-body" style="border-radius: 1rem;background: none;">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-check-circle"></i> Berhasil !</h5>
                            {{$message}}
                        </div>
                    @elseif ($message = Session::get('gagal'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-exclamation-triangle"></i> Gagal disimpan !</h5>
                            {{$message}}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            <div class="input-group-append">
                                <div class="input-group-text" style="background-color: white;">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            <div class="input-group-append">
                                <div class="input-group-text" style="background-color: white;">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row">
                            <!-- /.col -->
                            <div class="col-12">
                                <button type="submit" class="btn btn-info btn-block">
                                    Masuk
                                </button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                </div>
            </div>
        @endif
    @else
    <div class="row"> 
        <div class="col-lg-6 col-6"> 
            <p align="right">
                <a href="/home" class="btn btn-primary" style="font-size:50px;margin-bottom:10px">
                    <i class="fas fa-home"></i>
                </a>
            </p>
        </div>
        <div class="col-lg-6 col-6"> 
            <a class="btn btn-danger" href="{{ route('logout') }}" style="font-size:50px;"
                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i>
            </a>
    
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
    @endguest
    <!-- /.login-box -->
</div>
@endsection
