@extends('templates.dashboard')

@section('content')
    <section class="content-header">
        <h1>
            Pekerjaan Selesai
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="row">
                        <div class="col-sm-1">
                            <div>
                                <small>No. Service</small>
                            </div>
                            <div>
                                <h1>1</h1>
                            </div> 
                        </div>
                        <div class="col-sm-2">
                            <div class="pict">
                                <img src="/assets/dist/img/gambar.jpg" height="80">
                            </div>
                        </div>
                        <div class="text col-sm-6">
                            <h3>Ibro Ibrahim</h3>
                            <p id="date">1 Hari yang lalu, 08.30</p>
                            <p id="productName">Laptop ACER (Awas CEpat Rusak)</p>
                        </div>
                        <div class="buttonConf col-sm-2">
                            <button type="button" class="btn btn-primary" id="confirmation" data-toggle="modal" data-target="#exampleModalCenter">Detail</button>
                        </div>
                    </div>
                </div>
            </div>
            {{--  Modal  --}}

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
                            <button type="button" class="btn btn-success" style="width:100px" id="accept">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection