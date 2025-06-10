@extends('main')

@section('title', 'Fakultas')
@section('content')
<div class="app-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card card-primary card-outline mb-4">
                  <div class="card-header"><div class="card-title">Form Tambah @yield('title')</div></div>
                  <form action="{{ route('fakultas.store')}}" method="POST">
                    @csrf
                    <div class="card-body">
                      <div class="mb-3">
                        <label for="nama" class="form-label">Nama Fakultas</label>
                        <input id="nama" type="text" class="form-control" name="nama" value="{{old('nama')}}">
                        @error('nama')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="singkatan" class="form-label">Singkatan Fakultas</label>
                        <input type="text" class="form-control" name="singkatan" value="{{old('singkatan')}}">
                        @error('singkatan')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="nama_dekan" class="form-label">Nama Dekan</label>
                        <input type="text" class="form-control" name="nama_dekan" value="{{old('nama_dekan')}}">
                        @error('nama_dekan')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div
                      ><div class="mb-3">
                        <label for="nama_wadek" class="form-label">Nama Wakil Dekan</label>
                        <input type="text" class="form-control" name="nama_wadek" value="{{old('nama_wadek')}}">
                        @error('nama_wadek')
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
