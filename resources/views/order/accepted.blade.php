@extends('templates.dashboard')

@section('content')
    <section class="content-header">
        <h1>
            Daftar Diagnosa
        </h1>
    </section>
    <section class="content">
        @foreach (App\Orders::where('status', '=', 2)->get() as $item)
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
                                <p id="date">{{$item->created_at}}</p>
                                <p id="productName">{{$item->nama}}</p>
                            </div>
                            <div class="buttonConf col-sm-3">
                                <button type="button" class="btn btn-primary" id="confirmation" data-toggle="modal" data-target="#exampleModalCenter{{$item->id}}">Konfirmasi</button>
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
                                <form class="form_acc" action="">
                                    <div class="row" id="modalRow">
                                        <span id="modalInfo">Lama Pengerjaan</span>
                                        <input class="form-control" type="number" placeholder="Hitungan Hari" id="formHari">
                                        <label>Hari</label>
                                    </div>
                                    <div class="row" id="modalRow">
                                        <span id="modalInfo">Harga</span>
                                        <input class="form-control" type="number" placeholder="Rupiah" id="formHari">
                                    </div>
                                    <div class="row" id="modalRow">
                                        <span id="modalInfo">Tipe Kerusakan</span>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
                                    </div>                             
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-danger" data-dismiss="modal" id="cancel">Batalkan</button> --}}
                        <form action="{{route('order.ambilBarang')}}" method="post">
                            {{ csrf_field() }}
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