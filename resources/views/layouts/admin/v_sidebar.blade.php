<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ auth()->user()->foto == '' ? asset('stisla/assets/img/avatar/avatar-1.png') : asset('data/foto_profile/' . auth()->user()->foto) }}"
                        alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{ auth()->user()->name }}
                            <span class="user-level">{{ auth()->user()->role }}</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        {{-- <ul class="nav">
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
								</ul> --}}
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">MENU PENGGUNA</h4>
                </li>
                <li class="nav-item" id="liDahshboard">
                    <a href="{{ URL::to('/dashboard') }}" class="collapsed">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item" id="liProfile">
                    <a href="{{ URL::to('/profile') }}" class="collapsed">
                        <i class="fas fa-user"></i>
                        <p>Profile</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">MENU {{ auth()->user()->role }}</h4>
                </li>
                @if (auth()->user()->role == 'Administrator')
                    <li class="nav-item" id="liPengguna">
                        <a href="{{ URL::to('/admin/pengguna') }}" class="collapsed">
                            <i class="fas fa-users"></i>
                            <p>Pengguna</p>
                        </a>
                    </li>
                @endif

                @if (auth()->user()->role == 'dosen')
                    <li class="nav-item" id="liKategori">
                        <a href="{{ URL::to('/dosen/kategori') }}" class="collapsed">
                            <i class="fas fa-swatchbook"></i>
                            <p>Kategori</p>
                        </a>
                    </li>
                    <li class="nav-item" id="liPelajaran">
                        <a href="{{ URL::to('/dosen/pelajaran') }}" class="collapsed">
                            <i class="fas fa-school"></i>
                            <p>Pelajaran</p>
                        </a>
                    </li>

                    <li class="nav-item" id="liPeserta">
                        <a href="{{ URL::to('/dosen/peserta') }}" class="collapsed">
                            <i class="fas fa-users"></i>
                            <p>Peserta</p>
                        </a>
                    </li>

                    <li class="nav-item" id="liMateriVideo">
                        <a href="{{ URL::to('/dosen/materi_video') }}" class="collapsed">
                            <i class="fas fa-video"></i>
                            <p>Materi Video</p>
                        </a>
                    </li>

                    <li class="nav-item" id="liMateriTertulis">
                        <a href="{{ URL::to('/dosen/materi_tertulis') }}" class="collapsed">
                            <i class="fas fa-list"></i>
                            <p>Materi Tertulis</p>
                        </a>
                    </li>

                    <li class="nav-item" id="liQuiz">
                        <a href="{{ URL::to('/dosen/quiz') }}" class="collapsed">
                            <i class="fas fa-list"></i>
                            <p>Quiz</p>
                        </a>
                    </li>
                @endif

                <li class="mx-4 mt-2">
                    <a href="{{ URL::to('logout') }}" class="btn bg-main text-white btn-block"><span
                            class="btn-label mr-2"> <i class="fa fa-sign-out-alt"></i> </span>Logout</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
