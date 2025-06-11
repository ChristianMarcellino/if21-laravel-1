@extends('main')

@section('title', 'Update Mata Kuliah')
@section('content')
<div class="app-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card card-primary card-outline mb-4">
                  <div class="card-header"><div class="card-title">Form Update @yield('title')</div></div>
                  <form action="{{ route('mata_kuliah.update', $mata_kuliah->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                      <div class="mb-3">
                      <label for="nama" class="form-label">Nama Prodi</label>
                      <select class="form-select" name="prodi_id" id="prodi_id">
                        @foreach ($prodi as $item)
                          <option value="{{ $item -> id }}" {{ old('prodi_id') ==  $item->id ? 'selected' : ($mata_kuliah->prodi_id == $item->id ? 'selected' : null) }}">{{ $item->nama }}</option>
                        @endforeach
                      </select>
                      </div>
                      <div class="mb-3">
                        <label for="kode_mk" class="form-label">Kode Mata Kuliah</label>
                        <input type="text" class="form-control" name="kode_mk" value="{{ old('kode_mk') ? old('kode_mk') : $mata_kuliah->kode_mk }}">
                        @error('kode_mk')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="nama" class="form-label">Nama Mata Kuliah</label>
                        <input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama') ? old('nama') : $mata_kuliah->nama }}">
                        @error('nama')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
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
