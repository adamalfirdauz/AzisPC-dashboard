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
                                <td>21</td>
                                <td>Taqy Malik</td>
                                <td>Huawei Matebook X Pro</td>
                                <td>Dibersihkan</td>
                                <td>20/11/2017</td>
                                <td align="center"><button class="finished_button" type="submit" data-toggle="modal" data-target="#exampleModalCenter">Detail</button></td>
                            </tr>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            {{--  Modal  --}}

            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog" role="document" id="modal_acc">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLongTitle">Hasil Diagnosa</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-11 isian">
                                    <div class="row" id="modalRow">
                                        <span id="modalInfo">Nama Barang</span>
                                        <h3 id="modalEntry">Nama</h3>
                                    </div>
                                    <div class="row" id="modalRow">
                                        <span id="modalInfo">Keluhan</span>
                                        <h4 id="modalEntry">Rusak</h4>
                                    </div>
                                    <div class="row" id="modalRow">
                                        <span id="modalInfo">Hasil Diagnosa</span>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="tipeKerusakan" disabled>Aku isinya</textarea>
                                    </div>        
                                    <div class="row" id="modalRow">
                                        <span id="modalInfo">Harga</span>
                                        <h4 id="modalEntry">Rp.</h4>
                                    </div>                             
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            {{-- <form action="{{route('order.ambilBarang')}}" method="post"> --}}
                                <input type="hidden" name="id" value="">
                                <button type="submit" class="btn btn-primary btn-block" id="accept"><b>Barang Sudah Diambil</b></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection