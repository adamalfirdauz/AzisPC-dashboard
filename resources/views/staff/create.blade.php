@extends('templates.dashboard')

@section('content')
    <section class="content-header">
        <h1>
          Staff
          {{--  <small>Control panel</small>  --}}
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Staff</a></li>
          <li class="active">Add new</li>
        </ol>
    </section>
    <section class="content">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Tambah Pegawai</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form class="form-horizontal" action="{{ route('staff.create') }}" method="post">
                            <div class="box-body">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} has-feedback">
                                    <label class="col-sm-3 control-label">Nama</label>
                                    <div class="col-sm-8">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nama Lengkap" required autofocus>
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-1"> </div>
                                    {{--  <span class="glyphicon glyphicon-user form-control-feedback"></span>  --}}
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                                    <label class="col-sm-3 control-label">Email</label>
                                    <div class="col-sm-8">
                                        <input id="email" name="email" type="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-1"> </div>
                                    {{--  <span class="glyphicon glyphicon-envelope form-control-feedback"></span>  --}}
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                                    <label class="col-sm-3 control-label">Password</label>
                                    <div class="col-sm-8">
                                        <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-1"> </div>
                                    {{--  <span class="glyphicon glyphicon-lock form-control-feedback"></span>  --}}
                                </div>
                                <div class="form-group has-feedback">
                                    <label class="col-sm-3 control-label">Retype Password</label>
                                    <div class="col-sm-8">
                                        <input id="password-confirm" type="password" class="form-control" placeholder="Retype password" name="password_confirmation" required>
                                    </div>
                                    {{--  <span class="glyphicon glyphicon-log-in form-control-feedback"></span>  --}}
                                </div>
                                <input type="hidden" name="status" id="status" value="staff">
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                            {{--  <button type="submit" class="btn btn-default">Cancel</button>  --}}
                                <div class="col-md-2 col-md-offset-9">
                                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                                </div>
                            </div>
                            <!-- /.box-footer -->
                        </form>
                    </div>
                </div>
            </div>
    </section>
@endsection