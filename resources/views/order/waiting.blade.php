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
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pemilik</th>
                                <th>Tanggal Masuk</th>
                                <th>Kode Service</th>
                                {{-- <th>Deadline</th> --}}
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 0;
                            @endphp
                            @foreach (App\Orders::where('status', '=', 1)->orderBy('dateIn', 'desc')->get() as $item)
                            <tr>
                                @php
                                    $user = App\User::where('id', '=', $item->user_id)->first();
                                    $deadline = new DateTime(date("Y-m-d H:i:s",strtotime(date("Y-m-d", strtotime($item->dateIn)))));
                                    // $now = new DateTime();
                                    // $remain = $deadline->diff($now)->format("%d");
                                    $dateIn = new DateTime(date($item->dateIn), new DateTimeZone('Asia/Jakarta'));
                                @endphp
                                <td>{{$no+=1}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$dateIn->format("d M Y, H:i:s")}}</td>
                                <td>{{$item->kodeOrder}}</td>
                                {{-- @if ($remain == 0)
                                <td style="background:#f9b9b9">0 Hari Lagi</td>
                                @else
                                <td>{{$remain}} Hari Lagi.</td>
                                @endif --}}
                                <td align="center"><button class="finished_button" type="submit" data-toggle="modal" data-target="#exampleModalCenter{{$item->id}}">Detail</button></td>
                            </tr>
                            {{--  Modal  --}}
                            <div class="modal fade" id="exampleModalCenter{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document" id="modal_acc">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="exampleModalLongTitle">Daftar Tunggu</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-11 isian">
                                                    <div class="row" id="modalRow">
                                                        <span id="modalInfo">Nama Pemilik</span>
                                                        <input class="form-control" disabled value="{{App\User::where('id', '=', $item->user_id)->first()->name}}"></input>
                                                    </div>
                                                    <div class="row" id="modalRow">
                                                        <span id="modalInfo">Nama Barang</span>
                                                        <input class="form-control" id="exampleFormControlTextarea1" rows="1" name="tipeKerusakan" disabled value="{{$item->nama}}"></input>
                                                    </div>
                                                    <div class="row" id="modalRow">
                                                        <span id="modalInfo">Kode Service</span>
                                                        <input class="form-control" disabled value="{{$item->kodeOrder}}"></input>
                                                    </div>
                                                    <div class="row" id="modalRow">
                                                        <span id="modalInfo">Keluhan</span>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="tipeKerusakan" disabled>{{$item->keluhan}}</textarea>
                                                    </div>  
                                                    <div class="row" id="modalRow">
                                                        <span id="modalInfo">Foto Barang</span>
                                                        <img id="modalEntry" src="{{asset('storage/'.$item->foto)}}" height="300">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
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
                        </tbody>
                      </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
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