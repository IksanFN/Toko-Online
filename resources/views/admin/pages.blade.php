@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Pages</h1>
@stop

@section('content')
    @livewire('pages')
@stop