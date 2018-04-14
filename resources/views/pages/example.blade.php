@extends('templates.dashboard')

@section('content')
    <section class="content-header">
        <h1>
          Dashboard
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="callout" id="callout-dash">
                    {{--  <div class="panel-body" id="homePanel">  --}}
                        <b>Selamat Datang di Computer Store</b>
                    {{--  </div>  --}}
                </div>
                <div class="col-md-4">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>150</h3>
                
                            <p>Review</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-commenting-o"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>150</h3>
                
                            <p>Waiting Service</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-gears"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>150</h3>
                
                            <p>Finished Service</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-laptop"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            {{--  <div class="col-md-3">
                <div class="panel panel-default" style="height: 250px">
                    <div class="panel-body">
                        This is some text within a card block.
                    </div>
                </div>
            </div>  --}}
            <div class="col-md-9"></div>
            {{--  <div class="col-md-3">
                <div class="panel panel-default" style="height: 250px">
                    <div class="panel-body">
                        <div id="calendar">

                        </div>
                    </div>
                </div>
            </div>
        </div>  --}}
    </section>
    <script type="application/javascript">
        $(document).ready(function () {
            $("#calendar").zabuto_calendar({language: "en"});
        });
    </script>
@endsection