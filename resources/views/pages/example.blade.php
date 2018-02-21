@extends('templates.dashboard')

@section('content')
    <section class="content-header">
        <h1>
          Dashboard
          <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <h1>
                    {{ $user->status }}
                </h1>
                <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" alt="ini foto">
                <img src="{{ asset('storage/'.Auth::user()->foto)}}" alt="ini foto" width="120px">
                <p>{{ asset('storage/'.Auth::user()->foto)}}</p>
            </div>
        </div>
    </section>
@endsection