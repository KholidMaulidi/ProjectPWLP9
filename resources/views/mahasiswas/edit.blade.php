@extends('mahasiswas.layout')

@section('content')

<div class="container mt-5">
   <div class="row justify-content-center align-items-center">
      <div class="card" style="width: 24rem;">
         <div class="card-header">
            Edit Mahasiswa
         </div>
         <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
               <strong>Whoops!</strong> There were some problems with your input.<br><br>
               <ul>
                  @foreach ($errors->all() as $error) 
                     <li>{{ $error }}</li>
                     @endforeach
               </ul>
            </div>
         @endif
         <form method="post" action="{{ route('mahasiswas.update', $Mahasiswa->nim) }}" id="myForm">
         @csrf
         @method('PUT')
            <div class="form-group">
               <label for="nim">nim</label>
               <input type="text" name="nim" class="form-control" id="nim"value="{{ $Mahasiswa->nim }}" ariadescribedby="Nim">
            </div>
            <div class="form-group">
               <label for="nama">nama</label>
               <input type="text" name="nama" class="form-control" id="nama"value="{{ $Mahasiswa->nama }}" ariadescribedby="nama">
            </div>
            <div class="form-group">
               <label for="email">email</label>
               <input type="text" name="email" class="form-control" id="email"value="{{ $Mahasiswa->email }}" ariadescribedby="email">
            </div>
            <div class="form-group">
               <label for="tanggalLahir">tanggalLahir</label>
               <input type="tanggalLahir" name="tanggalLahir" class="form-control" id="tanggalLahir"value="{{ $Mahasiswa->tanggalLahir }}" ariadescribedby="tanggalLahir">
            </div>
            <div class="form-group">
               <label for="kelas">kelas</label>
               <select name="kelas" class="form-control">
                  @foreach ($kelas as $Kelas)
                  <option value="{{$Kelas->id}}">{{$Kelas->nama_kelas}}</option>
                  @endforeach
              </select>
            </div>
            <div class="form-group">
               <label for="jurusan">jurusan</label>
               <input type="jurusan" name="jurusan" class="form-control" id="jurusan"value="{{ $Mahasiswa->jurusan }}" ariadescribedby="jurusan">
            </div>
            <div class="form-group">
               <label for="no_handphone">no_handphone</label>
               <input type="no_handphone" name="no_handphone" class="form-control" id="no_handphone"value="{{ $Mahasiswa->no_handphone }}" ariadescribedby="no_handphone">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
         </form>
         </div>
      </div>
   </div>
</div>
@endsection
