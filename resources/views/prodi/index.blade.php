@extends('main')

@section('title', 'Program Studi')
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
                    <h3 class="card-title">Program Studi</h3>
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
                    <a class="nav-link mb-3" href="{{route('prodi.create')}}"><button class="btn btn-primary">Create New Prodi</button></a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Singkatan</th>
                                <th>Nama Kaprodi</th>
                                <th>Nama Sekretaris</th>
                                <th>Nama Fakultas</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($prodi as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $item -> nama }}</td>
                                    <td>{{ $item -> singkatan }}</td>
                                    <td>{{ $item-> kaprodi}}</td>
                                    <td>{{ $item -> sekretaris }}</td>
                                    <td>{{ $item -> fakultas -> nama}}</td>
                                    <td>
                                      <a href="{{ route ('prodi.edit' , $item->id)}}" class="m-auto btn btn-tool"><i style="font-size:3dvh;" class="bi bi-pencil-fill"></i></a>
                                      <form method="POST"  action="{{ route('prodi.destroy', $item->id) }}">
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

