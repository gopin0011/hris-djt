<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class LanguageController extends Controller
{
    public function index()
    {
        $data = Language::where('user_id',Auth::user()->id)->get();
        return view('language.index',compact('data'));

        //$nric = 'Menengah';
        //$data = Language::all()->filter(function($data) use($nric) {
        //    if(Crypt::decryptString($data->menulis) == $nric) {
        //        return($data);
        //    }
        //});
    }

    public function update(Request $request)
    {
        try {
            Language::create([
                'user_id'   => Auth::user()->id,
                'bahasa'    => Crypt::encryptString($request->bahasa),
                'menulis'   => Crypt::encryptString($request->menulis),
                'membaca'   => Crypt::encryptString($request->membaca),
                'bicara'    => Crypt::encryptString($request->bicara),
                'catatan'   => Crypt::encryptString($request->catatan)
            ]);
            alert()->toast('Data bahasa telah berhasil ditambahkan','success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function delete($id)
    {
        $data = Language::find($id);
        try
        {
            if($data->user_id == Auth::user()->id)
            {
                $data->delete();
                alert()->toast('Data bahasa telah dihapus','warning');
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
