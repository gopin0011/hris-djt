<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Career;
use App\Models\Document;
use App\Models\Family;
use App\Models\Profile;
use App\Models\Question;
use App\Models\Study;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class CareerController extends Controller
{
    public function index()
    {
        $data = Career::where('user_id',Auth::user()->id)->get();
        $a = Application::where('user_id',Auth::user()->id)->get()->count();
        $b = Profile::where('user_id',Auth::user()->id)->get()->count();
        $b1 = Family::where('user_id',Auth::user()->id)->get()->count();
        $b2 = Study::where('user_id',Auth::user()->id)->get()->count();
        $b3 = Question::where('user_id',Auth::user()->id)->get()->count();
        $c = Document::where('user_id',Auth::user()->id)->get()->count();
        return view('career.index',compact('data','a','b','c','b1','b2','b3'));
    }

    public function create()
    {
        $a = Application::where('user_id',Auth::user()->id)->get()->count();
        $b = Profile::where('user_id',Auth::user()->id)->get()->count();
        $b1 = Family::where('user_id',Auth::user()->id)->get()->count();
        $b2 = Study::where('user_id',Auth::user()->id)->get()->count();
        $b3 = Question::where('user_id',Auth::user()->id)->get()->count();
        $c = Document::where('user_id',Auth::user()->id)->get()->count();
        return view('career.create',compact('a','b','c','b1','b2','b3'));
    }

    public function store(Request $request)
    {
        try {
          if(Auth::user()->admin == 0)
          {
            Career::create([
                'user_id'       => Auth::user()->id,
                'perusahaan'    => Crypt::encryptString($request->perusahaan),
                'alamat'        => Crypt::encryptString($request->alamat),
                'jabatan'       => Crypt::encryptString($request->jabatan),
                'bulanmasuk'    => Crypt::encryptString($request->bulanmasuk),
                'tahunmasuk'    => Crypt::encryptString($request->tahunmasuk),
                'bulankeluar'   => Crypt::encryptString($request->bulankeluar),
                'tahunkeluar'   => Crypt::encryptString($request->tahunkeluar),
                'gaji'          => Crypt::encryptString($request->gaji),
                'pekerjaan'     => Crypt::encryptString($request->pekerjaan),
                'prestasi'      => Crypt::encryptString($request->prestasi),
                'alasan'        => Crypt::encryptString($request->alasan)
            ]);
            return redirect(route('careers.index'))->with([alert()->toast('Pengalaman kerja telah ditambahkan','success')]);
          }else{
            Career::create([
                'user_id'       => $request->usid,
                'perusahaan'    => Crypt::encryptString($request->perusahaan),
                'alamat'        => Crypt::encryptString($request->alamat),
                'jabatan'       => Crypt::encryptString($request->jabatan),
                'bulanmasuk'    => Crypt::encryptString($request->bulanmasuk),
                'tahunmasuk'    => Crypt::encryptString($request->tahunmasuk),
                'bulankeluar'   => Crypt::encryptString($request->bulankeluar),
                'tahunkeluar'   => Crypt::encryptString($request->tahunkeluar),
                'gaji'          => Crypt::encryptString($request->gaji),
                'pekerjaan'     => Crypt::encryptString($request->pekerjaan),
                'prestasi'      => Crypt::encryptString($request->prestasi),
                'alasan'        => Crypt::encryptString($request->alasan)
            ]);
            return redirect(route('editor.career', ['id' => $request->usid]))->with([alert()->toast('Pengalaman kerja telah ditambahkan','success')]);
          }
           
            
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        $career = Career::find($id);
        try {
            $career->update([
                'perusahaan'    => Crypt::encryptString($request->perusahaan),
                'alamat'        => Crypt::encryptString($request->alamat),
                'jabatan'       => Crypt::encryptString($request->jabatan),
                'bulanmasuk'    => Crypt::encryptString($request->bulanmasuk),
                'tahunmasuk'    => Crypt::encryptString($request->tahunmasuk),
                'bulankeluar'   => Crypt::encryptString($request->bulankeluar),
                'tahunkeluar'   => Crypt::encryptString($request->tahunkeluar),
                'gaji'          => Crypt::encryptString($request->gaji),
                'pekerjaan'     => Crypt::encryptString($request->pekerjaan),
                'prestasi'      => Crypt::encryptString($request->prestasi),
                'alasan'        => Crypt::encryptString($request->alasan)
            ]);
           if(Auth::user()->admin == 0)
           {
                return redirect(route('careers.index'))->with([alert()->toast('Pengalaman kerja telah diubah','success')]);
           }else{
            return redirect(route('editor.career', ['id' => $request->usid]))->with([alert()->toast('Pengalaman kerja telah diubah','success')]);
           }
            
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $data = Career::all()->find($id);
        try
        {
            if($data->user_id == Auth::user()->id)
            {
                $a = Application::where('user_id',Auth::user()->id)->get()->count();
                $b = Profile::where('user_id',Auth::user()->id)->get()->count();
                $b1 = Family::where('user_id',Auth::user()->id)->get()->count();
                $b2 = Study::where('user_id',Auth::user()->id)->get()->count();
                $b3 = Question::where('user_id',Auth::user()->id)->get()->count();
                $c = Document::where('user_id',Auth::user()->id)->get()->count();
                return view('career.edit',compact('data','a','b','c','b1','b2','b3'));
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

    public function delete($id)
    {
        $data = Career::find($id);
        try
        {
            if($data->user_id == Auth::user()->id)
            {
                $data->delete();
                alert()->toast('Pengalaman kerja telah dihapus','warning');
                return redirect()->back();
            }elseif(Auth::user()->admin == 2 || Auth::user()->admin == 3){
                $data->delete();
                alert()->toast('Pengalaman kerja telah dihapus','warning');
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
