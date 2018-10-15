@extends('templates.admin_master')
@section('header-title')
Data Siswa
@endsection
@section('content')
<?php $file = \App\Murid::paginate(10)?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if(is_null($suck))
                <a href="/superadmin/guru/create" class="btn btn-fill btn-danger mb-2 shadow">Buat Data Guru</a>
                @endif
                <div class="card striped-tabled-with-hover">
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>Absen</th>
                                <th>Nama Lengkap</th>
                                <th>Email</th>
                                <th>Profile</th>
                            </thead>
                            <tbody>
                                @foreach($file as $files)
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
                </div>
                {{$file->links()}}
            </div>
        </div>
    </div>
</div>
@endsection