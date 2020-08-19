@extends('layouts.master')
@section('title','Anasayfa')
@section('content')

    @include('layouts.partials.alert')

    <div class="banner">
        <div class="container">
            <div class="banner-main">
                <div class="col-md-6 banner-left">
                    <a href="{{ route('urun',$urun_one_cikan->urun->slug) }}"><img src="/images/ba.png" alt="" class="img-responsive"></a>
                </div>
                <div class="col-md-6 banner-right simpleCart_shelfItem">
                    <h2>Öne Çıkanlarda Bugün</h2>
                    <h1><a href="{{ route('urun',$urun_one_cikan->urun->slug) }}">{{ $urun_one_cikan->urun->urun_adi }}</a></h1>
                    <h5 class="item_price">$ {{ $urun_one_cikan->urun->fiyati }}</h5>
                    <ul class="bann-btns">
                        <li><a href="#" class="item_add">Sepete Ekle</a></li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="blc-layer2">
        <div class="container">
            <div class="blc-layer2-main">
                <div class="col-md-6 blc-layer2-left">
                    <h3>voluptatem sequi nesciunt.</h3>
                    <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system.</p>
                </div>
                <div class="col-md-6 blc-layer2-right">

                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>

    <div class="blc-layer3">
        <div class="container">
            <div class="blc-layer3-main">
                <div class="col-md-4 blc-layer3-grids1">
                    <h6>Günün Fırsatında Bugün</h6>
                    <h3>{{ $urun_gunun_firsati->urun->urun_adi }}</h3>
                    <p>{{ $urun_gunun_firsati->urun->aciklama }}</p>

                </div>
                <div class="col-md-4 blc-layer3-grids2">
                    <a href="{{ route('urun',$urun_gunun_firsati->urun->slug) }}"><img src="/images/bracelate.png" alt=""></a>
                </div>

                <div class="col-md-4 blc-layer3-grids1 simpleCart_shelfItem">
                    <div class="box-grid">
                        <h6>Çok Satan Ürün</h6>
                        <h3>{{ $urun_cok_satan->urun->urun_adi }}</h3>
                        <a href="{{ route('urun',$urun_cok_satan->urun->slug) }}"><img src="/images/w2.png" alt=""></a>
                        <div class="box-grid-price">
                            <div class="box-grid-price-left">
                                <h4>Fiyat</h4>
                            </div>
                            <div class="box-grid-price-rit">
                                <h4 class="item_price">{{ $urun_cok_satan->urun->fiyati }}</h4>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <ul class="bann-btns">
                            <li><a href="#" class="item_add">Sepete Ekle</a></li>
                        </ul>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>

@endsection
