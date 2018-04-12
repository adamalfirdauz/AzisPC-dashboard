@extends('templates.dashboard')

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
                            <div class="text col-sm-9">
                                <h3>{{$item->nama}}</h3>
                                <p id="date">{{$item->created_at}}</p>
                                <p id="productName">{{$item->nama}}</p>
                                <button type="button" class="btn btn-primary pull-right" id="detailbtn" data-toggle="modal" data-target="#exampleModalCenter{{$item->id}}">Detail</button>
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
                                        <li data-target="#carouselImage" data-slide-to="1"></li>
                                        <li data-target="#carouselImage" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="item active">
                                            <img class="d-block w-100" src="/assets/dist/img/gambar.jpg" alt="First slide" style="width:500px">
                                        </div>
                                        <div class="item">
                                            <img class="d-block w-100" src="/assets/dist/img/photo1.png" alt="Second slide" style="width:500px">
                                        </div>
                                        <div class="item">
                                            <img class="d-block w-100" src="/assets/dist/img/photo2.png" alt="Third slide" style="width:500px">
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="carouselImage" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="carouselImage" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row" id="modalRow">
                                <span id="modalInfo">Pemilik</span>
                                <h3 id="modalEntry">Ibro Ibrahim</h3>
                            </div>
                            <div class="row" id="modalRow">
                                <span id="modalInfo">Keluhan</span>
                                <h4 id="modalEntry">Layar laptop menjadi hitam legam</h4> 
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
                                <span id="modalInfo">Jenis Servis</span>
                                <h4 id="modalEntry">Ganti LCD</h4> 
                            </div>         
                            <div class="row" id="modalRow">
                                <span id="modalInfo">Alamat Penjemputan</span>
                                <h4 id="modalEntry">Jalan Babakan Lebak No.8 RT.10, Kabupaten Bogor</h4>     
                            </div>                    
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