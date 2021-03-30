@extends('admin.layout')

@section('administracion')
<form action="{{ route('admin.user.update',$user) }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="row">
        <div class="col-md-6">
            <div class="card card-info">
                <div class="card-header">
                <h3 class="card-title">DATOS PERSONALES</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="userNombre">Nombre</label>
                        <input type="text" class="form-control form-control-border {{ $errors->get('name') ? 'is-invalid' : '' }}" value="{{old('name',$user->name)}}" name="name" id="name" placeholder="Nombre">
                        {!! $errors->first('name',"<span id='nameError' class='error invalid-feedback'>:message</span>") !!}
                    </div>
                    <div class="form-group">
                        <label for="userEmail">Email</label>
                        <input type="text" class="form-control form-control-border {{ $errors->get('email') ? 'is-invalid' : '' }}" value="{{old('email',$user->email)}}" name="email" id="email" placeholder="Email">
                        {!! $errors->first('email',"<span id='emailError' class='error invalid-feedback'>:message</span>") !!}
                    </div>
                    <div class="form-group">
                        <label for="userUsername">Username</label>
                        <input type="text" class="form-control form-control-border {{ $errors->get('username') ? 'is-invalid' : '' }}" value="{{old('username',$user->username)}}" name="username" id="username" placeholder="Username">
                        {!! $errors->first('username',"<span id='usernameError' class='error invalid-feedback'>:message</span>") !!}
                    </div>
                    <div class="form-group">
                        <div class="dropzone"></div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block bg-gradient-success">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@stop

@push('stylesagregados')

    <!-- daterange picker -->
  <link rel="stylesheet" href="/adminlte/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="/adminlte/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

  <!-- BS Stepper -->
  <link rel="stylesheet" href="/adminlte/plugins/bs-stepper/css/bs-stepper.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.8.1/min/dropzone.min.css">
@endpush

@push('scriptsagregados')

    <!-- InputMask -->
    <script src="/adminlte/plugins/moment/moment.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.8.1/min/dropzone.min.js"></script>
    <script>
        $(document).ready(function() {

        });

        Dropzone.autoDiscover = false;
        new Dropzone('.dropzone', {
            url:'/admin/users/{{ $user->id }}/photosdos',
            acceptedFiles: 'image/*',
            maxFiles:1,
            paramName:'photo',
            headers: {
                'X-CSRF-TOKEN':'{{ csrf_token() }}'
            },
            dictDefaultMessage:'Agregar Avatar',
            init:function(){
                myDropzone = this;

                this.on("complete", function(){
                  if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
                  {
                    var _this = this;
                    _this.removeAllFiles();
                  }
                });
              }
        });
    </script>
@endpush
