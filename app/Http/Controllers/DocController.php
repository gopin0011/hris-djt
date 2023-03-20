<?php

namespace App\Http\Controllers;

use App\Models\Doc;
use Illuminate\Http\Request;
use File;

class DocController extends Controller
{
    public function index()
    {
        $data = Doc::all();
        return view('doc.index', compact('data'));
    }

    public function user()
    {
        $data = Doc::all();
        return view('doc.user', compact('data'));
    }

    public function process( Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:pdf|max:4096'
        ]);

        $file = $request->file('file');
        $tujuan_upload = 'form';

        try {
            Doc::create([
                'nama' => $file->getClientOriginalName(),
                'lokasi' => $tujuan_upload . "/" . $file->getClientOriginalName(),
                'tipe' => $file->getClientMimeType(),
                'format' => $file->getClientOriginalExtension()
            ]);
           
            $file->move($tujuan_upload,$file->getClientOriginalName());
            alert()->toast('Dokumen telah berhasil ditambahkan','success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function delete($id)
    {
        $data = Doc::find($id);
        File::delete($data->file);
        $data->delete();
        alert()->toast('Dokumen telah dihapus','warning');
        return redirect()->back();
    }
}
