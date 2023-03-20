<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Document;
use App\Models\Family;
use App\Models\Profile;
use App\Models\Question;
use App\Models\Reference;
use App\Models\Study;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class ReferenceController extends Controller
{
    public function index()
    {
        $data = Reference::where('user_id',Auth::user()->id)->get();
        $a = Application::where('user_id',Auth::user()->id)->get()->count();
        $b = Profile::where('user_id',Auth::user()->id)->get()->count();
        $b1 = Family::where('user_id',Auth::user()->id)->get()->count();
        $b2 = Study::where('user_id',Auth::user()->id)->get()->count();
        $b3 = Question::where('user_id',Auth::user()->id)->get()->count();
        $c = Document::where('user_id',Auth::user()->id)->get()->count();
        return view('reference.index',compact('data','a','b','c','b1','b2','b3'));
    }

    public function update(Request $request)
    {
        try {
            if(Auth::user()->admin == 0){
                Reference::create([
                    'user_id'   => Auth::user()->id,
                    'nama'      => Crypt::encryptString($request->nama),
                    'perusahaan'=> Crypt::encryptString($request->perusahaan),
                    'jabatan'   => Crypt::encryptString($request->jabatan),
                    'kontak'    => Crypt::encryptString($request->kontak)
                ]);
            }else{
                Reference::create([
                    'user_id'   => $request->usid,
                    'nama'      => Crypt::encryptString($request->nama),
                    'perusahaan'=> Crypt::encryptString($request->perusahaan),
                    'jabatan'   => Crypt::encryptString($request->jabatan),
                    'kontak'    => Crypt::encryptString($request->kontak)
                ]);
            }
           
            alert()->toast('Referensi telah berhasil ditambahkan','success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function delete($id)
    {
        $data = Reference::find($id);
        try
        {
            if($data->user_id == Auth::user()->id)
            {
                $data->delete();
                alert()->toast('Data referensi telah dihapus','warning');
                return redirect()->back();
            }else if(Auth::user()->admin == 2 || Auth::user()->admin == 3)
            {
                $data->delete();
                alert()->toast('Data referensi telah dihapus','warning');
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
