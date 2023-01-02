@extends('adminlte::page')

@section('title', 'Tambah Produk')

@section('content_header')
    <h1 class="m-0 text-dark">Catalog</h1>
@stop

@section('content')
    @livewire('create-catalog')
@stop