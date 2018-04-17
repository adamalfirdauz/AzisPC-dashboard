@extends('templates.dashboard')

@section('content')
    <section class="content-header">
        <h1>
           Sedang Dikerjakan
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
                                <th>Deadline</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>21</td>
                                <td>Taqy Malik</td>
                                <td>Huawei Matebook X Pro</td>
                                <td>Dibersihkan</td>
                                <td>3 Hari Lagi</td>
                                {{-- <td style="background:#f9b9b9">0 Hari Lagi</td> --}}
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
                            <h3 class="modal-title" id="exampleModalLongTitle">Sedang Dikerjakan</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-11 isian">
                                    {{ csrf_field() }}                                    
                                    <div class="row" id="modalRow">
                                        <span id="modalInfo">Nama Barang</span>
                                        <h3 id="modalEntry">Nama</h3>
                                    </div>
                                    <div class="row" id="modalRow">
                                        <span id="modalInfo">Keluhan</span>
                                        <h4 id="modalEntry">Ini Keluhan Ku</h4>
                                    </div>
                                    <div class="row" id="modalRow">
                                        <span id="modalInfo">Deadline</span>
                                        <h4 id="modalEntry">21/08/1997</h4>
                                    </div>
                                    <div class="row" id="modalRow">
                                        <span id="modalInfo">Hasil Diagnosa</span>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="tipeKerusakan" disabled>Aku isinya</textarea>
                                    </div>  
                                    <div class="row" id="modalRow">
                                        <span id="modalInfo">Foto Barang Pengguna</span>
                                        <img id="modalEntry" src="{{asset('assets/dist/img/gambar.jpg')}}" height="300">
                                    </div>                         
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            {{-- Kalo deadlinenya udah 0 ato 2 hari lagi pake yang dibawah --}}
                            {{-- <form action="{{route('order.ambilBarang')}}" method="post"> --}}
                                <input type="hidden" name="id" value="">
                                <button type="submit" class="btn btn-primary btn-block" id="accept"><b>Pekerjaan Selesai</b></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection