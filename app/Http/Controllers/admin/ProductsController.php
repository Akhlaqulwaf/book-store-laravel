<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function index() {
        $data = Products::paginate(10);
        return view('admin.product.products', ['data' => $data]);
    }

    public function tambah(){
        return view('admin.product.tambah');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'image' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
        ],[
            'name.required' => 'nama wajib diisi',
            'category.required' => 'kategori wajib diisi',
            'deskripsi.required' => 'deskripsi wajib diisi',
            'harga.required' => 'harga wajib diisi',
            'stok.required' => 'stok wajib diisi',
            'image.required' => 'masukan gambar'
        ]);
        
        $filePath = $request->file('image')->store('imageproduct','public');

        $image = new Products([
            'name' => $request->name,
            'category' => $request->category,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'image' => $filePath
        ]);
        $image->save();

        return redirect()->route('admin.product.products');
    }

    public function edit($id){
        $data = Products::findOrFail($id);

        return view('admin.product.edit', ['data' => $data]);
    }

    public function update($id, Request $request){
        $data = Products::findOrFail($id);

        if($request->file('image')){
            Storage::delete('public/'.$data->image);
            
            $file = $request->file('image')->store('imageproduct', 'public');

            $data->image = $file;
        }
        $data->name = $request->name;
        $data->category = $request->category;
        $data->deskripsi = $request->deskripsi;
        $data->harga = $request->harga;
        $data->stok = $request->stok;

        $data->save();

        return redirect()->route('admin.product.products');
    }

    public function delete($id){
        $data = Products::findOrFail($id);
        Products::destroy($id);
        Storage::delete('public/'.$data->image);

        return redirect()->route('admin.product.products');
    }
}
