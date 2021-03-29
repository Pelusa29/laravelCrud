@extends('admin.layout')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Todos los Post</h1>
            <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">
                <i class="fa fa-plus"></i> Crear Post
            </button>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection
@section('administracion')
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title"></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="post-table" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>ID</th>
          <th>Título</th>
          <th>Extracto</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->excerpt }}</td>
                    <td>
                        <a href="{{ route('posts.show', $post) }}" class="btn btn-xs btn-info" target="_blank" ><i class="fas fa-eye"></i></a>
                        <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-xs btn-info"><i class="fa fa-pencil-alt"></i></a>
                        <a href="#" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection
@push('stylesagregados')
    <!-- datatables -->
    <link rel="stylesheet" href="/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
@endpush

@push('scriptsagregados')
<!-- DataTables&Plugins -->
    <script src="/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(function () {

            $('#post-table').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
      </script>

@endpush

