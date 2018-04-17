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
                                <td align="center"><button class="archive-detail" type="submit">Detail</button></td>
                            </tr>
                            <tr>
                                <td>21</td>
                                <td>Taqy Malik</td>
                                <td>Huawei Matebook X Pro</td>
                                <td>Dibersihkan</td>
                                <td>20/11/2017</td>
                                <td align="center"><button class="archive-detail" type="submit">Detail</button></td>
                            </tr>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>
@endsection