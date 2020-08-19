@extends('layouts.master')
@section('title','Oturum Aç')
@section('content')
    <div class="login">
        <div class="container">
            <div class="login-main">
                <h1>Giriş Yap</h1>
                <div class="col-md-6 login-left">
                    @include('layouts.partials.errors')

                    <form method="post" action="{{ route('kullanici.oturumac') }}">

                        {{ csrf_field() }}

                        <div class="form-group">
                            <input type="email" class="no-margin" placeholder="E-mail" id="email" name="email" value="{{ old('email') }}" required>
                            <input type="password" placeholder="Şifre" id="sifre" name="sifre" required/>
                            <input type="submit" value="Giriş">
                        </div>
                    </form>

                </div>
                <div class="col-md-6 login-right">
                    <h3>New User? Create an Account</h3>
                    <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system. and expound the actual teachings of the great.</p>
                    <a href="signup.html" class="login-btn">Create an Account </a>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>

@endsection
