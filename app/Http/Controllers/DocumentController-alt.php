<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\DB;
use File;

class DocumentController extends Controller
{
    public function index()
    {
        $data = Document::where('user_id',Auth::user()->id)->get();
        return view('document.index', compact('data'));
    }

    public function process( Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:pdf|max:2048'
        ]);

        $user_id = Auth::user()->id;
        $file = $request->file('file');
        $tipe = $request->tipe;
        $tujuan_upload = 'dokumenpelamar/' . Auth::user()->key;

        try {
            Document::create([
                'user_id' => $user_id,
                'file' => $file->getClientOriginalName(),
                'lokasi' => $tujuan_upload . "/" . $file->getClientOriginalName(),
                'tipe' => $tipe,
                'format' => $file->getClientMimeType()
            ]);
           
            $file->move($tujuan_upload,$file->getClientOriginalName());
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
