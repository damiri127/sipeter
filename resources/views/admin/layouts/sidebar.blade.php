<!-- Sidebar -->
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
                            Hizrian
                            <span class="user-level">Administrator</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#profile">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#edit">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#settings">
                                    <span class="link-collapse">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                @if (Route::currentRouteName() == 'admin')
                    {{ $dashboard_status = 'active'}}
                @else
                    {{ $dashboard_status = 'inactive'}}
                @endif
                <li class="nav-item {{ $dashboard_status }}">
                    <a  href="{{ route('admin') }}" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Data Master</h4>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#base" class="nav-link {{ Request::is('data_struktur_jabatan') ? 'active' : ''}}">
                        <i class="fas fa-user"></i>
                        <p>Data Pengguna</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('data_struktur_jabatan') }}">
                                    <span class="sub-item">Data Struktur Jabatan</span>
                                </a>
                            </li>
                            @foreach ($jabatan as $item)
                            <li>
                                <a href="{{route('mengelola_pengguna', ['id_struktur_jabatan'=>$item->id_struktur_jabatan])}}">
                                    <span class="sub-item">{{ $item->nama_struktur_jabatan }}</span>
                                </a>
                            </li>
                            @endforeach
                            {{-- @foreach ($data as $item)
                            <li>
                                <a href="#">
                                    <span class="sub-item">{{ $item->nama_struktur_jabatan }}</span>
                                </a>
                            </li>
                            @endforeach --}}
                        </ul>
                    </div>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Data UKM</h4>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#base2" class="nav-link active">
                        <i class="fas fa-th"></i>
                        <p>Data UKM</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base2">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('mengelola_ukm')}}">
                                    <span class="sub-item">Jenis UKM</span>
                                </a>
                            </li>

                            @foreach ($jenis_ukm as $ukm)
                            <li>
                                <a href="{{route('mengelola_subdivisi_ukm', ['id_ukm'=>$ukm->id_ukm])}}">
                                    <span class="sub-item">{{$ukm->nama_jenis_ukm}}</span>
                                </a>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Wilayah Kerja</h4>
                </li>
                <li class="nav-item ">
                    <a  href="{{route('mengelola_desa')}}" aria-expanded="false">
                        <i class="fas fa-location-arrow"></i>
                        <p>Desa</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a  href="{{route('kesehatan_lingkungan')}}" aria-expanded="false">
                        <i class="fas fa-location-arrow"></i>
                        <p>Kesehatan Lingkungan</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->