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
                    <div class="box-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pemilik</th>
                                <th>Jenis / Nama Barang</th>
                                <th>Biaya</th>
                                <th>Tanggal Selesai</th>
                                <th>Kode Service</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 0;
                            @endphp
                            @foreach (App\Orders::where('status', '=', 7)->orderBy('dateIn', 'desc')->get() as $item)
                            @php
                                $user = App\User::where('id', '=', $item->user_id)->first();
                                $dateSelesai = new DateTime(date($item->dateSelesai));
                                // $now = new DateTime();
                                // $remain = $deadline->diff($now)->format("%d");
                            @endphp
                            <tr>
                                <td>{{$no+=1}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$item->nama}}</td>
                                <td>Rp {{$item->harga}},-</td>
                                <td>{{$dateSelesai->format("d M Y")}}</td>
                                <td>{{$item->kodeOrder}}</td>
                                <td align="center"><button class="finished_button" type="submit" data-toggle="modal" data-target="#exampleModalCenter{{$item->id}}">Detail</button></td>
                            </tr>
                            {{--  Modal  --}}
                            <div class="modal fade" id="exampleModalCenter{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                        <span id="modalInfo">Keluhan</span>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="tipeKerusakan" disabled value="">{{$item->keluhan}}</textarea>
                                                    </div>
                                                    <div class="row" id="modalRow">
                                                        <span id="modalInfo">Hasil Diagnosa</span>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="tipeKerusakan" disabled value="">{{$item->tipeKerusakan}}</textarea>
                                                    </div>
                                                    <div class="row" id="modalRow">
                                                        <span id="modalInfo">Tanggal Selesai</span>
                                                        <input class="form-control" id="exampleFormControlTextarea1" rows="1" name="tipeKerusakan" disabled value="{{$dateSelesai->format("d M Y")}}"></input>
                                                    </div>
                                                    <div class="row" id="modalRow">
                                                        <span id="modalInfo">Biaya</span>
                                                        <input class="form-control" id="exampleFormControlTextarea1" rows="1" name="tipeKerusakan" disabled value="Rp {{$item->harga}},-"></input>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{route('order.barangKeluar')}}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="id" value="{{$item->id}}">
                                                <button type="submit" class="btn btn-primary btn-block" id="accept"><b>Barang Sudah Diambil</b></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- End Modal --}}
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