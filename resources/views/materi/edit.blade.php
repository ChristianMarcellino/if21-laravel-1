@extends('main')

@section('title', 'Update Materi')
@section('content')
<div class="app-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card card-primary card-outline mb-4">
                  <div class="card-header"><div class="card-title">Form @yield('title')</div></div>
                  <form action="{{ route('materi.update', $materi->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                      <div class="mb-3">
                      <label for="mata_kuliah_id" class="form-label">Mata Kuliah</label>
                      <select class="form-select" name="mata_kuliah_id" id="mata_kuliah_id">
                        @foreach ($mata_kuliah as $item)
                          <option value="{{ $item->id }}" {{ old('mata_kuliah_id') ==  $item->id ? 'selected' : ($materi->mata_kuliah_id == $item->id ? 'selected' : null) }}>{{ $item->nama }}</option>
                        @endforeach
                      </select>
                      </div>
                      <div class="mb-3">
                        <label for="dosen_id" class="form-label">Nama Dosen</label>
                        <select class="form-select" name="dosen_id" id="dosen_id">
                          @foreach ($dosen as $item)
                            <option value="{{ $item->id }}" {{ old('dosen_id') ==  $item->id ? 'selected' : ($materi->dosen_id == $item->id ? 'selected' : null) }}>{{ $item->name }}</option>
                          @endforeach
                        </select>
                        </div>
                        <div class="mb-3">
                            <label for="pertemuan" class="form-label">Pertemuan Ke-</label>
                            <input id="pertemuan" type="text" class="form-control" name="pertemuan" value="{{old('pertemuan') ? old('pertemuan') : $materi->pertemuan}}">
                            @error('pertemuan')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                      <div class="mb-3">
                        <label for="pokok_bahasan" class="form-label">Pokok Pembahasan</label>
                        <input id="pokok_bahasan" type="text" class="form-control" name="pokok_bahasan" value="{{old('pokok_bahasan') ? old('pokok_bahasan') : $materi->pokok_bahasan}}">
                        @error('pokok_bahasan')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="file_materi" class="form-label">File Materi</label>
                        <input type="file" class="form-control" name="file_materi">
                        @error('file_materi')
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
