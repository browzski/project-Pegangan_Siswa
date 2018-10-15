@extends('templates.admin_master')
@section('header')
<script src="/js/ckeditor.js"></script>
@endsection
@section('header-title')
Edit Ulangan
@endsection
@section('content')
<div class="content">
   <div class="container-fluid">
       <div class="row">
           <div class="col-md-12">
            <a href="/admin/ulangan" class="btn btn-fill btn-danger shadow mb-2"><i class="material-icons" style="font-size: 15px">arrow_back</i>Kembali</a>
               <div class="card">
                   <div class="card-body">
                       <form method="POST" action="">
                        @csrf
                            <div class="form-group">
                              <label>Judul Pekerjaan Rumah</label>
                              <input type="text" class="form-control" placeholder="Judul" name="judul" value="{{$users->judul}}">
                            </div>
                            <div class="form-group">
                              <label>Isi Pekerjaan Rumah</label>
                              <textarea name="isi" class="form-control" id="editor">{{$users->isi}}</textarea>
                            </div>
                            <div class="form-group date">
                              <label>Untuk Tanggal</label>
                              <input type="date" class="form-control" name="untuk_tanggal" value="{{$users->untuk_tanggal}}">
                            </div>
                            @if(!is_null($users->editor_id))
                            <div class="pull-left mb-4 text-muted">
                              <?php $a = \App\Auth::find($users->editor_id)?>
                             Diedit oleh : {{$a->nama_lengkap}}
                           </div>
                           @endif
                            <input type="hidden" name="editor_id" value="{{$user->id}}">
                           <button type="submit" class="btn shadow btn-danger btn-fill btn-block">Update Ulangan</button>
                       </form>
                     </div>
                     @include('templates.error')
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