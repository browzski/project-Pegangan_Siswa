@extends('templates.admin_master')
@section('header-title')
Selamat Datang {{$user->nama_lengkap}}
@endsection
<?php
function day($int){
    $a = ['Senin','Selasa','Rabu','Kamis','Jumat'];
    return $a[$int];
}
error_reporting(0);
    $mydata = App\Auth::find($user->id);
    $pr = App\Pr::count();
    $pr_u = App\Pr::orderBy('id','desc')->first();
    $siswa = App\Murid::count();
    $siswa_u = App\Murid::orderBy('id','desc')->first();
    $ulg = App\Ulangan::count();
    $ulg_u = App\Ulangan::orderBy('id','desc')->first();
    $file_guru = \App\Guru::take(5)->get();
    $file = App\Jadwal::orderBy('hari')->take(5)->get();
    $murid = App\Murid::orderBy('absen')->take(5)->get();
    Date::setLocale('id'); 
    $created_siswa =$siswa_u->nama_lengkap;
    $created_pr = Date::createFromTimeStamp(strtotime($pr_u->created_at))->diffForHumans();
    $created_ulg = Date::createFromTimeStamp(strtotime($ulg_u->created_at))->diffForHumans();
?>
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- Total PR -->
            <div class="col-md-4">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center icon-warning">
                                    <i class="material-icons text-warning t50">book</i>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="numbers">
                                    <p class="card-category">Total PR</p>
                                    <h4 class="card-title">{{$pr}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-history"></i> Update terakhir {{$created_pr}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Total Ulangan -->
            <div class="col-md-4">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center icon-warning">
                                    <i class="material-icons text-success t50">assignment</i>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="numbers">
                                    <p class="card-category">Total Ulangan</p>
                                    <h4 class="card-title">{{$ulg}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-history"></i> Update terakhir {{$created_ulg}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Total Siswa -->
             <div class="col-md-4">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center icon-warning">
                                    <i class="material-icons text-primary t50">group</i>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="numbers">
                                    <p class="card-category">Total Siswa</p>
                                    <h4 class="card-title">{{$siswa}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-history"></i>Update Terakhir :  {{$created_siswa}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Guru Pengajar -->
                <div class="col-md-6">
                 <div class="card striped-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">Guru Pengajar</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>Nomor</th>
                                <th>Nama</th>
                                <th>Telepon</th>
                                <th>Foto</th>
                            </thead>
                            <tbody>
                                @foreach($file_guru as $files)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$files->nama}}</td>
                                    <td>{{$files->telepon}}</td>
                                    <td><a class="btn btn-danger btn-sm btn-fill text-white shadow" data-toggle="modal" data-target="#{{$loop->iteration}}">Lihat Foto</a></td>
                                    
                                </tr>
                                <div class="modal fade modal-mini modal-primary" id="{{$loop->iteration}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                               <img src="{{$files->foto}}"alt="{{$files->nama}}" style="max-width: 200px">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <a href="/admin/guru" class="btn btn-secondary btn-sm"><i class="fa fa-info"></i> Lihat Lebih Lanjut</a>
                        </div>
                    </div>
                </div>   
            </div>

            
            <!-- Jadwal Pelajaran -->
            <div class="col-md-6">
                <div class="card striped-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">Jadwal Pelajaran</h4>
                    </div>
                    <div class="card-body ">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>Hari</th>
                                <th>Mapel</th>
                                <th>Jam</th>
                                <th>Guru</th>
                            </thead>
                            <tbody>
                                @foreach($file as $files)
                                <?php $guru = \App\Guru::find($files->id_guru)?>
                                <tr>
                                    <td>{{day($files->hari)}}</td>
                                    <td>{{$files->mapel}}</td>
                                    <td>{{$files->jam}}</td>
                                    <td>{{$guru->nama}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer ">
                        <hr class=" mt-2">
                        <div class="stats">
                            <a href="/admin/jadwal" class="btn btn-secondary btn-sm"><i class="fa fa-info"></i> Lihat Lebih Lanjut</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Data Murid -->
            <div class="col-md-12">
                <div class="card striped-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">Data Siswa</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>Absen</th>
                                <th>Nama Lengkap</th>
                                <th>Email</th>
                                <th>Profile</th>
                            </thead>
                            <tbody>
                                @foreach($murid as $files)
                                <tr>
                                    <td>{{$files->absen}}</td>
                                    <td>{{$files->nama_lengkap}}</td>
                                    <td>{{$files->email}}</td>
                                    <td><a class="btn btn-danger btn-fill text-white shadow" data-toggle="modal" data-target="#{{$loop->iteration}}2">Lihat Profile</a></td>
                                    
                                </tr>
                                <div class="modal fade modal-mini modal-primary" id="{{$loop->iteration}}2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                               {!! $files->profile !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer ">
                        <hr class=" mt-2">
                        <div class="stats">
                            <a href="/admin/siswa" class="btn btn-secondary btn-sm"><i class="fa fa-info"></i> Lihat Lebih Lanjut</a>
                        </div>
                    </div>
                </div>   
            </div>
        </div>
    </div>
</div>
@endsection