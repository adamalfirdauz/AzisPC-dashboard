@extends('templates.dashboard')

@section('content')
    <section class="content-header">
        <h1>
            Arsip - Daftar Service yang Telah Selesai.
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
                                <th>Status Garansi</th>
                                <th>Kode Service</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 0;
                            @endphp
                            @foreach (App\Orders::where('status', '=', 8)->orderBy('dateOut', 'desc')->get() as $item)
                            <tr>
                                @php
                                    $user = App\User::where('id', '=', $item->user_id)->first();
                                    $date = new DateTime($item->dateOut);
                                    // $now = new DateTime();
                                    // $remain = $deadline->diff($now)->format("%d");
                                @endphp
                                <td>{{$no+=1}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$item->nama}}</td>
                                <td>{{$date->format("d M Y")}}</td>
                                <td>Masih Berlaku</td>
                                <td>{{$item->kodeOrder}}</td>
                                <td><button type="button" class="btn btn-primary" id="confirmation" data-toggle="modal" data-target="#exampleModalCenter{{$item->id}}">Detail</button></td>
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
                                                    <div class="row" id="modalRow">
                                                        <span id="modalInfo">Waktu Pengajuan Service</span>
                                                        <input class="form-control" id="exampleFormControlTextarea1" rows="1" name="tipeKerusakan" disabled value="{{$item->dateIn}}"></input>
                                                    </div>
                                                    <div class="row" id="modalRow">
                                                        <span id="modalInfo">Waktu Barang diterima/diambil oleh Pegawai</span>
                                                        <input class="form-control" id="exampleFormControlTextarea1" rows="1" name="tipeKerusakan" disabled value="{{$item->datePenjemputan}}"></input>
                                                    </div>
                                                    <div class="row" id="modalRow">
                                                        <span id="modalInfo">Waktu Hasil Diagnosa</span>
                                                        <input class="form-control" id="exampleFormControlTextarea1" rows="1" name="tipeKerusakan" disabled value="{{$item->dateDiagnosa}}"></input>
                                                    </div>
                                                    <div class="row" id="modalRow">
                                                        <span id="modalInfo">Waktu Mulai Pengerjaan</span>
                                                        <input class="form-control" id="exampleFormControlTextarea1" rows="1" name="tipeKerusakan" disabled value="{{$item->dateMulaiReparasi}}"></input>
                                                    </div>
                                                    <div class="row" id="modalRow">
                                                        <span id="modalInfo">Waktu Pengerjaan Selesai</span>
                                                        <input class="form-control" id="exampleFormControlTextarea1" rows="1" name="tipeKerusakan" disabled value="{{$item->dateSelesai}}"></input>
                                                    </div>
                                                    <div class="row" id="modalRow">
                                                        <span id="modalInfo">Waktu Barang Dikembalikan</span>
                                                        <input class="form-control" id="exampleFormControlTextarea1" rows="1" name="tipeKerusakan" disabled value="{{$item->dateOut}}"></input>
                                                    </div>
                                                    <div class="row" id="modalRow">
                                                        <span id="modalInfo">Lama Pengerjaan</span>
                                                        <input class="form-control" id="exampleFormControlTextarea1" rows="1" name="tipeKerusakan" disabled value="{{$item->durasi}}"></input>
                                                    </div>
                                                    <div class="row" id="modalRow">
                                                        <span id="modalInfo">Keluhan</span>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="tipeKerusakan" disabled value="">{{$item->keluhan}}</textarea>
                                                    </div>
                                                    <div class="row" id="modalRow">
                                                        <span id="modalInfo">Hasil Diagnosa</span>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="tipeKerusakan" disabled value="">{{$item->tipeKerusakan}}</textarea>
                                                    </div>
                                                    <div class="row" id="modalRow">
                                                        <span id="modalInfo">Biaya</span>
                                                        <input class="form-control" id="exampleFormControlTextarea1" rows="1" name="tipeKerusakan" disabled value="Rp {{$item->harga}},-"></input>
                                                    </div>
                                                </div>
                                            </div>
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