@extends('adminlte::page')

@section('title', 'Update Catalog')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Catalog</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12 col-md-12">
        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('catalog.update', $catalog->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-2">
                        <label for="image">Image Produk</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label>Nama Produk</label>
                        <input type="text" name="name_product" class="form-control" value="{{ old('name_product', $catalog->name_product) }}">
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <input type="text" name="description" class="form-control" value="{{ old('description', $catalog->description) }}">
                    </div>
                    <div class="mb-2">
                        <button type="submit" class="btn shadow-sm btn-warning">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop