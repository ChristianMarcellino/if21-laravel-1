@extends('main')

@section('title', 'Mahasiswa')
@section('content')
<div class="app-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card card-primary card-outline mb-4">
                  <div class="card-header"><div class="card-title">Form Tambah @yield('title')</div></div>
                  <form action="{{ route('mahasiswa.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                      <div class="mb-3">
                        <label for="nama" class="form-label">Nama Mahasiswa</label>
                        <input id='nama' type="text" class="form-control" name="nama" value="{{ old('nama') }}">
                        @error('nama')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="npm" class="form-label">NPM Mahasiswa</label>
                        <input type="text" class="form-control" name="npm" value="{{ old('npm') }}">
                        @error('npm')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="nama" class="form-label">Jenis Kelamin</label>
                        <br>
                        <input checked class="form-check-input" value="L" id="L" type="radio" name="jk" {{ old('jk') == 'L' ? 'checked' : null }}>
                        <label for="jk" class="form-check-label">Laki-Laki</label>
                        <input class="form-check-input" type="radio" id="P" value="P" name="jk" {{ old('jk') == 'P' ? 'checked' : null }}>
                        <label for="jk" class="form-check-label">Perempuan</label>
                      </div>
                      <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label" >Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                        @error('tanggal_lahir')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" value="{{ old('tempat_lahir') }}">
                        @error('tempat_lahir')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="asal_sma" class="form-label">Asal SMA/SMK</label>
                        <input type="text" class="form-control" name="asal_sma" value="{{ old('asal_sma') }}">
                        @error('asal_sma')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input class="form-control" name="foto" type="file" id="foto">
                        @error('foto')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                      <div class="mb-3">
                        <label for="prodi_id" class="form-label">Program Studi</label>
                        <select class="form-select" name="prodi_id" id="prodi_id">
                        @foreach ($prodi as $item)
                          <option value="{{ $item -> id }}" {{ old('prodi_id') == $item->id ? 'selected' : ''}}>{{ $item->nama }}</option>
                        @endforeach
                      </select>
                      </div>
                    </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
@endsection