<?php

namespace App\Http\Livewire;

use App\Models\Catalog;
use Livewire\Component;

class CatalogTable extends Component
{
    public function render()
    {
        
        return view('admin.catalog.index');
    }
}
