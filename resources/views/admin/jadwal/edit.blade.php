@extends('templates.admin_master')
@section('header-title')
Edit Jadwal Pelajaran
@endsection
@section('content')
<div class="content">
   <div class="container-fluid">
       <div class="row">
           <div class="col-md-12">
            <a href="/superadmin/jadwal" class="btn btn-fill btn-danger mb-2"><i class="material-icons" style="font-size: 15px">arrow_back</i>Kembali</a>
               <div class="card">
                   <div class="card-body">
                       <form method="POST" action="/superadmin/jadwal">
                        @csrf
                        <div class="container-fluid">
                        <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                              <label>Mata Pelajaran</label>
                              <input type="text" class="form-control" placeholder="Mapel" name="mapel" value="{{$u->mapel}}">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Hari</label>
                              <select name="hari" class="form-control">
                                @foreach($a as $w => $val)
                                <option 
                                @if($w == $u->hari)
                                  selected 
                                @endif
                                 value="{{$w}}">{{$val}}</option>
                                @endforeach
                              </select>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                              <label>Jam Ke</label>
                              <select name="jam" class="form-control">
                                @for($i = 1; $i<=10;$i++)
                                <option
                                @if($i == $u->jam)
                                 selected
                                @endif
                                >{{$i}}</option>
                                @endfor
                              </select>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                              <label>Nama Guru</label>
                              <select name="id_guru" class="form-control">
                                <?php $r = \App\Guru::all()?>
                                @foreach($r as $f)
                                <option
                                @if($f->id == $u->id_guru)
                                selected
                                @endif
                                 value="{{$f->id}}">{{$f->nama}}</option>
                                @endforeach
                              </select>
                            </div>
                            </div>
                          </div>
                          </div>
                           <button type="submit" class="btn btn-danger btn-fill btn-block">Update Jadwal</button>
                       </form>
                     </div>
                 </div>
              </div>
            </div>
          </div>
       </div>
   </div>
@endsection