@extends('templates.dashboard')

@section('content')
    <section class="content-header">
        <h1>
            Daftar Diagnosa
        </h1>
    </section>
    <section class="content">
        @foreach (App\Orders::whereBetween('status', [2, 5])->get() as $item)
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="pict">
                                <img src="{{asset('storage/'.$item->foto)}}" height="80">
                                </div>
                            </div>
                            <div class="text col-sm-7">
                                <h3>{{$item->nama}}</h3>
                                <p id="date">{{$item->created_at->diffForHumans()}}</p>
                                <p id="productName">{{$item->nama}}</p>
                            </div>
                            <div class="buttonConf col-sm-3">
                                @if ($item->status == 2)
                                    <button type="button" class="btn btn-primary" id="confirmation" data-toggle="modal" data-target="#exampleModalCenter{{$item->id}}">Konfirmasi</button>
                                @elseif ($item->status == 3)
                                    <button type="button" class="btn" id="confirmation" disabled>Menunggu Konfirmasi</button>
                                @elseif ($item->status == 4)
                                    <form action="{{route('order.hapusOrder')}}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{$item->id}}" name="id">
                                        <button type="button" class="btn btn-danger" id="confirmation" disabled>Pelanggan Membatalkan</button>
                                        <button type="submit" class="btn btn-danger fa fa-trash-o" id="delete_button"></button>
                                    </form>
                                @else
                                    <form action="{{route('order.mulaiKerjakan')}}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{$item->id}}" name="id">
                                        <button type="submit" class="btn btn-success" id="confirmation">Kerjakan Sekarang</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                                    <span id="modalInfo">Pemilik</span>
                                    <h3 id="modalEntry">{{App\User::where('id', '=', $item->user_id)->first()->name}}</h3>
                                </div>
                                <form class="form_acc" action="{{route('order.diagnosa')}}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="row" id="modalRow">
                                        <span id="modalInfo">Lama Pengerjaan</span>
                                        <input class="form-control" type="number" placeholder="Hitungan Hari" id="formHari" name="durasi"/>
                                        <label>Hari</label>
                                    </div>
                                    <div class="row" id="modalRow">
                                        <span id="modalInfo">Harga</span>
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
    </section>
@endsection