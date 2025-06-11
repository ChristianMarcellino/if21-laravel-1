@extends('main')

@section('title', 'Program Studi')
@section('content')
<div class="app-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card card-primary card-outline mb-4">
                  <div class="card-header"><div class="card-title">Form Edit @yield('title')</div></div>
                  <form action="{{ route('prodi.update', $prodi->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                      <div class="mb-3">
                      <label for="nama" class="form-label">Nama Prodi</label>
                      <select class="form-select" name="fakultas_id" id="fakultas_id">
                        @foreach ($fakultas as $item)
                          <option value="{{ $item -> id }}" {{ old('fakultas_id') ==  $item->id ? 'selected' : ($prodi->fakultas_id == $item->id ? 'selected' : null) }}>{{ $item->nama }}</option>
                        @endforeach
                      </select>
                      </div>
                      <div class="mb-3">
                        <label for="nama" class="form-label">Nama Prodi</label>
                        <input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama') ? old('nama') : $prodi->nama }}">
                      </div>
                      <div class="mb-3">
                        <label for="singkatan" class="form-label">Singkatan Prodi</label>
                        <input type="text" class="form-control" name="singkatan" value="{{ old('singkatan') ? old('singkatan') : $prodi->singkatan }}">
                      </div>
                      <div class="mb-3">
                        <label for="kaprodi" class="form-label">Nama Kaprodi</label>
                        <input type="text" class="form-control" name="kaprodi" value="{{ old('kaprodi') ? old('kaprodi') : $prodi->kaprodi }}">
                      </div>
                      <div class="mb-3">
                        <label for="sekretaris" class="form-label">Nama Sekretaris</label>
                        <input type="text" class="form-control" name="sekretaris" value="{{ old('sekretaris') ? old('sekretaris') : $prodi->sekretaris }}">
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
