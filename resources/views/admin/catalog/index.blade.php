@extends('adminlte::page')

@section('title', 'Catalog')

@section('content_header')
    <h1 class="m-0 text-dark">Catalog</h1>
@stop

@section('content')
    @livewire('catalog-table')
@stop