@extends('layouts.master')
@section('title','Ürün')
@section('head')
    <link rel="stylesheet" href="/css/flexslider.css" type="text/css" media="screen" />
@endsection

@section('content')

    <div class="single">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="{{ route('anasayfa') }}">Anasayfa</a></li>
                @foreach($kategoriler as $kategori)
                    <li><a href="{{ route('kategori',$kategori->slug) }}">{{ $kategori->kategori_adi }}</a></li>
                @endforeach
                <li class="active">{{$urun->urun_adi}}</li>
            </ol>
            <div class="single-main">
                <div class="single-top-main">
                    <div class="col-md-5 single-top">
                        <div class="flexslider">
                            <ul class="slides">
                                <li data-thumb="/images/si1.jpg">
                                    <div class="thumb-image"> <img src="/images/s1.jpg" data-imagezoom="true" class="img-responsive"> </div>
                                </li>
                                <li data-thumb="/images/si2.jpg">
                                    <div class="thumb-image"> <img src="/images/s2.jpg" data-imagezoom="true" class="img-responsive"> </div>
                                </li>
                                <li data-thumb="/images/si3.jpg">
                                    <div class="thumb-image"> <img src="/images/s3.jpg" data-imagezoom="true" class="img-responsive"> </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-7 single-top-left simpleCart_shelfItem">
                        <h1>{{ $urun->urun_adi}}</h1>
                        <h6 class="item_price">{{ $urun->fiyati }}$</h6>
                        <p>{{ $urun->aciklama }}</p>

                        <form action="{{route('sepet.ekle')}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$urun->id}}">
                            <input type="submit" class="btn btn-theme bann-btns" value="Sepete Ekle">
                        </form>

                    </div>
                    <div class="clearfix"> </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('footer')
    <script src="/js/imagezoom.js"></script>
    <script defer src="/js/jquery.flexslider.js"></script>
    <script>
        // Can also be used with $(document).ready()
        $(window).load(function() {
            $('.flexslider').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
            });
        });
    </script>
@endsection

