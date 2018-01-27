<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
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
        <li class="active">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              {{--  <i class="fa fa-angle-left pull-right"></i>  --}}
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Manage Staff</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('staff') }}"><i class="fa fa-circle-o"></i> Activity</a></li>
            <li><a href="{{ route('addStaff') }}"><i class="fa fa-circle-o"></i> Add</a></li>
            <li><a href="{{ route('listStaff') }}"><i class="fa fa-circle-o"></i> List Staff</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Update</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Delete</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Order</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Overview</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Waiting List</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Accepted List</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Working</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Finish</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Archives</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>