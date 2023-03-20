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

class ProfileController extends Controller
{
    public function index()
    {
        $data = Profile::where('user_id',Auth::user()->id)->first();
        if($data){
            $detaildata = Profile::where('user_id',Auth::user()->id)->get();
            $a = Application::where('user_id',Auth::user()->id)->get()->count();
            $b = Profile::where('user_id',Auth::user()->id)->get()->count();
            $b1 = Family::where('user_id',Auth::user()->id)->get()->count();
            $b2 = Study::where('user_id',Auth::user()->id)->get()->count();
            $b3 = Question::where('user_id',Auth::user()->id)->get()->count();
            $c = Document::where('user_id',Auth::user()->id)->get()->count();
            return view ('profile.edit',compact('detaildata','a','b','c','b1','b2','b3'));
        }else{
            $a = Application::where('user_id',Auth::user()->id)->get()->count();
            $b = Profile::where('user_id',Auth::user()->id)->get()->count();
            $b1 = Family::where('user_id',Auth::user()->id)->get()->count();
            $b2 = Study::where('user_id',Auth::user()->id)->get()->count();
            $b3 = Question::where('user_id',Auth::user()->id)->get()->count();
            $c = Document::where('user_id',Auth::user()->id)->get()->count();
            return view ('profile.index',compact('a','b','c','b1','b2','b3'));
        }   
    }

    public function store(Request $request)
    {
        $data = Profile::where('user_id',Auth::user()->id)->first();
        if($data){
            try {
                $data->update([
                    'panggilan'     => Crypt::encryptString($request->panggilan),
                    'nik'           => Crypt::encryptString($request->nik),
                    'kontak'        => Crypt::encryptString($request->kontak),
                    'tempatlahir'   => Crypt::encryptString($request->tempatlahir),
                    'hari'          => Crypt::encryptString($request->hari),
                    'bulan'         => Crypt::encryptString($request->bulan),
                    'tahun'         => Crypt::encryptString($request->tahun),
                    'gender'        => Crypt::encryptString($request->gender),
                    'warganegara'   => Crypt::encryptString($request->warganegara),
                    'agama'         => Crypt::encryptString($request->agama),
                    'status'        => Crypt::encryptString($request->status),
                    'darah'         => Crypt::encryptString($request->darah),
                    'alamat'        => Crypt::encryptString($request->alamat),
                    'domisili'      => Crypt::encryptString($request->domisili),
                    'hobi'          => Crypt::encryptString($request->hobi),
                    'tingkat'       => Crypt::encryptString($request->tingkat),
                    'sekolah'       => Crypt::encryptString($request->sekolah),
                    'posisi'        => Crypt::encryptString($request->posisi),
                    'perusahaan'    => Crypt::encryptString($request->perusahaan),
                    'referensi'     => Crypt::encryptString($request->referensi)
                ]);
                alert()->toast('Identitas diri anda telah diubah','success');
                return redirect(route('families.index'));
            } catch(\Exception $e) {
                return redirect()->back()->with(['error' => $e->getMessage()]);
            }      
        }else{
            try {
                Profile::create([
                    'user_id'       => Auth::user()->id,
                    'panggilan'     => Crypt::encryptString($request->panggilan),
                    'nik'           => Crypt::encryptString($request->nik),
                    'kontak'        => Crypt::encryptString($request->kontak),
                    'tempatlahir'   => Crypt::encryptString($request->tempatlahir),
                    'hari'          => Crypt::encryptString($request->hari),
                    'bulan'         => Crypt::encryptString($request->bulan),
                    'tahun'         => Crypt::encryptString($request->tahun),
                    'gender'        => Crypt::encryptString($request->gender),
                    'warganegara'   => Crypt::encryptString($request->warganegara),
                    'agama'         => Crypt::encryptString($request->agama),
                    'status'        => Crypt::encryptString($request->status),
                    'darah'         => Crypt::encryptString($request->darah),
                    'alamat'        => Crypt::encryptString($request->alamat),
                    'domisili'      => Crypt::encryptString($request->domisili),
                    'hobi'          => Crypt::encryptString($request->hobi),
                    'tingkat'       => Crypt::encryptString($request->tingkat),
                    'sekolah'       => Crypt::encryptString($request->sekolah),
                    'posisi'        => Crypt::encryptString($request->posisi),
                    'perusahaan'    => Crypt::encryptString($request->perusahaan),
                    'referensi'     => Crypt::encryptString($request->referensi)
                ]);
                alert()->toast('Identitas diri anda telah disimpan','success');
                return redirect(route('families.index'));
            } catch(\Exception $e) {
                return redirect()->back()->with(['error' => $e->getMessage()]);
            }      
        }   
    }
}
