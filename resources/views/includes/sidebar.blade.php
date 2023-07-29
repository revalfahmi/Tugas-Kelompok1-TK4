<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ route('dashboard') }}"><i class
                        ="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class="menu-title">Hak Akses</li><!-- /.menu-title -->
                <li class="">
                    <a href="{{ route('hak-akses.index') }}"> <i class="menu-icon fa fa-list"></i>Lihat Hak Akses</a>
                </li>
                <li class="">
                    <a href="{{ route('hak-akses.create') }}"> <i class="menu-icon fa fa-plus"></i>Tambah Hak Akses</a>
                </li>
                <li class="menu-title">Pengguna</li><!-- /.menu-title -->
                <li class="">
                    <a href="{{ route('pengguna.index') }}"> <i class="menu-icon fa fa-list"></i>Lihat Pengguna</a>
                </li>
                <li class="">
                    <a href="{{ route('pengguna.create') }}"> <i class="menu-icon fa fa-plus"></i>Tambah Pengguna</a>
                </li>
                <li class="menu-title">Barang</li><!-- /.menu-title -->
                <li class="">
                    <a href="{{ route('barang.index') }}"> <i class="menu-icon fa fa-list"></i>Lihat Barang</a>
                </li>
                <li class="">
                    <a href="{{ route('barang.create') }}"> <i class="menu-icon fa fa-plus"></i>Tambah Barang</a>
                </li>

                <li class="menu-title">Pembelian</li><!-- /.menu-title -->
                <li class="">
                    <a href="#"> <i class="menu-icon fa fa-list"></i>Lihat Pembelian</a>
                </li>
                <li class="">
                    <a href="#"> <i class="menu-icon fa fa-plus"></i>Tambah Pembelian</a>
                </li>

                <li class="menu-title">Penjualan</li><!-- /.menu-title -->
                <li class="">
                    <a href="{{ route('penjualan.index') }}"> <i class="menu-icon fa fa-list"></i>Lihat Penjualan</a>
                </li>
                <li class="">
                    <a href="{{ route('penjualan.create') }}"> <i class="menu-icon fa fa-plus"></i>Tambah Penjualan</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
<!-- /#left-panel -->