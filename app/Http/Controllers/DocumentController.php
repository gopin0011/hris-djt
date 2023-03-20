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
use \Illuminate\Support\Facades\DB;
use File;

class DocumentController extends Controller
{
    public function index()
    {
        $data = Document::where('user_id',Auth::user()->id)->get();
        $a = Application::where('user_id',Auth::user()->id)->get()->count();
        $b = Profile::where('user_id',Auth::user()->id)->get()->count();
        $b1 = Family::where('user_id',Auth::user()->id)->get()->count();
        $b2 = Study::where('user_id',Auth::user()->id)->get()->count();
        $b3 = Question::where('user_id',Auth::user()->id)->get()->count();
        $c = Document::where('user_id',Auth::user()->id)->get()->count();
        return view('document.index', compact('data','a','b','c','b1','b2','b3'));
    }

    public function process( Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:pdf|max:10000'
        ]);

        $user_id = Auth::user()->id;
        $file = $request->file('file');
        $tipe = 'bundle';
        $tujuan_upload = 'dokumenpelamar/' . Auth::user()->key;

        try {
            Document::create([
                'user_id' => $user_id,
                'file' => 'rekrutmen.pdf',
                'lokasi' => $tujuan_upload . "/" . 'rekrutmen.pdf',
                'tipe' => $tipe,
                'format' => $file->getClientMimeType()
            ]);
           
            $file->move($tujuan_upload,'rekrutmen.pdf');
            alert()->toast('Dokumen telah berhasil ditambahkan','success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
           
        /*echo 'File Name: '.$file->getClientOriginalName();
        echo 'File Extension: '.$file->getClientOriginalExtension();
        echo 'File Real Path: '.$file->getRealPath();
        echo 'File Size: '.$file->getSize();
        echo 'File Mime Type: '.$file->getMimeType();*/
    }

    public function delete($id)
    {
        $data = Document::find($id);
        if($data->user_id == Auth::user()->id || Auth::user()->admin == 3 || Auth::user()->admin == 2)
        {
            File::delete($data->file);
            $data->delete();
            alert()->toast('Dokumen telah dihapus','warning');
            return redirect()->back();
        }
    }

    public function all(Request $request)
    {
        $data =  DB::table('documents')
        ->join('users', 'users.id', '=', 'documents.user_id')
        ->select('documents.id as id','users.name as name','documents.file as file','documents.lokasi as lokasi','documents.tipe as tipe')
        ->orderBy('name')
        ->get(); 

        //if($request->ajax())
        //{
        //    return datatables()->of($data)->make(true);
        //}
        
        return view('document.all', compact('data'));
    }
}
