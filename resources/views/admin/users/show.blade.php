@extends('admin.layout')

@section('administracion')
    <div class="row">
        <div class="col-md-3">Datos del Usuario
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="/adminlte/img/user4-128x128.jpg" alt="User profile picture">
                  </div>

                  <h3 class="profile-username text-center">{{$user->name}}</h3>

                  <p class="text-muted text-center">{{ $user->hasNameRole() }}</p>

                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Email</b> <a class="float-right">{{$user->email}}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Posteos</b> <a class="float-right">{{$user->posts->count()}}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Username</b> <a class="float-right">{{$user->username}}</a>
                    </li>
                  </ul>

                  <a href="#" class="btn btn-primary btn-block"><b>Editar</b></a>
                </div>
                <!-- /.card-body -->
              </div>
        </div>
        <div class="col-md-3">Post del Usuario</div>
        <div class="col-md-3">Roles del Usuario:</div>
        <div class="col-md-3">Avatar del usuario:</div>
    </div>
@endsection
