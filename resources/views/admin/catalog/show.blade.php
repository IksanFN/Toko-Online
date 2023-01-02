@extends('adminlte::page')

@section('title', 'Detail Catalog')

@section('content_header')
    <h1 class="m-0 text-dark">Detail Catalog</h1>
@stop

@section('content')
<div class="row">
    <div class="col-10 md-6">
        <div class="card border-0 shadow">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset('storage/catalog/'.$detailCatalog->image) }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-6 py-2">
                        <h4 class="text-bold">{{ $detailCatalog->name_product }}</h4>
                        <hr>
                        <p class="lead">{{ $detailCatalog->description }}</p>
                    </div>
                </div>
                <div class="row mx-3 justify-content-end">
                    <form onsubmit="return confirm('Apakah anda yakin?')" action="{{ route('catalog.destroy', $detailCatalog->id)}}" method="POST">
                        <a href="{{ route('catalog.index') }}" class="btn btn-sm btn-secondary px-3">Back</a>
                        <a href="{{ route('catalog.edit', $detailCatalog->id) }}" class="btn btn-sm btn-warning mx-2">Edit</a>
                        @csrf
                        @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop