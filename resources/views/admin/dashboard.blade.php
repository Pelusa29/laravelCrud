@extends('admin.layout')

@section('administracion')
    <h1>Usuario autenticado: </h1>{{auth()->user()->name}}
@endsection
