@extends('layouts.master')
@section('title','Mağaza')
@section('navbar-search')
    <input type="text" id="navbar-search" class="form-control" placeholder="Ara" name="aranan">
    <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">
                                <i class="">Search</i>
                            </button>
                        </span>
@endsection
@section('content')
    <div class="product">
        <div class="container">
            <div class="product-main">
                <div class=" product-menu-bar">
                    <div class="col-md-3 prdt-right">
                        <section class="sky-form">
                            <div class="panel panel-default">
                                <div class="panel-heading">Kategoriler</div>
                                <div class="panel-body">
                                    <div class="list-group categories">
                                        @foreach($kategoriler as $kategori)
                                        <a href="{{ route('kategori',$kategori->slug) }}" class="list-group-item">
                                            <i class="fa fa-television"></i>{{ $kategori->kategori_adi }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>
                </div>
                <div class="col-md-9 product-block">

                    @if(count($urunler) == 0)
                        <div class="col-md-12">
                            Bu kategoriye ait ürün bulunmuyor.
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
                        {{$urunler->links()}}
                </div>


            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
    </script>
@endsection
