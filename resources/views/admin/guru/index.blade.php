@extends('templates.admin_master')
@section('header-title')
Data Guru
@endsection
<?php error_reporting(0) ?>
@section('content')
<?php $file = \App\Guru::paginate(10)?>
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
                                <th>Nomor</th>
                                <th>Nama</th>
                                <th>Telepon</th>
                                <th>Foto</th>
                                @if(is_null($suck))
                                <th>Edit</th>
                                <th>Delete</th>
                                @endif
                            </thead>
                            <tbody>
                            	@foreach($file as $files)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$files->nama}}</td>
                                    <td>{{$files->telepon}}</td>
                                    <td><a class="btn btn-danger btn-fill text-white shadow" data-toggle="modal" data-target="#{{$loop->iteration}}">Lihat Foto</a></td>
                                    @if(is_null($suck))
                                    <td><a href="/superadmin/guru/edit/{{$files->id}}" class="btn btn-fill shadow btn-danger"><i class="material-icons">edit</i></a></td>   
                                    <td><a href="/superadmin/guru/delete/{{$files->id}}" class="btn shadow btn-danger btn-fill" onclick="return confirm('Yakin ingin menghapus?')"><i class="material-icons">delete_outline</i></a></td>
                                    @endif
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
                </div>
                {{$file->links()}}
            </div>
        </div>
    </div>
</div>
@endsection