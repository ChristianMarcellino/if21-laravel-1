@extends('main')

@section('title', 'Jadwal')
@section('content')
<div class="app-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card card-primary card-outline mb-4">
                  <div class="card-header"><div class="card-title">Form Tambah @yield('title')</div></div>
                  <form action="{{ route('jadwal.store')}}" method="POST">
                    @csrf
                    <div class="card-body">
                      <div class="mb-3">
                      <label for="mata_kuliah_id" class="form-label">Mata Kuliah</label>
                      <select class="form-select" name="mata_kuliah_id" id="mata_kuliah_id">
                        @foreach ($mata_kuliah as $item)
                          <option value="{{ $item -> id }}" {{ old('mata_kuliah_id') == $item->id ? 'selected' : ''}}>{{ $item->nama }}</option>
                        @endforeach
                      </select>
                      </div>
                      <div class="mb-3">
                        <label for="dosen_id" class="form-label">Nama Dosen</label>
                        <select class="form-select" name="dosen_id" id="dosen_id">
                          @foreach ($dosen as $item)
                            <option value="{{ $item -> id }}" {{ old('dosen_id') == $item->id ? 'selected' : ''}}>{{ $item->name }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="sesi_id" class="form-label">Waktu Sesi</label>
                        <select class="form-select" name="sesi_id" id="sesi_id">
                          @foreach ($sesi as $item)
                            <option value="{{ $item -> id }}" {{ old('sesi_id') == $item->id ? 'selected' : ''}}>{{ $item->nama }}</option>
                          @endforeach
                        </select>
                        </div>
                      <div class="mb-3">
                        <label for="kelas" class="form-label">Kelas</label>
                        <input id="nama" type="text" class="form-control" name="kelas" value="{{old('kelas')}}">
                        @error('kelas')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="tahun_akademik" class="form-label">Tahun Akademik</label>
                        <input id="tahun_akademik" type="text" class="form-control" name="tahun_akademik" value="{{old('tahun_akademik')}}">
                        @error('tahun_akademik')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="kode_smt" class="form-label">Kode Semester</label>
                        <input type="text" class="form-control" name="kode_smt" value="{{old('kode_smt')}}">
                        @error('kode_smt')
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
