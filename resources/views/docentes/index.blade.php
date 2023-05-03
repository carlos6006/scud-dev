@extends('adminlte::page')

@section('title', 'Docentes')

@section('content_header')
    <h1>Listado Docentes</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    <a href="{{ url('docentes/create') }}" class="btn btn-primary btn-sm">Nuevo registro</a>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
   <script> console.log('Hi!'); </script>
@stop