@extends('main')

@section('title', 'Sesi')
@section('content')
<div class="app-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card card-primary card-outline mb-4">
                  <div class="card-header"><div class="card-title">Form Update @yield('title')</div></div>
                  <form action="{{ route('sesi.update' , $sesi->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                      <div class="mb-3">
                        <label for="nama" class="form-label">Nama sesi</label>
                        <input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama') ? old('nama') : $sesi->nama }}">
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
