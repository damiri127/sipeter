<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ asset("layout_asset/assets/img/profile.jpg") }}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            POLI GIZI
                            <span class="user-level">POLI GIZI</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>
                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#edit">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                @if (Route::currentRouteName()=='dashboard_poligizi')
                    {{$dashboard_status = 'active'}}
                @else
                    {{$dashboard_status = 'inactive'}}
                @endif
                <li class="nav-item {{$dashboard_status}}">
                    <a  href="{{route('dashboard_poligizi')}}" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Data Kunjungan</h4>
                </li>
                @if (Route::currentRouteName()=='data_kunjunganpoligizi')
                <li class="nav-item active">
                @else
                <li class="nav-item ">
                @endif
                    <a href="{{route('data_kunjunganpoligizi')}}">
                        <i class="fas fa-user"></i>
                        <p>Data Kunjungan Pasien</p>
                    </a>
                </li>
                {{-- @if (Route::currentRouteName()=='index_arsippengunjung')
                <li class="nav-item active">
                @else --}}
                <li class="nav-item">
                {{-- @endif --}}
                    <a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                        <i class="flaticon-archive"></i>
                        <p>Arsip Data Pasien</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="dashboard">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="#">
                                    <span class="sub-item">Data Pemeriksaan</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="sub-item">Data Imunisasi</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="sub-item">Data Konseling</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>