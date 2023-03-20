<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Document;
use App\Models\Family;
use App\Models\Profile;
use App\Models\Question;
use App\Models\Study;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class TrainingController extends Controller
{
    public function index()
    {
        $data = Training::where('user_id',Auth::user()->id)->get();
        $a = Application::where('user_id',Auth::user()->id)->get()->count();
        $b = Profile::where('user_id',Auth::user()->id)->get()->count();
        $b1 = Family::where('user_id',Auth::user()->id)->get()->count();
        $b2 = Study::where('user_id',Auth::user()->id)->get()->count();
        $b3 = Question::where('user_id',Auth::user()->id)->get()->count();
        $c = Document::where('user_id',Auth::user()->id)->get()->count();
        return view('training.index',compact('data','a','b','c','b1','b2','b3'));
    }

    public function update(Request $request)
    {
        try {
            Training::create([
                'user_id'   => Auth::user()->id,
                'kursus'    => Crypt::encryptString($request->kursus),
                'tahun'     => Crypt::encryptString($request->tahun),
                'durasi'    => Crypt::encryptString($request->durasi),
                'ijazah'    => Crypt::encryptString($request->ijazah),
                'biaya'     => Crypt::encryptString($request->biaya)
            ]);
            alert()->toast('Data pelatihan telah berhasil ditambahkan','success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function delete($id)
    {
        $data = Training::find($id);
        try
        {
            if($data->user_id == Auth::user()->id)
            {
                $data->delete();
                alert()->toast('Data pelatihan telah dihapus','warning');
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
