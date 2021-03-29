<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <form action="{{ route('admin.posts.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Agregar Nuevo Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputBorder">Título de la Publicación</label>
                        <input type="text" class="form-control form-control-border {{ $errors->get('postTitulo') ? 'is-invalid' : '' }}" value="{{old('postTitulo')}}" name="postTitulo" id="postTitulo" placeholder="Título Post">
                        {!! $errors->first('postTitulo',"<span id='postTituloError' class='error invalid-feedback'>:message</span>") !!}
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </form>
  </div>
