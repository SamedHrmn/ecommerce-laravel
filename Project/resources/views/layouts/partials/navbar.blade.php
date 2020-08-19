<div class="header">
    <div class="container">
        <div class="header-main">
            <div class="top-nav">
                <div class="content white">
                    <nav class="navbar navbar-default" role="navigation">
                        <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <div class="navbar-brand logo">
                                <a href="{{ route('anasayfa') }}"><img src="/images/logo1.png" alt=""></a>
                            </div>
                        </div>
                        <!--/.navbar-header-->

                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <form class="navbar-form navbar-left" action=" {{ route('urun_ara') }} " method="post">
                                    {{ csrf_field() }}
                                    <div class="input-group">
                                        @yield('navbar-search')
                                    </div>
                                </form>


                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="{{ route('magaza') }}">Mağaza</a></li>
                                    <li><a href="{{ route('sepet') }}"><i class="fa fa-shopping-cart"></i> Sepet <span class="badge badge-theme">
                                {{ Cart::count() }}
                        </span></a></li>
                                    @guest
                                        <li><a href="{{ route('kullanici.oturumac') }}">Oturum Aç</a></li>
                                        <li><a href=" {{ route('kullanici.kaydol') }}">Kaydol</a></li>
                                    @endguest

                                    @auth
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Profil <span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">Siparişlerim</a></li>
                                                <li role="separator" class="divider"></li>
                                                <li><a href="#"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Çıkış</a>
                                                    <form action="{{ route('kullanici.oturumukapat') }}" method="post" style="display: none;" id="logout-form">
                                                        {{csrf_field()}}
                                                    </form>
                                                </li>
                                            </ul>
                                        </li>
                                    @endauth

                                </ul>
                            </div>
                        <!--/.navbar-collapse-->

                        </div>
                    </nav>
                    <!--/.navbar-->
                </div>
            </div>
            {{--<div class="header-right">
                <div class="search">
                    <div class="search-text">
                        <input class="serch" type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}"/>
                    </div>
                    <div class="cart box_1">
                        <a href="checkout.html">
                            <h3>
                                <img src="/images/cart.png" alt=""/>
                                <div class="total">
                                    <span class="simpleCart_total"></span></div>
                            </h3>
                        </a>
                        <p><a href="javascript:;" class="simpleCart_empty">Sepet</a></p>
                    </div>
                    <div class="head-signin">
                        <h5><a href="login.html"><i class="hd-dign"></i>Giriş yap</a></h5>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>--}}


            <div class="clearfix"> </div>
        </div>
    </div>
</div>
