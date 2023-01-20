<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use notify;
use App\Models\Catalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Spatie\FlareClient\View;
use Illuminate\Support\Facades\Storage;

class CatalogController extends Controller
{
    public function index()
    {
        // $client = new Client();
        // $url = "http://localhost/api/catalogs";

        // $respone = $client->request('GET', $url, [
        //     'verify' => false,
        // ]);

        // $responeBody = json_decode($respone->getBody());
        // return Http::dd()->get('http://localhost/api/catalogs');
        // dd($responeBody);
        $catalogs = Catalog::latest()->paginate(5);
        return view('admin.catalog.index', compact('catalogs'));
    }

    public function create()
    {
        return view('admin.catalog.create');
    }

    // Add new product
    public function store(Request $request)
    {
        // Validate Data
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,jpg,png,svg|max:2048',
            'name_product' => 'required|min:5',
            'description' => 'required|min:10'
        ]);

        // Upload Image
        $image = $request->file('image');
        $image->storeAs('public/catalog', $image->hashName());

        // Create Data Catalog
        Catalog::create([
            'image' => $image->hashName(),
            'name_product' => $request->name_product,
            'description' => $request->description,
        ]);
        notify()->success('Data berhasil di tambahkan');
        return redirect()->route('catalog.index');
    }

    // Show detail product
    public function show(Catalog $catalog)
    {
        // Get find id
        $detailCatalog = Catalog::find($catalog->id);
        
        // Return view
        return view('admin.catalog.show', compact('detailCatalog'));
    }

    // Delete data 
    public function destroy(Catalog $catalog)
    {
        // Get find id data
        Storage::delete('public/catalog/'.$catalog->image);

        // Delete Catalog
        $catalog->delete();
        notify()->success('Data berhasil di hapus');
        return redirect()->route('catalog.index');
    }

    public function edit(Catalog $catalog)
    {
        return view('admin.catalog.update', compact('catalog'));
    }

    public function update(Request $request, Catalog $catalog)
    {
        // Validate Form
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name_product' => 'required|min:5',
            'description' => 'required|min:10'
        ]);

        // Check if image is upload
        if ($request->hasFile('image')) {
            
            // Upload new image
            $image = $request->file('image');
            $image->storeAs('public/catalog', $image->hashName());

            // Delete Old Image 
            Storage::delete('public/catalog'.$catalog->image);

            // Update Catalog with new image
            $catalog->update([
                'image' => $image->hashName(),
                'name_product' => $request->name_product,
                'description' => $request->description,
            ]);
        } else {
            // Update catalog without image
            $catalog->update([
                'name_product' => $request->name_product,
                'description' => $request->description,
            ]);
        }   
        notify()->success('Data produk berhasil diedit');
        return redirect()->route('catalog.index');
    }
}
