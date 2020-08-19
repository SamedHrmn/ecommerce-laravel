@extends('yonetim.layouts.master')
@section('title','Anasayfa')
@section('content')
    <h1 class="page-header">İstatistikler</h1>

    <section class="row text-center placeholders">
        <div class="col-6 col-sm-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Bekleyen Siparişler</div>
                <div class="panel-body">
                    <input type="hidden" value="{{ $istatistikler['bekleyen_siparis'] }}" id="bekleyen_siparis">
                    <h4>{{ $istatistikler['bekleyen_siparis'] }}</h4>
                    <p>Adet</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Tamamlanan Siparişler</div>
                <div class="panel-body">
                    <input type="hidden" value="{{ $istatistikler['tamamlanan_siparis'] }}" id="tamamlanan_siparis">
                    <h4>{{ $istatistikler['tamamlanan_siparis'] }}</h4>
                    <p>Adet</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Toplam Ürün</div>
                <div class="panel-body">
                    <input type="hidden" value="{{ $istatistikler['toplam_urun'] }}" id="toplam_urun">
                    <h4>{{ $istatistikler['toplam_urun'] }}</h4>
                    <p>Adet</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Toplam Kullanıcı</div>
                <div class="panel-body">
                    <input type="hidden" value="{{ $istatistikler['toplam_kullanici'] }}" id="toplam_kulanici">
                    <h4>{{ $istatistikler['toplam_kullanici'] }}</h4>
                    <p>Adet</p>
                </div>
            </div>
        </div>
    </section>

    <section class="row">
        <div class="col-md-8">
            <canvas id="myChart"></canvas>
        </div>
    </section>
@endsection

@section('footer')
   <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

   <script>
       var ctx = document.getElementById('myChart').getContext('2d');
       var bekleyen_siparis = document.getElementById('bekleyen_siparis').value;
       var tamamlanan_siparis = document.getElementById('tamamlanan_siparis').value;
       var toplam_urun = document.getElementById('toplam_urun').value;
       var toplam_kullanici = document.getElementById('toplam_kulanici').value;
       var chart = new Chart(ctx, {
           // The type of chart we want to create
           type: 'bar',

           // The data for our dataset
           data: {
               labels: ['Bekleyen Sipariş', 'Tamamlanan Sipariş', 'Toplam Ürün', 'Toplam Kullanıcı'],
               datasets: [{
                   label: 'İstatistikler',
                   backgroundColor: 'rgb(255, 99, 132)',
                   borderColor: 'rgb(255, 99, 132)',

                   data: [bekleyen_siparis,tamamlanan_siparis,toplam_urun,toplam_kullanici]

               }]
           },

           // Configuration options go here
           options: {}
       });
   </script>
@endsection
