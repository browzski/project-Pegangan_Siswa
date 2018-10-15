<?php function day($int){
    $a = ['Senin','Selasa','Rabu','Kamis','Jumat'];
    return $a[$int];
}?>
@extends('templates.admin_master')
@section('header-title')
Data Jadwal
@endsection
<?php error_reporting(0) ?>
@section('content')
<?php $file = \App\Jadwal::orderBy('hari')->get()?>
<?php Date::setLocale('id'); ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if(is_null($suck))
                <a href="/superadmin/jadwal/create" class="btn btn-fill btn-danger mb-2 shadow">Buat Jadwal Pelajaran</a>
                @endif
                <div class="card striped-tabled-with-hover">
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>Hari</th>
                                <th>Mapel</th>
                                <th>Jam</th>
                                <th>Guru</th>
                                @if(is_null($suck))
                                <th>Edit</th>
                                <th>Delete</th>
                                @endif
                            </thead>
                            <tbody>
                                @foreach($file as $files)
                                <?php $guru = \App\Guru::find($files->id_guru)?>
                                <tr>
                                    <td>{{day($files->hari)}}</td>
                                    <td>{{$files->mapel}}</td>
                                    <td>{{$files->jam}}</td>
                                    <td>{{$guru->nama}}</td>
                                    @if(is_null($suck))
                                    <td><a href="/superadmin/jadwal/edit/{{$files->id}}" class="btn btn-fill shadow btn-danger"><i class="material-icons">edit</i></a></td>   
                                    <td><a href="/superadmin/jadwal/delete/{{$files->id}}" class="btn shadow btn-danger btn-fill" onclick="return confirm('Yakin ingin menghapus?')"><i class="material-icons">delete_outline</i></a></td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection