<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Unit;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class VacancyController extends Controller
{
    public function index()
    {
        $data = Vacancy::all();
        return view ('vacancy.index', compact('data'));
    }

    public function list()
    {
        $data = Vacancy::all();
        return view ('vacancy.list', compact('data'));
    }

    public function create()
    {
        $unit = Unit::all();
        $divisi = Division::all();
        return view('vacancy.create', compact('unit','divisi'));
    }

    public function store(Request $request)
    {
        try {
            Vacancy::create([
                'nama'      => $request->nama,
                'unit'      => $request->unit,
                'divisi'    => $request->divisi,
                'deskripsi' => $request->deskripsi,
                'status'    => $request->status
            ]);
           
            return redirect(route('vacancies.index'))->with([alert()->toast('Lowongan kerja telah ditambahkan','success')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        $Vacancy = Vacancy::find($id);
        try {
            $Vacancy->update([
                'nama'      => $request->nama,
                'unit'      => $request->unit,
                'divisi'    => $request->divisi,
                'deskripsi' => $request->deskripsi,
                'status'    => $request->status
            ]);
           
            return redirect(route('vacancies.index'))->with([alert()->toast('Lowongan kerja telah diubah','success')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $data = Vacancy::all()->find($id);
        try
        {
            $unit = Unit::all();
            $divisi = Division::all();
            return view('vacancy.edit', compact('unit','divisi','data'));
        }
        catch (\Exception $e)
        {
            alert()->toast('Data tidak ditemukan','error');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $data = Vacancy::find($id);
        try
        {
            $data->delete();
            alert()->toast('Lowongan kerja telah dihapus','warning');
            return redirect()->back();
        }
        catch (\Exception $e)
        {
            alert()->toast('Data tidak ditemukan','error');
            return redirect()->back();
        }
    }
}
