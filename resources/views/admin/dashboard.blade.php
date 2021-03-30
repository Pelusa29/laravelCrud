@extends('admin.layout')

@section('administracion')

    @if(Auth::user()->hasRole('admin'))
        <h1>Administrador autenticado: </h1>{{auth()->user()->name}}
    @else
        <h1>Usuario autenticado: </h1>{{auth()->user()->name}}
    @endif
@endsection
