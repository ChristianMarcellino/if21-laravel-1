@extends('main')

@section('title', 'Program Studi')
@section('content')
<div class="app-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card card-primary card-outline mb-4">
                  <div class="card-header"><div class="card-title">Form Tambah @yield('title')</div></div>
                  <form action="{{ route('prodi.store')}}" method="POST">
                    @csrf
                    <div class="card-body">
                      <div class="mb-3">
                      <label for="fakultas_id" class="form-label">Nama Fakultas</label>
                      <select class="form-select" name="fakultas_id" id="fakultas_id">
                        @foreach ($fakultas as $item)
                          <option value="{{ $item -> id }} {{ old('prodi_id') == $item->id ? 'selected' : ''}}">{{ $item->nama }}</option>
                        @endforeach
                      </select>
                      </div>
                      <div class="mb-3">
                        <label for="nama" class="form-label">Nama Prodi</label>
                        <input id="nama" type="text" class="form-control" name="nama"  value="{{ old('nama') }}">
                      </div>
                      <div class="mb-3">
                        <label for="singkatan" class="form-label">Singkatan Prodi</label>
                        <input type="text" class="form-control" name="singkatan"  value="{{ old('singkat') }}">
                      </div>
                      <div class="mb-3">
                        <label for="kaprodi" class="form-label">Nama Kaprodi</label>
                        <input type="text" class="form-control" name="kaprodi"  value="{{ old('kaprodi') }}">
                      </div>
                      <div class="mb-3">
                        <label for="sekretaris" class="form-label">Nama Sekretaris</label>
                        <input type="text" class="form-control" name="sekretaris"  value="{{ old('sekretaris') }}">
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
