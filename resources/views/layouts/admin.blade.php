<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
  
    <title>MY APPLICATION WEB</title>
    <!-- Core CSS - Include with every page -->
    <link href="{{url('admin/assets/plugins/bootstrap/bootstrap.css')}}" rel="stylesheet" />
    <link href="{{url('admin/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link href="{{url('admin/assets/plugins/pace/pace-theme-big-counter.css')}}" rel="stylesheet" />
    <link href="{{url('admin/assets/css/style.css')}}" rel="stylesheet" />
    <link href="{{url('admin/assets/css/main-style.css')}}" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <link href="{{url('admin/assets/plugins/morris/morris-0.4.3.min.css')}}" rel="stylesheet" />
   </head>
<body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                 <div class="col-lg-12">
                    <h1 class="" align="center">My Application Web</h1>
                </div>
                </div>       
            </div>
        </nav>
        <!-- end navbar top -->

        <!-- navbar side -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        <!-- user image section-->
                        <div class="user-section">
                            <div class="user-section-inner">
                                <img src="admin/assets/img/2.jpg">
                            </div>
                        <div>
                            <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                            </form>

                        </div>
                        <!--end user image section-->
                    </li>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Jabatan<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{url('/jabatan')}}">Tabel Jabatan</a>
                            </li>
                            <li>
                                <a href="{{url('/jabatan/create')}}">Tambah Jabatan</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Golongan<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{url('/golongan')}}">Tabel Golongan</a>
                            </li>
                            <li>
                                <a href="{{url('/golongan/create')}}">Tambah Golongan</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Pegawai<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{url('/pegawai')}}">Tabel Pegawai</a>
                            </li>
                            <li>
                                <a href="{{url('/pegawai/create')}}">Tambah pegawai</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>

                     <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Kategori Lembur<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{url('/kategori_lembur')}}">Tabel Kategori Lembur</a>
                            </li>
                            <li>
                                <a href="{{url('/kategori_lembur/create')}}">Tambah Kategori Lembur</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>

                     <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Lembur Pegawai<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{url('/lembur_pegawai')}}">Tabel Lembur Pegawai</a>
                            </li>
                            <li>
                                <a href="{{url('/lembur_pegawai/create')}}">Tambah Lembur Pegawai</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Tunjangan<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{url('/tunjangan')}}">Tabel Tunjangan</a>
                            </li>
                            <li>
                                <a href="{{url('/tunjangan/create')}}">Tambah Tunjangan</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>

                     <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Tunjangan Karyawan<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{url('/tunjangan_pegawai')}}">Tabel Tunjangan karyawan</a>
                            </li>
                            <li>
                                <a href="{{url('/tunjangan_pegawai/create')}}">Tambah Karyawan</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Penggajian Karyawan<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{url('/penggajian')}}">Tabel Penggajian Karyawan</a>
                            </li>
                            <li>
                                <a href="{{url('/penggajian/create')}}">Tambah Penggajian Karyawan</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>

                </div>
            </ul>
            </div>
        </nav>
        <div id="page-wrapper">
        @yield('content')
      
        </div>
        <!-- end page-wrapper -->

    
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="{{url('admin/assets/plugins/jquery-1.10.2.js')}}"></script>
    <script src="{{url('admin/assets/plugins/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{url('admin/assets/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{url('admin/assets/plugins/pace/pace.js')}}"></script>
    <script src="{{url('admin/assets/scripts/siminta.js')}}"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="{{url('admin/assets/plugins/morris/raphael-2.1.0.min.js')}}"></script>
    <script src="{{url('admin/assets/plugins/morris/morris.js')}}"></script>
    <script src="{{url('admin/assets/scripts/dashboard-demo.js')}}"></script>
</body>

</html>
