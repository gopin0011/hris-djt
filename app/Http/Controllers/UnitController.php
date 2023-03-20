<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class UnitController extends Controller
{
    public function index()
    {
        $data = Unit::all();
        return view('unit.index',compact('data'));
    }

    public function update(Request $request)
    {
        try {
            Unit::create([
                'nama'  => $request->nama,
                'kode'  => $request->kode
            ]);
            alert()->toast('Unit bisnis telah berhasil ditambahkan','success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function delete($id)
    {
        $data = Unit::find($id);
        try
        {
            $data->delete();
            alert()->toast('Unit bisnis telah dihapus','warning');
            return redirect()->back();
        }
        catch (\Exception $e)
        {
            alert()->toast('Data tidak ditemukan','error');
            return redirect()->back();
        }
    }
}
