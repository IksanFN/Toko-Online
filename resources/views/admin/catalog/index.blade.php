@extends('adminlte::page')

@section('title', 'Catalog')

@section('content_header')
    <h1 class="m-0 text-dark">Catalog</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
          <div class="card border-0 shadow-sm">
            <div class="card-body">
              <a href="{{ route('catalog.create') }}" class="btn shadow-sm btn-primary">Tambah Produk</a>
              
            </div>
          </div>
        </div>
      </div>
      
      <div class="row my-1">
          @foreach ($catalogs as $catalog)
          <div class="col-3">
              <div class="card border-0 shadow-sm rounded text-black">
                  
                  <div class="card-body">
                    <img src="{{  asset('storage/catalog/'.$catalog->image)  }}"
                    class="card-img-top mb-3" alt="Apple Computer" />
                      <div class="row mb-3 px-2">
                        <h5 class="card-title">{{ $catalog->name_product }}</h5>
                      </div>
                      <div class="row px-2">
                        <a href="{{ route('catalog.show', $catalog->id) }}" class="btn btn-sm shadow-sm btn-secondary">View Product</a>
                      </div>
                  </div>
                </div>
          </div>
          @endforeach
      </div>
      <script>
        @if(session()->has('success'))
            toast.success('{{ session('success') }}', 'Berhasil');
        @elseif(session()->has('error'))
            toast.error('{{ session('error') }}', 'Gagal');
        @endif
      </script>
      <x:notify-messages/>
  </div>
@stop