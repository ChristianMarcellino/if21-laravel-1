@extends('main')

@section('title', 'Jadwal')
@section('content')
<div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-12">
                <!-- Default box -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Jadwal</h3>
                    <div class="card-tools">
                      <button
                        type="button"
                        class="btn btn-tool"
                        data-lte-toggle="card-collapse"
                        title="Collapse"
                      >
                        <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                        <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                      </button>
                      <button
                        type="button"
                        class="btn btn-tool"
                        data-lte-toggle="card-remove"
                        title="Remove"
                      >
                        <i class="bi bi-x-lg"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <a class="nav-link mb-3" href="{{route('jadwal.create')}}"><button class="btn btn-primary">Create New Jadwal</button></a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Mata Kuliah</th>
                                <th>Dosen</th>
                                <th>Sesi</th>
                                <th>Kelas</th>
                                <th>Tahun Akademik</th>
                                <th>Kode Semester</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jadwal as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $item ->mata_kuliah->nama }}</td>
                                    <td>{{ $item ->dosen->name }}</td>
                                    <td>{{ $item ->sesi->nama }}</td>
                                    <td>{{ $item ->kelas }}</td>
                                    <td>{{$item->tahun_akademik}}</td>
                                    <td>{{ $item -> kode_smt }}</td>
                                    <td>
                                      <a href="{{ route ('jadwal.edit' , $item->id)}}" class="m-auto btn btn-tool"><i style="font-size:3dvh;" class="bi bi-pencil-fill"></i></a>
                                      <form method="POST" action="{{ route('jadwal.destroy', $item->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="m-auto btn btn-tool show_confirm" title="Delete" data-nama="{{ $item->name }}"><i style="font-size:4dvh;" class="bi bi-trash"></i></button>
                                      </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-end">
                      <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
                  </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">Footer</div>
                  <!-- /.card-footer-->
                </div>
                <!-- /.card -->
              </div>
            </div>
            <!--end::Row-->
          </div>
        </div>
@endsection

