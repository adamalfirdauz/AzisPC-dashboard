@extends('templates.dashboard')

@section('style')
    <style>
      #map {
        width: 100%;
        height: 200px;
        background-color: grey;
      }
    </style>
@endsection

@section('content')
    <section class="content-header">
        <h1>
        Daftar Tunggu
        </h1>
    </section>
    <section class="content">
        @foreach (App\Orders::where('status', '=', 1)->get() as $item)
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="pict">
                                    <img src="{{asset('storage/'.$item->foto)}}" height="80">
                                </div>
                            </div>
                            <div class="text col-sm-7">
                                <h3>{{$item->nama}}</h3>
                                <p id="date">{{$item->created_at->diffForHumans()}}</p>
                                <p id="productName">{{$item->nama}}</p>
                            </div>
                            <div class="buttonConf col-sm-3">
                                {{-- <button type="button" class="btn btn-danger" id="confirmation" data-target="">Tolak</button> --}}
                                <button type="button" class="btn btn-primary" id="confirmation" data-toggle="modal" data-target="#exampleModalCenter{{$item->id}}">Detail Barang</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {{--  Modal  --}}
        <div class="modal fade bd-example-modal-lg" id="exampleModalCenter{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle">Detail</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                                <div id="carouselImage" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselImage" data-slide-to="0" class="active"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="item active">
                                            <img class="d-block w-100" style="height: 400px" src="{{asset('storage/'.$item->foto)}}" alt="First slide" style="width:500px">
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row" id="modalRow">
                                <span id="modalInfo">Pemilik</span>
                                <h3 id="modalEntry">{{App\User::where('id', '=', $item->user_id)->first()->name}}</h3>
                            </div>
                            <div class="row" id="modalRow">
                                <span id="modalInfo">Keluhan</span>
                                <h4 id="modalEntry">{{$item->keluhan}}</h4> 
                            </div>
                            <div class="row" id="modalRow">
                                <p id="modalInfo">Kelengkapan</p>
                                <div class="col-sm-3">
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="">Charger</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="">CD/Driver</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="">Mouse</label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="">Tas</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="">Lainnya</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="">Lainnya</label>    
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="modalRow">
                                <span id="modalInfo">Tipe Kerusakan</span>
                                <h4 id="modalEntry">{{$item->tipeKerusakan}}</h4> 
                            </div>
                            <div class="row" id="modalRow">
                                <span id="modalInfo">Alamat Penjemputan</span>
                                <h4 id="modalEntry">{{App\User::where('id', '=', $item->user_id)->first()->alamat}}</h4>     
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div id="map{{$item->id}}"></div>
                            <script>
                            function initMap() {
                                var str1 = 'map';
                                var str2 = '{{$item->id}}';
                                var str3 = str1.concat(str2);
                                console.log(str1, str2, str3);
                                var uluru = {lat: {{$item->langitude}}, lng: {{$item->longitude}} };
                                var map = new google.maps.Map(document.getElementById(str3), {
                                zoom: 16,
                                center: uluru
                                });
                                var marker = new google.maps.Marker({
                                position: uluru,
                                map: map
                                });
                            }
                            </script>
                            <script async defer
                                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCJ1FWeNZxGvRGLzKnWpFNdMOpyqF0rQNs&callback=initMap">
                            </script>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-danger" data-dismiss="modal" id="cancel">Batalkan</button> --}}
                    <form action="{{route('order.ambilBarang')}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$item->id}}">
                        <button type="submit" class="btn btn-primary btn-block btn-flat" id="accept"><b>Ambil Barang</b></button>
                    </form>
                </div>
                </div>
            </div>
        </div>
        @endforeach
    </section>
@endsection

@section('script')
    {{-- <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCJ1FWeNZxGvRGLzKnWpFNdMOpyqF0rQNs&callback=initMap">
    </script> --}}
    {{-- <script>
    function initMap() {
        @foreach (App\Orders::where('status', '=', 1)->get() as $item)
            var mapId;
            mapId = "map+{{}}"
        @endforeach
        var uluru = {lat: {{$item->langitude}}, lng: {{$item->longitude}} };
        var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 16,
        center: uluru
        });
        var marker = new google.maps.Marker({
        position: uluru,
        map: map
        });
    }
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCJ1FWeNZxGvRGLzKnWpFNdMOpyqF0rQNs&callback=initMap">
    </script> --}}
    
    
    {{-- <script>
    var map;
    function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 38.7222524, lng: -9.139336599999979},
        zoom: 12
    });

    var props = [
        @foreach ($rooms as $room)
            coords = [  "{{ $room->lat }}", "{{ $room->lng }}" ],
            contents = [ "{{ $room->title }}" ],
        @endforeach
        ];
        for (i = 0; i < props.length; i++) {
            var prop = new google.maps.LatLng(props[i][0], props[i][1]);

            var marker = new google.maps.Marker({
                position: props.coords,
                map: map,
            });

            var infoWindow = new google.maps.InfoWindow({
            content: props.content,
            });
        }


    marker.addListener('click', function(){
        infoWindow.open(map, marker);
    });


    var transitLayer = new google.maps.TransitLayer();
    transitLayer.setMap(map);
    };
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=MY_GOOGLE_MAPS_KEY&callback=initMap" async defer></script> --}}
@endsection