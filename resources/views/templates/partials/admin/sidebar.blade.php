
   <?php error_reporting(0)?>

    <div class="wrapper">
        <div class="sidebar" data-image="/assets/img/sidebar-5.jpg" data-color='red'>
            <div class="sidebar-wrapper">
                <a href="/admin/dashboard">
                    <img src="/assets/img/logo.png" class="mx-auto d-block mt-3" width="30%">
                    <img src="/assets/img/tulisan.png" width="90%" class=" mt-3 mx-auto d-block">
                </a>
                <hr class="bg-white mt-4">
                <div class="text-center">
                    {{$user->nama_lengkap}}
                    @if(isset($dashboard))
                    <form action="/admin/edit" method="POST">
                        @csrf
                        <input type="hidden" value="{{$user->id}}" name="id">
                        <button type="submit" class="btn btn-danger btn-fill shadow">Ganti Profile</button>
                    </form>
                    @endif
                </div>
                <ul class="nav">
                    <hr class="bg-white">
                    <li class="nav-item {{$dashboard}}">
                        <a class="nav-link" href="/admin/dashboard">
                            <i class="material-icons">home</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item {{$pr}}">
                        <a class="nav-link" href="/admin/pr">
                            <i class="material-icons">book</i>
                            <p> Pekerjaan Rumah</p>
                        </a>
                    </li>
                    <li class="nav-item {{$ulangan}}">
                        <a class="nav-link" href="/admin/ulangan">
                            <i class="material-icons">assignment</i>
                            <p> Ulangan</p>
                        </a>
                    </li>
                    @if($user->role == 'superadmin')
                    <hr class="bg-white">
                    <li class="nav-item {{$jadwal}}">
                        <a href="/superadmin/jadwal" class="nav-link">
                            <i class="material-icons">date_range</i>
                            <p>Jadwal Pelajaran</p>
                        </a>
                    </li>
                    <li class="nav-item {{$guru}}">
                        <a class="nav-link" href="/superadmin/guru">
                            <i class="material-icons">group</i>
                            <p>Guru Pengajar</p>
                        </a>
                    </li>
                    @endif
                    <hr class="bg-white">
                    <li class="nav-item active">
                        <a href="/logout" class="nav-link" onclick="return confirm('Yakin ingin logout?')">
                            <i class="material-icons">exit_to_app</i>
                            <p>Logout</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
            <div class="main-panel">

