<?php

namespace App\Http\Livewire;

use App\Models\Catalog;
use Livewire\Component;

class CatalogTable extends Component
{
    public function render()
    {
        $catalogs = Catalog::latest()->paginate(5);
        return view('livewire.catalog-table', compact('catalogs'));
    }
}
