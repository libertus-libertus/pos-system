<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Alexander Pierce</p>
        <a><i class="fa fa-inbox"></i> superadmin@gmail.com</a>
      </div>
    </div>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN MENU</li>
      <li class="">
        <a href="{{ url('/') }}">
          <i class="fa fa-dashboard"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="">
        <a href="{{ url('/supplier') }}">
          <i class="fa fa-user-circle"></i>
          <span>Suppliers</span>
        </a>
      </li>
      <li class="">
        <a href="{{ url('/customer') }}">
          <i class="fa fa-users"></i>
          <span>Customers</span>
        </a>
      </li>
      <li class="">
        <a href="{{ url('/category') }}">
          <i class="fa fa-cubes"></i>
          <span>Categories</span>
        </a>
      </li>
      <li class="">
        <a href="{{ url('/product') }}">
          <i class="fa fa-cube"></i>
          <span>Products</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-pie-chart"></i>
          <span>Transactions</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> Sales</a></li>
          <li><a href="{{ url('/purchase') }}"><i class="fa fa-circle-o"></i> Stock In / Purchases</a></li>
        </ul>
      </li>
      <li class="header">REPORTS</li>
      <li class="">
        <a href="{{ url('/') }}">
          <i class="fa fa-bar-chart"></i>
          <span>Reports</span>
        </a>
      </li>
      <li class="header">SETTINGS</li>
      <li class="">
        <a href="{{ url('/') }}">
          <i class="fa fa-user-plus"></i>
          <span>Users / Employees</span>
        </a>
      </li>
      <li class="">
        <a href="{{ url('/') }}">
          <i class="fa fa-gears"></i>
          <span>Configuration</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
