@extends('templates.admin_master')
@section('header-title')
Data ulangan
@endsection
@section('content')
<?php $role = \Session::get('role') ?>
<?php $file = \App\Ulangan::paginate(10)?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="/admin/ulangan/create" class="btn btn-fill btn-danger mb-2 shadow">Buat ulangan</a>
                <div class="card striped-tabled-with-hover">
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>Nomor</th>
                                <th>Judul</th>
                                <th>Isi</th>
                                <th>Pembuat</th>
                                <th>Role</th>
                                <th>Untuk Tanggal</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </thead>
                            <tbody>
                            	@foreach($file as $files)
                            	<?php $id = \App\Auth::find($files->creator_id)?>
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$files->judul}}</td>
                                    <td><a class="btn btn-danger btn-fill text-white shadow" data-toggle="modal" data-target="#{{$loop->iteration}}">Lihat Isi</a></td>
                                    <div class="modal fade modal-mini modal-primary" id="{{$loop->iteration}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                   {!! $files->isi !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <td>{{$id->nama_lengkap}}</td>
                                    <td>{{$id->role}}</td>
                                    <td><?php
                                    Date::setLocale('id'); 
                                    echo Date::createFromFormat('Y-m-d',$files->untuk_tanggal)->format('l. d F Y')?></td>
                                    @if($user->role == 'admin')
                                    	@if($files->creator_id == $user->id)
                                    	<td><a href="/admin/ulangan/edit/{{$files->id}}" class="btn btn-fill shadow btn-danger"><i class="material-icons">edit</i></a></td>   
                                        <td><a href="/admin/ulangan/delete/{{$files->id}}" class="btn shadow btn-danger btn-fill"onclick="return confirm('Yakin ingin menghapus?')"><i class="material-icons">delete_outline</i></a></td>
                                    	@else
                                    	<td><a href="/admin/ulangan/edit/{{$files->id}}" class="btn btn-danger shadow btn-fill disabled"><i class="material-icons">edit</i></a></td>
                                        <td><a href="/admin/ulangan/delete/{{$files->id}}" class="btn shadow btn-danger btn-fill disabled"onclick="return confirm('Yakin ingin menghapus?')"><i class="material-icons">delete_outline</i></a></td>
                                    	@endif
                                    @elseif($user->role == 'superadmin')
                                        <td><a href="/admin/ulangan/edit/{{$files->id}}" class="btn btn-fill shadow btn-danger"><i class="material-icons">edit</i></a></td>   
                                        <td><a href="/admin/ulangan/delete/{{$files->id}}" class="btn shadow btn-danger btn-fill" onclick="return confirm('Yakin ingin menghapus?')"><i class="material-icons">delete_outline</i></a></td>
                                    @endif
                                </tr>
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