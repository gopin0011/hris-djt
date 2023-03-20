<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Document;
use App\Models\Family;
use App\Models\Profile;
use App\Models\Question;
use App\Models\Study;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class StudyController extends Controller
{
    public function index()
    {
        $data = Study::where('user_id',Auth::user()->id)->orderBy('id')->get();
        $a = Application::where('user_id',Auth::user()->id)->get()->count();
        $b = Profile::where('user_id',Auth::user()->id)->get()->count();
        $b1 = Family::where('user_id',Auth::user()->id)->get()->count();
        $b2 = Study::where('user_id',Auth::user()->id)->get()->count();
        $b3 = Question::where('user_id',Auth::user()->id)->get()->count();
        $c = Document::where('user_id',Auth::user()->id)->get()->count();
        return view('study.index',compact('data','a','b','c','b1','b2','b3'));
    }

    public function update(Request $request)
    {
        try {
            if(Auth::user()->admin == 0){
                Study::create([
                    'user_id'   => Auth::user()->id,
                    'nama'      => Crypt::encryptString($request->nama),
                    'tingkat'   => Crypt::encryptString($request->tingkat),
                    'kota'      => Crypt::encryptString($request->kota),
                    'jurfak'    => Crypt::encryptString($request->jurfak),
                    'masuk'     => Crypt::encryptString($request->masuk),
                    'keluar'    => Crypt::encryptString($request->keluar)
                ]);
            }else{
                Study::create([
                    'user_id'   => $request->usid,
                    'nama'      => Crypt::encryptString($request->nama),
                    'tingkat'   => Crypt::encryptString($request->tingkat),
                    'kota'      => Crypt::encryptString($request->kota),
                    'jurfak'    => Crypt::encryptString($request->jurfak),
                    'masuk'     => Crypt::encryptString($request->masuk),
                    'keluar'    => Crypt::encryptString($request->keluar)
                ]);
            }

            alert()->toast('Data pendidikan telah berhasil ditambahkan','success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function delete($id)
    {
        $data = Study::find($id);
        try
        {
            if($data->user_id == Auth::user()->id)
            {
                $data->delete();
                alert()->toast('Data pendidikan telah dihapus','warning');
                return redirect()->back();
            }else if(Auth::user()->admin == 2 || Auth::user()->admin == 3)
            {
                $data->delete();
                alert()->toast('Data pendidikan telah dihapus','warning');
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
