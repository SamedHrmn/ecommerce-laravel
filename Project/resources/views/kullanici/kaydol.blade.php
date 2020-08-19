@extends('layouts.master')
@section('title','Kaydol')
@section('content')
    <div class="signin">
        <div class="container">
            <div class="signin-main">
                <h1>Kayıt ol</h1>
                <h2>Bilgiler</h2>

                @include('layouts.partials.errors')

                <form method="post" action="{{ route('kullanici.kaydol') }}">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <input type="text" placeholder="Ad Soyad" name="adsoyad" id="adsoyad" value="{{ old('adsoyad') }}" required autofocus>
                        <input type="email" class="no-margin" placeholder="E-mail" id="email" name="email" value="{{ old('email') }}" required>
                        <input type="password" placeholder="Şifre" id="sifre" name="sifre" required/>
                        <input type="password" class="no-margin" placeholder="Şifre Tekrarı" id="sifre-tekrari" name="sifre_confirmation" required/>
                        <input type="submit" value="Kaydol">
                    </div>


                </form>
            </div>
        </div>
    </div>

@endsection
