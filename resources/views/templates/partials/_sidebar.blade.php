<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{$user->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      {{--  <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>  --}}
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li @if ($active == 0) class="active" @endif>
          <a href="{{ route('dashboard') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              {{--  <i class="fa fa-angle-left pull-right"></i>  --}}
            </span>
          </a>
        </li>
        @if (Auth::user()->status == 1)
        <li class="treeview @if($active>=1 and $active<=5) active @endif">
          <a href="#">
            <i class="fa fa-pie-chart "></i>
            <span>Manage Staff</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            {{--  <li @if ($active == 1) class="active" @endif><a href="{{ route('staff.index') }}"><i class="fa fa-circle-o"></i> Activity</a></li>  --}}
            <li @if ($active == 2) class="active" @endif><a href="{{ route('staff.add') }}"><i class="fa fa-circle-o"></i> Add</a></li>
            <li @if ($active == 3) class="active" @endif><a href="{{ route('staff.list') }}"><i class="fa fa-circle-o"></i> List Staff</a></li>
            {{--  <li><a href="#"><i class="fa fa-circle-o"></i> Update</a></li>  --}}
            {{--  <li><a href="#"><i class="fa fa-circle-o"></i> Delete</a></li>  --}}
          </ul>
        </li>
        @endif
        <li class="treeview @if($active>=11 and $active<=16) active @endif">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Order</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li @if ($active == 11) class="active" @endif><a href="{{ route('order.index') }}"><i class="fa fa-circle-o"></i> Overview</a></li>
            <li @if ($active == 12) class="active" @endif><a href="{{ route('order.waiting') }}"><i class="fa fa-circle-o"></i> Waiting List</a></li>
            <li @if ($active == 13) class="active" @endif><a href="{{ route('order.accepted') }}"><i class="fa fa-circle-o"></i> Accepted List</a></li>
            <li @if ($active == 14) class="active" @endif><a href="{{ route('order.working') }}"><i class="fa fa-circle-o"></i> Working</a></li>
            <li @if ($active == 15) class="active" @endif><a href="{{ route('order.finish') }}"><i class="fa fa-circle-o"></i> Finish</a></li>
            <li @if ($active == 16) class="active" @endif><a href="{{ route('order.archives') }}"><i class="fa fa-circle-o"></i> Archives</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>