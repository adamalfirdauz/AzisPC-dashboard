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
                    <div class="box-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pemilik</th>
                                <th>Jenis Barang</th>
                                <th>Biaya Service</th>
                                <th>Deadline</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 0;
                            @endphp
                            @foreach (App\Orders::where('status', '=', 6)->orderBy('dateIn', 'desc')->get() as $item)
                            <tr>
                                @php
                                    $user = App\User::where('id', '=', $item->user_id)->first();
                                    $deadline = new DateTime(date("Y-m-d",strtotime(date("Y-m-d", strtotime($item->dateMulaiReparasi)) . " +".$item->durasi."days")));
                                    $now = new DateTime();
                                    $remain = $deadline->diff($now)->format("%d");
                                @endphp
                                <td>{{$no+=1}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$item->nama}}</td>
                                <td>Rp {{$item->harga}},-</td>
                                @if ($remain == 0)
                                <td style="background:#f9b9b9">0 Hari Lagi</td>
                                @else
                                <td>{{$remain}} Hari Lagi.</td>
                                @endif
                                <td align="center"><button class="finished_button" type="submit" data-toggle="modal" data-target="#exampleModalCenter{{$item->id}}">Detail</button></td>
                            </tr>
                            {{--  Modal  --}}
                            <div class="modal fade" id="exampleModalCenter{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                    <div class="row" id="modalRow">
                                                        <span id="modalInfo">Nama Barang</span>
                                                        <input class="form-control" id="exampleFormControlTextarea1" rows="1" name="tipeKerusakan" disabled value="{{$item->nama}}"></input>
                                                    </div>
                                                    <div class="row" id="modalRow">
                                                        <span id="modalInfo">Biaya</span>
                                                        <input class="form-control" id="exampleFormControlTextarea1" rows="1" name="tipeKerusakan" disabled value="Rp {{$item->harga}},-"></input>
                                                    </div>  
                                                    <div class="row" id="modalRow">
                                                        <span id="modalInfo">Keluhan</span>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="tipeKerusakan" disabled>{{$item->keluhan}}</textarea>
                                                    </div>
                                                    <div class="row" id="modalRow">
                                                        <span id="modalInfo">Hasil Diagnosa</span>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="tipeKerusakan" disabled>{{$item->tipeKerusakan}}</textarea>
                                                    </div>
                                                    <div class="row" id="modalRow">
                                                        @php
                                                            $tanggalMulai = new DateTime($item->dateMulaiReparasi);
                                                        @endphp
                                                        <span id="modalInfo">Tanggal Mulai Service</span>
                                                        <input class="form-control" id="exampleFormControlTextarea1" rows="1" name="tipeKerusakan" disabled value="{{$tanggalMulai->format("d M Y")}}"></input>
                                                    </div>
                                                    <div class="row" id="modalRow">
                                                        <span id="modalInfo">Target Selesai Service</span>
                                                        <input class="form-control" id="exampleFormControlTextarea1" rows="1" name="tipeKerusakan" disabled value="{{$deadline->format("d M Y")}}"></input>
                                                    </div>  
                                                    <div class="row" id="modalRow">
                                                        <span id="modalInfo">Foto Barang</span>
                                                        <img id="modalEntry" src="{{asset('storage/'.$item->foto)}}" height="300">
                                                    </div>
                                                    @if ($item->fotoReparasi != NULL)
                                                    <div class="row" id="modalRow">
                                                        <span id="modalInfo">Foto Reparasi</span>
                                                        <img id="modalEntry" src="{{asset('storage/'.$item->fotoReparasi)}}" height="300">
                                                    </div>
                                                    @endif
                                                    <div class="row" id="modalRow">
                                                        <span id="modalInfo">@if ($item->fotoReparasi == NULL) Tambahkan @else Ubah @endif Foto Proses Pengerjaan</span>
                                                        <form action="{{route('order.uploadFotoService')}}" method="post" enctype="multipart/form-data">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="id" value="{{$item->id}}">
                                                            <input type="file" name="fotoReparasi" accept="image/*">
                                                            <button type="submit">Upload Gambar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{route('order.selesaiDikerjakan')}}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="id" value="{{$item->id}}">
                                                <button type="submit" class="btn btn-primary btn-block" id="accept"><b>Pekerjaan Selesai</b></button>
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