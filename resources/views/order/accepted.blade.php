@extends('templates.dashboard')

@section('content')
    <section class="content-header">
        <h1>
            Daftar Diagnosa
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
                                <th>Nama Barang</th>
                                <th>Tanggal Diambil</th>
                                <th>Kode Service</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 0;
                            @endphp
                            @foreach (App\Orders::whereBetween('status', [2, 5])->orderBy('datePenjemputan', 'desc')->get() as $item)
                            <tr>
                                @php
                                    $user = App\User::where('id', '=', $item->user_id)->first();
                                    $date = new DateTime($item->datePenjemputan);
                                    // $now = new DateTime();
                                    // $remain = $deadline->diff($now)->format("%d");
                                @endphp
                                <td>{{$no+=1}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$item->nama}}</td>
                                <td>{{$date->format("d M Y, H:i:s")}}</td>
                                <td>{{$item->kodeOrder}}</td>
                                @if ($item->status == 2)
                                    <td><button type="button" class="btn btn-primary" id="confirmation" data-toggle="modal" data-target="#exampleModalCenter{{$item->id}}">Konfirmasi</button></td>
                                @elseif ($item->status == 3)
                                    <td><button type="button" class="btn" id="confirmation" disabled>Menunggu Konfirmasi</button></td>
                                @elseif ($item->status == 4)
                                    <td>
                                        <form action="{{route('order.hapusOrder')}}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" value="{{$item->id}}" name="id">
                                            <button type="button" class="btn btn-danger" id="confirmation" disabled>Pelanggan Membatalkan</button>
                                            <button type="submit" class="btn btn-danger fa fa-trash-o" id="delete_button"></button>
                                        </form>
                                    </td>
                                @else
                                    <td>
                                        <form action="{{route('order.mulaiKerjakan')}}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" value="{{$item->id}}" name="id">
                                            <button type="submit" class="btn btn-success" id="confirmation">Kerjakan Sekarang</button>
                                        </form>
                                    </td>
                                @endif
                                {{-- @if ($remain == 0)
                                <td style="background:#f9b9b9">0 Hari Lagi</td>
                                @else
                                <td>{{$remain}} Hari Lagi.</td>
                                @endif
                                <td align="center"><button class="finished_button" type="submit" data-toggle="modal" data-target="#exampleModalCenter{{$item->id}}">Detail</button></td> --}}
                            </tr>
                            {{--  Modal  --}}
                            <div class="modal fade" id="exampleModalCenter{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document" id="modal_acc">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="exampleModalLongTitle">Isi Hasil Diagnosa</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-11 isian">
                                                    <div class="row" id="modalRow">
                                                        <span id="modalInfo">Nama Pemilik</span>
                                                        <input class="form-control" id="exampleFormControlTextarea1" rows="1" name="tipeKerusakan" disabled value="{{$user->name}}"></input>
                                                    </div>
                                                    <div class="row" id="modalRow">
                                                        <span id="modalInfo">Nama Barang</span>
                                                        <input class="form-control" id="exampleFormControlTextarea1" rows="1" name="tipeKerusakan" disabled value="{{$item->nama}}"></input>
                                                    </div>
                                                    <div class="row" id="modalRow">
                                                        <span id="modalInfo">Kode Service</span>
                                                        <input class="form-control" id="exampleFormControlTextarea1" rows="1" name="tipeKerusakan" disabled value="{{$item->kodeOrder}}"></input>
                                                    </div>
                                                    <form class="form_acc" action="{{route('order.diagnosa')}}" method="POST">
                                                        {{ csrf_field() }}
                                                        <div class="row" id="modalRow">
                                                            <span id="modalInfo">Lama Pengerjaan <b>(Hari)</b></span>
                                                            <input class="form-control" type="number" placeholder="Hitungan Hari" id="formHari" name="durasi"/>
                                                        </div>
                                                        <div class="row" id="modalRow">
                                                            <span id="modalInfo">Harga <b>(Rp)</b></span>
                                                            <input class="form-control" type="text" placeholder="Rupiah" id="formHari" name="harga" onkeyup="this.value=tambah_comma(this.value);">
                                                        </div>  
                                                        <div class="row" id="modalRow">
                                                            <span id="modalInfo">Hasil Diagnosa</span>
                                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="tipeKerusakan"></textarea>
                                                        </div>                             
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            {{-- <form action="{{route('order.ambilBarang')}}" method="post"> --}}
                                                <input type="hidden" name="id" value="{{$item->id}}">
                                                <button type="submit" class="btn btn-primary btn-block" id="accept"><b>Konfirmasi Hasil</b></button>
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