@extends('layouts.master')
@section('content')

    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{route('anasayfa')}}">Anasayfa</a></li>
            <li class="active">Arama Sonucu</li>
        </ol>

        <div class="col-md-9 product-block">

            @if(count($urunler) == 0)
                <div class="col-md-4">
                    Arama sonucuna göre ürün bulunamadı.
                </div>
            @endif
            @foreach($urunler as $urun)
                <div class="col-md-4 home-grid">
                    <div class="home-product-main">
                        <div class="home-product-top">
                            <a href="{{ route('urun',$urun->slug) }}"><img src="/images/h5.jpg" alt="" class="img-responsive zoom-img"></a>
                        </div>
                        <div class="home-product-bottom">
                            <h5><a href="{{ route('urun',$urun->slug) }}" style="color: white;">{{ $urun->urun_adi }}</a></h5>

                        </div>
                        <div class="srch">
                            <span>{{ $urun->fiyati }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{$urunler->appends(['aranan'=>old('aranan')])->links()}}

    </div>

@endsection
