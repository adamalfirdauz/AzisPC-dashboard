@extends('templates.dashboard')

@section('content')
    <section class="content-header">
        <h1>
            Arsip Pekerjaan Selesai
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    {{--  <div class="box-header">
                      <h3 class="box-title">Archive Finished Work</h3>
                    </div>  --}}
                    <!-- /.box-header -->
                    <div class="box-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pemilik</th>
                                <th>Laptop</th>
                                <th>Jenis Service</th>
                                <th>Tanggal Selesai</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Ibro Ibrohim</td>
                                <td>Asus ROG GTX200</td>
                                <td>Bongkar Pasang</td>
                                <td>20/11/2017</td>
                                <td align="center"><button class="archive-detail" type="submit" data-toggle="modal" data-target="#exampleModalCenter">Detail</button></td>
                            </tr>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                        <img class="d-block w-100" style="height: 400px" src="{{asset('assets/dist/img/gambar.jpg')}}" alt="First slide" style="width:500px">
                                                        {{-- <img class="d-block w-100" style="height: 400px" src="{{asset('storage/'.$item->foto)}}" alt="First slide" style="width:500px"> --}}
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="row" id="modalRow">
                                            <span id="modalInfo">Keluhan</span>
                                            <h5 id="modalEntry">Rusak karena kecoa</h5> 
                                            {{-- <h5 id="modalEntry">{{$item->keluhan}}</h5>  --}}
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
                                            <h5 id="modalEntry">Bad Sector</h5>
                                            {{-- <h5 id="modalEntry">{{$item->tipeKerusakan}}</h5>  --}}
                                        </div>         
                                        <div class="row" id="modalRow">
                                            <span id="modalInfo">Alamat Pemilik</span>
                                            <h5 id="modalEntry">Disini Aja</h5>     
                                            {{-- <h5 id="modalEntry">{{App\User::where('id', '=', $item->user_id)->first()->alamat}}</h5>      --}}
                                        </div>
                                        <div class="row" id="modalRow">
                                            <span id="modalInfo">Harga Service</span>
                                            <h4 id="modalEntry">Rp.</h4>
                                        </div>       
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection