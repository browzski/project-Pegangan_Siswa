@extends('templates.admin_master')
@section('header')
<script src="/js/ckeditor.js"></script>
@endsection
@section('header-title')
Create PR
@endsection
<?php 
error_reporting(0);
$file = App\Murid::where('user_id',$id)->first(); 
$auth = App\Auth::find($id);
?>
@section('content')
<div class="content">
   <div class="container-fluid">
       <div class="row">
           <div class="col-md-12">
            <a href="/admin/pr" class="btn btn-fill btn-danger mb-2"><i class="material-icons" style="font-size: 15px">arrow_back</i>Kembali</a>
               <div class="card">
                   <div class="card-body">
                       <form method="POST" action="/admin/profile">
                        @csrf
                        <div class="row">
                          <div class="form-group col-md-8">
                            <label>Nama Lengkap</label>
                            <input type='text' class="form-control" name="nama_lengkap" value="{{$user->nama_lengkap}}">
                          </div>
                          <div class="form-group col-md-4">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{$user->email}}">
                          </div>
                        </div>
                          <div class="row">
                            <div class="form-group col-md-8">
                              <label>Tanggal Lahir</label>
                              <input type="date" class="form-control date" name="tanggal_lahir" value="{{$file->tanggal_lahir}}">
                            </div>
                            <div class="form-group col-md-4">
                              <label>Absen</label>
                              <select class="form-control" name="absen">
                                @for($i = 1 ; $i <= 36 ; $i++)
                                  <option @if($file->absen == $i) selected @endif > {{$i}}</option>
                                @endfor
                              </select>
                            </div>
                        </div>
                            <div class="form-group">
                              <label>Social Media</label>
                              <textarea name="profile" class="form-control" id="editor">{{$file->profile}}</textarea>
                            </div>
                            @include('templates.error')
                            <span class="text-muted" style="font-size: 12px">*Data ini untuk mempermudah mencari kontak teman saat reuni</span>
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                           <button type="submit" class="btn btn-danger btn-fill btn-block">Update Profile</button>
                       </form>
                     </div>
                 </div>
              </div>
            </div>
          </div>
       </div>
   </div>
@endsection
@section('footer')
<script>
ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
</script>
@endsection