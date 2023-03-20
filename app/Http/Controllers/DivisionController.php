<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class DivisionController extends Controller
{
    public function index()
    {
        $data = Division::all();
        return view('division.index',compact('data'));
    }

    public function update(Request $request)
    {
        try {
            Division::create([
                'nama'  => $request->nama,
                'kode'  => $request->kode
            ]);
            alert()->toast('Divisi telah berhasil ditambahkan','success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function delete($id)
    {
        $data = Division::find($id);
        try
        {
            $data->delete();
            alert()->toast('Divisi telah dihapus','warning');
            return redirect()->back();
        }
        catch (\Exception $e)
        {
            alert()->toast('Data tidak ditemukan','error');
            return redirect()->back();
        }
    }
}
