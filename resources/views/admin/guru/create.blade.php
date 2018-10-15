@extends('templates.admin_master')
@section('header-title')
Create Data Guru
@endsection
@section('content')
<div class="content">
   <div class="container-fluid">
       <div class="row">
           <div class="col-md-12">
            <a href="/superadmin/guru" class="btn btn-fill btn-danger mb-2"><i class="material-icons" style="font-size: 15px">arrow_back</i>Kembali</a>
               <div class="card">
                   <div class="card-body">
                       <form method="POST" action="/superadmin/guru">
                        @csrf
                            <div class="form-group">
                              <label>Nama Guru</label>
                              <input type="text" class="form-control" placeholder="Nama" name="nama">
                            </div>
                            <div class="form-group">
                              <label>Link Foto Guru</label>
                              <input type="text" class="form-control" placeholder="Pastikan Linknya berupa foto" name="foto">
                            </div>
                            <div class="form-group">
                              <label>Nomor Telepon</label>
                              <input type="number" step="1" class="form-control" placeholder="Bisa berupa nomor WA" name="telepon">
                            </div>
                            <input type="hidden" name="creator_id" value="{{$user->id}}">
                           <button type="submit" class="btn btn-danger btn-fill btn-block">Buat Data Guru</button>
                       </form>
                     </div>
                 </div>
              </div>
            </div>
          </div>
       </div>
   </div>
@endsection