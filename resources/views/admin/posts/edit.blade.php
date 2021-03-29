@extends('admin.layout')

@section('cabecera')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Editar Publicación</h1>
            <small>Optionl</small>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="nav-icon fas fa-tachometer-alt"></i>Inicio</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.posts.index') }}">Post </a></li>
            <li class="breadcrumb-item active"> Editar</li>
        </ol>
        </div>
    </div>
@stop
@section('administracion')
<form action="{{ route('admin.posts.update',$post) }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="row">
            <div class="col-md-6">
                <div class="card card-info">
                    <div class="card-header">
                    <h3 class="card-title"></h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputBorder">Título de la Publicación</label>
                            <input type="text" class="form-control form-control-border {{ $errors->get('postTitulo') ? 'is-invalid' : '' }}" value="{{old('postTitulo',$post->title)}}" name="postTitulo" id="postTitulo" placeholder="Título Post">
                            {!! $errors->first('postTitulo',"<span id='postTituloError' class='error invalid-feedback'>:message</span>") !!}
                        </div>
                        <div class="form-group">
                            <label for="postCodigo">Formato Post</label>
                            <div class="card-body {{ $errors->get('postBody') ? 'is-invalid' : '' }}">
                                <textarea id="summernote" name="postBody" rows="4" style="resize: none;">{{ old('postBody', $post->body) }}</textarea>
                            </div>
                            {!! $errors->first('postBody',"<span id='postBodyError' class='error invalid-feedback'>:message</span>") !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                    </div>
                    <div class="card-body">
                        {{--datepicker --}}
                        <div class="form-group">
                            <label for="postFecha">Fecha:</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="text" name="postFecha" class="form-control datetimepicker-input" value="{{ old('postFecha',$post->published_at ? $post->published_at->format('Y-m-d') : null) }}" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-append" data-target="#reservationdate">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        {{--option select --}}
                        <div class="form-group">
                           <label for="postCategorias">Categorias</label>
                           <select name="postSelectCategoria" class="custom-select rounded-1 {{ $errors->get('postSelectCategoria') ? 'is-invalid' : '' }}" id="postSelectCategoria">
                                <option value="">Selecciona</option>
                                @foreach($categories as $categorie)
                                    <option value="{{ $categorie->id }}"
                                        {{ old('postSelectCategoria',$categorie->id) == $categorie->id ? 'selected' : '' }}
                                        >{{ $categorie->name }}</option>
                                @endforeach
                           </select>
                           {!! $errors->first('postSelectCategoria',"<span id='postCategoria' class='invalid-feedback'>:message</span>") !!}
                        </div>
                        {{--Select2 --}}
                        <div class="form-group">
                            <label>Seleccionar Tags</label>
                            <div class="select2-purple is-invalid" data-select2-id="50">
                                <select class="select2 select2-hidden-accessible {{ $errors->get('postTags') ? 'is-invalid' : '' }}" name="postTags[]" multiple="multiple" data-placeholder="Selecciona una o Más Etiquetas" data-dropdown-css-class="select2-purple" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                @foreach($tags as $tag)
                                    <option {{ collect(old('postTags' , $post->tags->pluck('id')))->contains($tag->id) ? 'selected' : '' }} value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                                </select>
                                {!! $errors->first('postTags',"<span id='postTags' class='invalid-feedback'>:message</span>") !!}
                            </div>
                          </div>
                        {{-- /fin select2--}}
                        <div class="form-group">
                            <label for="postExtracto">Extracto</label>
                            <textarea name="postExtracto" class="form-control form-control-border {{ $errors->get('postExtracto') ? 'is-invalid' : '' }}" id="extracto" rows="1" style="resize: none;" placeholder="Igresa un Extracto de tu publicación.."></textarea>
                            {!! $errors->first('postExtracto',"<span id='postExtracto' class='invalid-feedback'>:message</span>") !!}
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
  <!-- Select2 -->
  <link rel="stylesheet" href="/adminlte/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="/adminlte/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="/adminlte/plugins/bs-stepper/css/bs-stepper.min.css">

  <!-- summernote -->
  <link rel="stylesheet" href="/adminlte/plugins/summernote/summernote2.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.8.1/min/dropzone.min.css">
@endpush

@push('scriptsagregados')

    <!-- InputMask -->
    <script src="/adminlte/plugins/moment/moment.min.js"></script>
    <!-- Select2 -->
    <script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>
    <!-- date-range-picker -->
    <script src="/adminlte/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="/adminlte/plugins/summernote/summernote2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.8.1/min/dropzone.min.js"></script>
    <script>
        $(document).ready(function() {



            $('#reservationdate').datetimepicker({
                  format: 'yyyy-MM-DD'
            });
            $('#summernote').summernote();
            $('.select2').select2({
                tags: true
            });
        });

        Dropzone.autoDiscover = false;
        new Dropzone('.dropzone', {
            url:'/admin/posts/{{ $post->id }}/photos',
            acceptedFiles: 'image/*',
            maxFiles:1,
            paramName:'photo',
            headers: {
                'X-CSRF-TOKEN':'{{ csrf_token() }}'
            },
            dictDefaultMessage:'Agregar Imagen'
        });
    </script>
@endpush

