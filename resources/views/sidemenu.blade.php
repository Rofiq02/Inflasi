<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">

  <!-- Sidebar user panel (optional) -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="{{ Auth::user()->avatar =="" ? asset('img/avatar5.png') : asset('img/'.Auth::user()->avatar) }}" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p>{{ Auth::user() !="" ? Auth::user()->name : "" }}</p>
      <!-- Status -->
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
  </div>

  <!-- search form (Optional) -->
  <form action="#" method="get" class="sidebar-form">
    <div class="input-group">
      <input type="text" name="q" class="form-control" placeholder="Search...">
      <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
    </div>
  </form>
  <!-- /.search form -->

  <!-- Sidebar Menu -->
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">HEADER</li>
    <!-- Optionally, you can add icons to the links -->
    <li class="@yield('ac-dash')"><a href="{{ url('/dashboard') }}"><i class="fa fa-flash "></i><span>Inflasi Terkini</span></a></li>
    <li class="treeview @yield('ac-inflasi')">
      <a href="{{ url('inflasi_bulanan') }}"><i class="fa fa-pie-chart"></i> <span>Data Series</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ url('inflasi_bulanan') }}">Bulan</a></li>
        <li><a href="{{ url('/inflasi_YoY') }}">YoY</a></li>
        <li><a href="{{ url('/tahun_kalender') }}">Tahun Kalender</a></li>
      </ul>
    </li>   
    <li class="treeview @yield('ac-kategori')">
      <a href="{{ url('kategori') }}"><i class="fa fa-th-large"></i> <span>Kelompok Pengeluaran</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ url('kategori') }}">Pengeluaran</a></li>
        <li><a href="{{ url('inflasi_kategori') }}">Inflasi Pengeluaran</a></li>
      </ul>
    </li>
    <li class="treeview @yield('ac-Item')">
      <a href="{{ url('item') }}"><i class="fa fa-th-list"></i> <span>Data Komoditas</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ url('item') }}">Komoditas</a></li>
        <li><a href="{{ url('detail_item') }}">Inflasi Komoditas</a></li>
      </ul>
    </li>
    <!--<li class="@yield('ac-dash')"><a href="{{ url('/bulan') }}"><i class="fa fa-certificate "></i><span>Bulan</span></a></li>-->
    
      <!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->
</aside>
