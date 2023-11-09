<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Rekening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekeningController extends Controller
{
    public function index(){
        $data = Rekening::get();
        return view('admin.rekening.rekenings', ['data' => $data]);
    }

    public function tambah(){
        return view('admin.rekening.tambah');
    }

    public function store(Request $request){
        $request->validate([
            'nama_bank' => 'required',
            'atas_nama' => 'required',
            'no_rek' => 'required',
        ],[
            'nama_bank.required' => 'Nama bank wajib diisi',
            'atas_nama.required' => 'Atas nama wajib diisi',
            'no_rek.required' => 'Nomer rekening wajib diisi',
        ]);

        $data = new Rekening([
            'nama_bank' => $request->nama_bank,
            'atas_nama' => $request->atas_nama,
            'no_rek' => $request->no_rek
        ]);
        $data->save();
        return redirect()->route('admin.rekening.rekenings');
    }

    public function edit($id){
        $data = Rekening::findOrFail($id);
        return view('admin.rekening.edit', ['data' => $data]);
    }

    public function update(Request $request, $id){
        $data = Rekening::findOrFail($id);

        $data->nama_bank = $request->nama_bank;
        $data->atas_nama = $request->atas_nama;
        $data->no_rek = $request->no_rek;
        $data->save();
        
        return redirect()->route('admin.rekening.rekenings');

    }

    public function delete($id){
        Rekening::destroy($id);
        return redirect()->route('admin.rekening.rekenings');
    }

    public function user(){
        $data = DB::table('users')
                ->select('users.*')
                ->where('role','!=','admin')
                ->get();
        return view('admin.user',['data' => $data]);
    }
}
