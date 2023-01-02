<div class="row">
    <div class="col-12 col-md-6">
        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('catalog.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2">
                        <label for="image">Image Produk</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label>Nama Produk</label>
                        <input type="text" name="name_product" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <input type="text" name="description" class="form-control">
                    </div>
                    <div class="mb-2">
                        <button type="submit" class="btn shadow-sm btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
