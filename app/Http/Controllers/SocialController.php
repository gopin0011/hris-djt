<?php

namespace App\Http\Controllers;

use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class SocialController extends Controller
{
    public function index()
    {
        $data = Social::where('user_id',Auth::user()->id)->get();
        return view('social.index',compact('data'));
    }

    public function update(Request $request)
    {
        try {
            Social::create([
                'user_id'   => Auth::user()->id,
                'kegiatan'  => Crypt::encryptString($request->kegiatan),
                'tahun'     => Crypt::encryptString($request->tahun),
                'jabatan'   => Crypt::encryptString($request->jabatan),
                'catatan'   => Crypt::encryptString($request->catatan)
            ]);
            alert()->toast('Kegiatan sosial telah berhasil ditambahkan','success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function delete($id)
    {
        $data = Social::find($id);
        try
        {
            if($data->user_id == Auth::user()->id)
            {
                $data->delete();
                alert()->toast('Kegiatan sosial telah dihapus','warning');
                return redirect()->back();
            }
            else{
                alert()->toast('Data tidak ditemukan','error');
                return redirect()->back();
            }
        }
        catch (\Exception $e)
        {
            alert()->toast('Data tidak ditemukan','error');
            return redirect()->back();
        }
    }
}
