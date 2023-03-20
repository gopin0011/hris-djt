<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Employee;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use \Illuminate\Support\Facades\DB;
class EmployeeController extends Controller
{
    public function index()
    {
        
        
        $employee = DB::table('employees')
        ->join('divisions', 'employees.divisi', '=', 'divisions.nama')
        ->select('employees.id','employees.nik', 'employees.nama', 'employees.kk', 'employees.ktp', 
        'employees.gender', 'employees.agama', 'employees.tmlahir', 'employees.hlahir', 'employees.blahir', 'employees.thahir',
        'employees.alamat', 'employees.bisnis', 'employees.divisi', 'employees.jabatan', 'employees.status',
        'employees.hjoin', 'employees.bjoin', 'employees.thjoin',
        'employees.hakhir', 'employees.bakhir', 'employees.thakhir',
        'employees.masa', 'employees.gaji', 'employees.rekening', 'employees.npwp', 'employees.ptkp',
        'employees.pendidikan', 'employees.sekolah', 'employees.prodi', 'employees.ijazah', 'employees.email', 'employees.sertifikat','divisions.kode as kode')
        ->where([['employees.nik','!=',''],['employees.status','!=','TLH'],['employees.resign',NULL]])->get();
        $total = Employee::where([['nik','!=',''],['status','!=','TLH'],['resign',NULL]])->get();
        $alper = Employee::where([['nik','!=',''],['status','!=','TLH'],['bisnis','=','Alat Peraga'],['resign',NULL]])->get();
        $legano = Employee::where([['nik','!=',''],['status','!=','TLH'],['bisnis','=','Legano'],['resign',NULL]])->get();
        $acount = $total->count();
        $bcount = $alper->count();
        $ccount = $legano->count();
        return view('employee.all', compact('employee','acount','bcount','ccount'));
    }

    public function staffalper()
    {
        $employee = DB::table('employees')
        ->join('divisions', 'employees.divisi', '=', 'divisions.nama')
        ->select('employees.id','employees.nik', 'employees.nama', 'employees.kk', 'employees.ktp', 
        'employees.gender', 'employees.agama', 'employees.tmlahir', 'employees.hlahir', 'employees.blahir', 'employees.thahir',
        'employees.alamat', 'employees.bisnis', 'employees.divisi', 'employees.jabatan', 'employees.status',
        'employees.hjoin', 'employees.bjoin', 'employees.thjoin',
        'employees.hakhir', 'employees.bakhir', 'employees.thakhir',
        'employees.masa', 'employees.gaji', 'employees.rekening', 'employees.npwp', 'employees.ptkp',
        'employees.pendidikan', 'employees.sekolah', 'employees.prodi', 'employees.ijazah', 'employees.email', 'employees.sertifikat','divisions.kode as kode')
        ->where([['employees.nik','!=',''],['employees.status','!=','TLH'],['employees.bisnis','=','Alat Peraga'],['employees.resign',NULL]])->get();
        $total = Employee::where([['nik','!=',''],['status','!=','TLH'],['resign',NULL]])->get();
        $alper = Employee::where([['nik','!=',''],['status','!=','TLH'],['bisnis','=','Alat Peraga'],['resign',NULL]])->get();
        $legano = Employee::where([['nik','!=',''],['status','!=','TLH'],['bisnis','=','Legano'],['resign',NULL]])->get();
        $acount = $total->count();
        $bcount = $alper->count();
        $ccount = $legano->count();
        return view('employee.all', compact('employee','acount','bcount','ccount'));
    }

    public function stafflegano()
    {
        $employee = DB::table('employees')
        ->join('divisions', 'employees.divisi', '=', 'divisions.nama')
        ->select('employees.id','employees.nik', 'employees.nama', 'employees.kk', 'employees.ktp', 
        'employees.gender', 'employees.agama', 'employees.tmlahir', 'employees.hlahir', 'employees.blahir', 'employees.thahir',
        'employees.alamat', 'employees.bisnis', 'employees.divisi', 'employees.jabatan', 'employees.status',
        'employees.hjoin', 'employees.bjoin', 'employees.thjoin',
        'employees.hakhir', 'employees.bakhir', 'employees.thakhir',
        'employees.masa', 'employees.gaji', 'employees.rekening', 'employees.npwp', 'employees.ptkp',
        'employees.pendidikan', 'employees.sekolah', 'employees.prodi', 'employees.ijazah', 'employees.email', 'employees.sertifikat','divisions.kode as kode')
        ->where([['employees.nik','!=',''],['employees.status','!=','TLH'],['employees.bisnis','=','Legano'],['employees.resign',NULL]])->get();
        $total = Employee::where([['nik','!=',''],['status','!=','TLH'],['resign',NULL]])->get();
        $alper = Employee::where([['nik','!=',''],['status','!=','TLH'],['bisnis','=','Alat Peraga'],['resign',NULL]])->get();
        $legano = Employee::where([['nik','!=',''],['status','!=','TLH'],['bisnis','=','Legano'],['resign',NULL]])->get();
        $acount = $total->count();
        $bcount = $alper->count();
        $ccount = $legano->count();
        return view('employee.all', compact('employee','acount','bcount','ccount'));
    }

    public function indextlh()
    {
        $employee = DB::table('employees')
        ->join('divisions', 'employees.divisi', '=', 'divisions.nama')
        ->select('employees.id','employees.nik', 'employees.nama', 'employees.kk', 'employees.ktp', 
        'employees.gender', 'employees.agama', 'employees.tmlahir', 'employees.hlahir', 'employees.blahir', 'employees.thahir',
        'employees.alamat', 'employees.bisnis', 'employees.divisi', 'employees.jabatan', 'employees.status',
        'employees.hjoin', 'employees.bjoin', 'employees.thjoin',
        'employees.hakhir', 'employees.bakhir', 'employees.thakhir',
        'employees.masa', 'employees.gaji', 'employees.rekening', 'employees.npwp', 'employees.ptkp',
        'employees.pendidikan', 'employees.sekolah', 'employees.prodi', 'employees.ijazah', 'employees.email', 'employees.sertifikat','divisions.kode as kode')
        ->where([['employees.nik','!=',''],['employees.status','=','TLH'],['employees.resign',NULL]])->get();
        $total = Employee::where([['nik','!=',''],['status','TLH'],['resign',NULL]])->get();
        $alper = Employee::where([['nik','!=',''],['status','TLH'],['bisnis','=','Alat Peraga'],['resign',NULL]])->get();
        $legano = Employee::where([['nik','!=',''],['status','TLH'],['bisnis','=','Legano'],['resign',NULL]])->get();
        $acount = $total->count();
        $bcount = $alper->count();
        $ccount = $legano->count();
        return view('employee.tlh', compact('employee','acount','bcount','ccount'));
    }

    public function tlhalper()
    {
        $employee = DB::table('employees')
        ->join('divisions', 'employees.divisi', '=', 'divisions.nama')
        ->select('employees.id','employees.nik', 'employees.nama', 'employees.kk', 'employees.ktp', 
        'employees.gender', 'employees.agama', 'employees.tmlahir', 'employees.hlahir', 'employees.blahir', 'employees.thahir',
        'employees.alamat', 'employees.bisnis', 'employees.divisi', 'employees.jabatan', 'employees.status',
        'employees.hjoin', 'employees.bjoin', 'employees.thjoin',
        'employees.hakhir', 'employees.bakhir', 'employees.thakhir',
        'employees.masa', 'employees.gaji', 'employees.rekening', 'employees.npwp', 'employees.ptkp',
        'employees.pendidikan', 'employees.sekolah', 'employees.prodi', 'employees.ijazah', 'employees.email', 'employees.sertifikat','divisions.kode as kode')
        ->where([['employees.nik','!=',''],['employees.status','=','TLH'],['employees.bisnis','=','Alat Peraga'],['employees.resign',NULL]])->get();
        $total = Employee::where([['nik','!=',''],['status','TLH'],['resign',NULL]])->get();
        $alper = Employee::where([['nik','!=',''],['status','TLH'],['bisnis','=','Alat Peraga'],['resign',NULL]])->get();
        $legano = Employee::where([['nik','!=',''],['status','TLH'],['bisnis','=','Legano'],['resign',NULL]])->get();
        $acount = $total->count();
        $bcount = $alper->count();
        $ccount = $legano->count();
        return view('employee.tlh', compact('employee','acount','bcount','ccount'));
    }

    public function tlhlegano()
    {
        $employee = DB::table('employees')
        ->join('divisions', 'employees.divisi', '=', 'divisions.nama')
        ->select('employees.id','employees.nik', 'employees.nama', 'employees.kk', 'employees.ktp', 
        'employees.gender', 'employees.agama', 'employees.tmlahir', 'employees.hlahir', 'employees.blahir', 'employees.thahir',
        'employees.alamat', 'employees.bisnis', 'employees.divisi', 'employees.jabatan', 'employees.status',
        'employees.hjoin', 'employees.bjoin', 'employees.thjoin',
        'employees.hakhir', 'employees.bakhir', 'employees.thakhir',
        'employees.masa', 'employees.gaji', 'employees.rekening', 'employees.npwp', 'employees.ptkp',
        'employees.pendidikan', 'employees.sekolah', 'employees.prodi', 'employees.ijazah', 'employees.email', 'employees.sertifikat','divisions.kode as kode')
        ->where([['employees.nik','!=',''],['employees.status','=','TLH'],['employees.bisnis','=','Legano'],['employees.resign',NULL]])->get();
        $total = Employee::where([['nik','!=',''],['status','TLH'],['resign',NULL]])->get();
        $alper = Employee::where([['nik','!=',''],['status','TLH'],['bisnis','=','Alat Peraga'],['resign',NULL]])->get();
        $legano = Employee::where([['nik','!=',''],['status','TLH'],['bisnis','=','Legano'],['resign',NULL]])->get();
        $acount = $total->count();
        $bcount = $alper->count();
        $ccount = $legano->count();
        return view('employee.tlh', compact('employee','acount','bcount','ccount'));
    }

    public function resign()
    {
        $employee = DB::table('employees')
        ->join('divisions', 'employees.divisi', '=', 'divisions.nama')
        ->select('employees.id','employees.nik', 'employees.nama', 'employees.kk', 'employees.ktp', 
        'employees.gender', 'employees.agama', 'employees.tmlahir', 'employees.hlahir', 'employees.blahir', 'employees.thahir',
        'employees.alamat', 'employees.bisnis', 'employees.divisi', 'employees.jabatan', 'employees.status',
        'employees.hjoin', 'employees.bjoin', 'employees.thjoin',
        'employees.hakhir', 'employees.bakhir', 'employees.thakhir',
        'employees.masa', 'employees.gaji', 'employees.rekening', 'employees.npwp', 'employees.ptkp',
        'employees.pendidikan', 'employees.sekolah', 'employees.prodi', 'employees.ijazah', 'employees.email', 'employees.sertifikat','employees.resign','divisions.kode as kode')
        ->where([['employees.nik','!=',''],['employees.status','!=','TLH'],['employees.resign','!=',NULL]])->get();
        $total = Employee::where([['nik','!=',''],['status','!=','TLH'],['resign','!=',NULL]])->get();
        $alper = Employee::where([['nik','!=',''],['status','!=','TLH'],['bisnis','=','Alat Peraga'],['resign','!=',NULL]])->get();
        $legano = Employee::where([['nik','!=',''],['status','!=','TLH'],['bisnis','=','Legano'],['resign','!=',NULL]])->get();
        $acount = $total->count();
        $bcount = $alper->count();
        $ccount = $legano->count();
        return view('employee.resign', compact('employee','acount','bcount','ccount'));
    }

    public function resignalper()
    {
        $employee = DB::table('employees')
        ->join('divisions', 'employees.divisi', '=', 'divisions.nama')
        ->select('employees.id','employees.nik', 'employees.nama', 'employees.kk', 'employees.ktp', 
        'employees.gender', 'employees.agama', 'employees.tmlahir', 'employees.hlahir', 'employees.blahir', 'employees.thahir',
        'employees.alamat', 'employees.bisnis', 'employees.divisi', 'employees.jabatan', 'employees.status',
        'employees.hjoin', 'employees.bjoin', 'employees.thjoin',
        'employees.hakhir', 'employees.bakhir', 'employees.thakhir',
        'employees.masa', 'employees.gaji', 'employees.rekening', 'employees.npwp', 'employees.ptkp',
        'employees.pendidikan', 'employees.sekolah', 'employees.prodi', 'employees.ijazah', 'employees.email', 'employees.sertifikat','employees.resign','divisions.kode as kode')
        ->where([['employees.nik','!=',''],['employees.status','!=','TLH'],['employees.bisnis','=','Alat Peraga'],['employees.resign','!=',NULL]])->get();
        $total = Employee::where([['nik','!=',''],['status','!=','TLH'],['resign','!=',NULL]])->get();
        $alper = Employee::where([['nik','!=',''],['status','!=','TLH'],['bisnis','=','Alat Peraga'],['resign','!=',NULL]])->get();
        $legano = Employee::where([['nik','!=',''],['status','!=','TLH'],['bisnis','=','Legano'],['resign','!=',NULL]])->get();
        $acount = $total->count();
        $bcount = $alper->count();
        $ccount = $legano->count();
        return view('employee.resign', compact('employee','acount','bcount','ccount'));
    }

    public function resignlegano()
    {
        $employee = DB::table('employees')
        ->join('divisions', 'employees.divisi', '=', 'divisions.nama')
        ->select('employees.id','employees.nik', 'employees.nama', 'employees.kk', 'employees.ktp', 
        'employees.gender', 'employees.agama', 'employees.tmlahir', 'employees.hlahir', 'employees.blahir', 'employees.thahir',
        'employees.alamat', 'employees.bisnis', 'employees.divisi', 'employees.jabatan', 'employees.status',
        'employees.hjoin', 'employees.bjoin', 'employees.thjoin',
        'employees.hakhir', 'employees.bakhir', 'employees.thakhir',
        'employees.masa', 'employees.gaji', 'employees.rekening', 'employees.npwp', 'employees.ptkp',
        'employees.pendidikan', 'employees.sekolah', 'employees.prodi', 'employees.ijazah', 'employees.email', 'employees.sertifikat','employees.resign','divisions.kode as kode')
        ->where([['employees.nik','!=',''],['employees.status','!=','TLH'],['employees.bisnis','=','Legano'],['employees.resign','!=',NULL]])->get();
        $total = Employee::where([['nik','!=',''],['status','!=','TLH'],['resign','!=',NULL]])->get();
        $alper = Employee::where([['nik','!=',''],['status','!=','TLH'],['bisnis','=','Alat Peraga'],['resign','!=',NULL]])->get();
        $legano = Employee::where([['nik','!=',''],['status','!=','TLH'],['bisnis','=','Legano'],['resign','!=',NULL]])->get();
        $acount = $total->count();
        $bcount = $alper->count();
        $ccount = $legano->count();
        return view('employee.resign', compact('employee','acount','bcount','ccount'));
    }

    public function resigntlh()
    {
        $employee = DB::table('employees')
        ->join('divisions', 'employees.divisi', '=', 'divisions.nama')
        ->select('employees.id','employees.nik', 'employees.nama', 'employees.kk', 'employees.ktp', 
        'employees.gender', 'employees.agama', 'employees.tmlahir', 'employees.hlahir', 'employees.blahir', 'employees.thahir',
        'employees.alamat', 'employees.bisnis', 'employees.divisi', 'employees.jabatan', 'employees.status',
        'employees.hjoin', 'employees.bjoin', 'employees.thjoin',
        'employees.hakhir', 'employees.bakhir', 'employees.thakhir',
        'employees.masa', 'employees.gaji', 'employees.rekening', 'employees.npwp', 'employees.ptkp',
        'employees.pendidikan', 'employees.sekolah', 'employees.prodi', 'employees.ijazah', 'employees.email', 'employees.sertifikat','employees.resign','divisions.kode as kode')
        ->where([['employees.nik','!=',''],['employees.status','=','TLH'],['employees.resign','!=',NULL]])->get();
        $total = Employee::where([['nik','!=',''],['status','=','TLH'],['resign','!=',NULL]])->get();
        $alper = Employee::where([['nik','!=',''],['status','=','TLH'],['bisnis','=','Alat Peraga'],['resign','!=',NULL]])->get();
        $legano = Employee::where([['nik','!=',''],['status','=','TLH'],['bisnis','=','Legano'],['resign','!=',NULL]])->get();
        $acount = $total->count();
        $bcount = $alper->count();
        $ccount = $legano->count();
        return view('employee.resigntlh', compact('employee','acount','bcount','ccount'));
    }

    public function resigntlhalper()
    {
        $employee = DB::table('employees')
        ->join('divisions', 'employees.divisi', '=', 'divisions.nama')
        ->select('employees.id','employees.nik', 'employees.nama', 'employees.kk', 'employees.ktp', 
        'employees.gender', 'employees.agama', 'employees.tmlahir', 'employees.hlahir', 'employees.blahir', 'employees.thahir',
        'employees.alamat', 'employees.bisnis', 'employees.divisi', 'employees.jabatan', 'employees.status',
        'employees.hjoin', 'employees.bjoin', 'employees.thjoin',
        'employees.hakhir', 'employees.bakhir', 'employees.thakhir',
        'employees.masa', 'employees.gaji', 'employees.rekening', 'employees.npwp', 'employees.ptkp',
        'employees.pendidikan', 'employees.sekolah', 'employees.prodi', 'employees.ijazah', 'employees.email', 'employees.sertifikat','employees.resign','divisions.kode as kode')
        ->where([['employees.nik','!=',''],['employees.status','=','TLH'],['bisnis','=','Alat Peraga'],['employees.resign','!=',NULL]])->get();
        $total = Employee::where([['nik','!=',''],['status','=','TLH'],['resign','!=',NULL]])->get();
        $alper = Employee::where([['nik','!=',''],['status','=','TLH'],['bisnis','=','Alat Peraga'],['resign','!=',NULL]])->get();
        $legano = Employee::where([['nik','!=',''],['status','=','TLH'],['bisnis','=','Legano'],['resign','!=',NULL]])->get();
        $acount = $total->count();
        $bcount = $alper->count();
        $ccount = $legano->count();
        return view('employee.resigntlh', compact('employee','acount','bcount','ccount'));
    }

    public function resigntlhlegano()
    {
        $employee = DB::table('employees')
        ->join('divisions', 'employees.divisi', '=', 'divisions.nama')
        ->select('employees.id','employees.nik', 'employees.nama', 'employees.kk', 'employees.ktp', 
        'employees.gender', 'employees.agama', 'employees.tmlahir', 'employees.hlahir', 'employees.blahir', 'employees.thahir',
        'employees.alamat', 'employees.bisnis', 'employees.divisi', 'employees.jabatan', 'employees.status',
        'employees.hjoin', 'employees.bjoin', 'employees.thjoin',
        'employees.hakhir', 'employees.bakhir', 'employees.thakhir',
        'employees.masa', 'employees.gaji', 'employees.rekening', 'employees.npwp', 'employees.ptkp',
        'employees.pendidikan', 'employees.sekolah', 'employees.prodi', 'employees.ijazah', 'employees.email', 'employees.sertifikat','employees.resign','divisions.kode as kode')
        ->where([['employees.nik','!=',''],['employees.status','=','TLH'],['bisnis','=','Legano'],['employees.resign','!=',NULL]])->get();
        $total = Employee::where([['nik','!=',''],['status','=','TLH'],['resign','!=',NULL]])->get();
        $alper = Employee::where([['nik','!=',''],['status','=','TLH'],['bisnis','=','Alat Peraga'],['resign','!=',NULL]])->get();
        $legano = Employee::where([['nik','!=',''],['status','=','TLH'],['bisnis','=','Legano'],['resign','!=',NULL]])->get();
        $acount = $total->count();
        $bcount = $alper->count();
        $ccount = $legano->count();
        return view('employee.resigntlh', compact('employee','acount','bcount','ccount'));
    }

    public function basic()
    {
        $employee = Employee::all();
        return view('employee.basic', compact('employee'));
    }

    public function job()
    {
        $employee = Employee::all();
        return view('employee.job', compact('employee'));
    }

    public function finance()
    {
        $employee = Employee::all();
        return view('employee.finance', compact('employee'));
    }

    public function study()
    {
        $employee = Employee::all();
        return view('employee.study', compact('employee'));
    }

    public function reward()
    {
        $employee = Employee::all();
        return view('employee.reward', compact('employee'));
    }

    public function kpi()
    {
        $employee =  DB::table('employees')
        ->join('salaries', 'salaries.nik', '=', 'employees.nik')
        ->select('employees.nik as a','employees.nama as b', 'employees.gaji as c',
        'salaries.kpi as d','salaries.pkpi as e','salaries.nominal as f',
        'salaries.hkpi as g','salaries.bkpi as h','salaries.thkpi as i')
        ->get();

        return view('employee.kpi', compact('employee'));
    }

    public function create()
    {
        $unit = Unit::all();
        $divisi = Division::all();
        return view('employee.create', compact('unit','divisi'));
    }

    public function store(Request $request)
    {       
        if($request->status == 'TLH'){
            $statuskaryawan = 'TLH';
        }else{
            $statuskaryawan = $request->status;
        }

        try {
            Employee::create([
                'nik'       => $request->nik,
                'nama'      => Crypt::encryptString($request->nama),
                'kk'        => Crypt::encryptString($request->kk),
                'ktp'       => Crypt::encryptString($request->ktp),
                'gender'    => Crypt::encryptString($request->gender),
                'agama'     => Crypt::encryptString($request->agama),
                'tmlahir'   => Crypt::encryptString($request->tmlahir),
                'hlahir'    => Crypt::encryptString($request->hlahir),
                'blahir'    => Crypt::encryptString($request->blahir),
                'thahir'    => Crypt::encryptString($request->thahir),
                'alamat'    => Crypt::encryptString($request->alamat),

                'bisnis'    => $request->unit,
                'divisi'    => $request->divisi,
                'jabatan'   => Crypt::encryptString($request->jabatan),
                'status'    => $statuskaryawan,
                'hjoin'     => $request->hjoin,
                'bjoin'     => $request->bjoin,
                'thjoin'    => $request->thjoin,
                'hakhir'    => $request->hakhir,
                'bakhir'    => $request->bakhir,
                'thakhir'   => $request->thakhir,
                'masa'      => Crypt::encryptString($request->masa),

                'gaji'      => Crypt::encryptString($request->gaji),
                'rekening'  => Crypt::encryptString($request->rekening),
                'npwp'      => Crypt::encryptString($request->npwp),
                'ptkp'      => Crypt::encryptString($request->ptkp),

                'pendidikan'=> Crypt::encryptString($request->pendidikan),
                'sekolah'   => Crypt::encryptString($request->sekolah),
                'prodi'     => Crypt::encryptString($request->prodi),
                'ijazah'    => Crypt::encryptString($request->ijazah),
                'email'    => Crypt::encryptString($request->email),
                'sertifikat'        => $request->sertifikat,

                'hreward5'  => Crypt::encryptString($request->hreward5),
                'breward5'  => Crypt::encryptString($request->breward5),
                'threward5' => Crypt::encryptString($request->threward5),
                'reward5'   => Crypt::encryptString($request->reward5),
                'hreward10' => Crypt::encryptString($request->hreward10),
                'breward10' => Crypt::encryptString($request->breward10),
                'threward10'=> Crypt::encryptString($request->threward10),
                'reward10'  => Crypt::encryptString($request->reward10),
                'hreward15' => Crypt::encryptString($request->hreward15),
                'breward15' => Crypt::encryptString($request->breward15),
                'threward15'=> Crypt::encryptString($request->threward15),
                'reward15'  => Crypt::encryptString($request->reward15),

                'sp1'       => Crypt::encryptString($request->sp1),
                'sp2'       => Crypt::encryptString($request->sp2),
                'sp3'       => Crypt::encryptString($request->sp3),
            ]);
            alert()->toast('Data karyawan telah disimpan','success');
            if($request->status != "TLH"){
                return redirect('/employees');
            }else{
                return redirect('/employees/tlh');
            }
        } catch(\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }          
    }
    
    public function edit($id)
    {
        $data = Employee::all()->find($id);
        $unit = Unit::all();
        $divisi = Division::all();
        try
        {
            return view('employee.edit', compact('data','unit','divisi'));
        }
        catch (\Exception $e)
        {
            alert()->toast('Data tidak ditemukan','error');
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {       
        $employee = Employee::find($id);
        try {
            if($request->resign != NULL)
            {
                $resignx = $request->resign;
            }else{
                $resignx = NULL;
            }
            $employee->update([
                'nik'       => $request->nik,
                'nama'      => Crypt::encryptString($request->nama),
                'kk'        => Crypt::encryptString($request->kk),
                'ktp'       => Crypt::encryptString($request->ktp),
                'gender'    => Crypt::encryptString($request->gender),
                'agama'     => Crypt::encryptString($request->agama),
                'tmlahir'   => Crypt::encryptString($request->tmlahir),
                'hlahir'    => Crypt::encryptString($request->hlahir),
                'blahir'    => Crypt::encryptString($request->blahir),
                'thahir'    => Crypt::encryptString($request->thahir),
                'alamat'    => Crypt::encryptString($request->alamat),

                'bisnis'    => $request->bisnis,
                'divisi'    => $request->divisi,
                'jabatan'   => Crypt::encryptString($request->jabatan),
                'status'    => $request->status,
                'hjoin'     => $request->hjoin,
                'bjoin'     => $request->bjoin,
                'thjoin'    => $request->thjoin,
                'hakhir'    => $request->hakhir,
                'bakhir'    => $request->bakhir,
                'thakhir'   => $request->thakhir,
                'masa'      => Crypt::encryptString($request->masa),

                'gaji'      => Crypt::encryptString($request->gaji),
                'rekening'  => Crypt::encryptString($request->rekening),
                'npwp'      => Crypt::encryptString($request->npwp),
                'ptkp'      => Crypt::encryptString($request->ptkp),

                'pendidikan'=> Crypt::encryptString($request->pendidikan),
                'sekolah'   => Crypt::encryptString($request->sekolah),
                'prodi'     => Crypt::encryptString($request->prodi),
                'ijazah'    => Crypt::encryptString($request->ijazah),
                'email'    => Crypt::encryptString($request->email),
                'sertifikat'        => $request->sertifikat,

                'hreward5'  => Crypt::encryptString($request->hreward5),
                'breward5'  => Crypt::encryptString($request->breward5),
                'threward5' => Crypt::encryptString($request->threward5),
                'reward5'   => Crypt::encryptString($request->reward5),
                'hreward10' => Crypt::encryptString($request->hreward10),
                'breward10' => Crypt::encryptString($request->breward10),
                'threward10'=> Crypt::encryptString($request->threward10),
                'reward10'  => Crypt::encryptString($request->reward10),
                'hreward15' => Crypt::encryptString($request->hreward15),
                'breward15' => Crypt::encryptString($request->breward15),
                'threward15'=> Crypt::encryptString($request->threward15),
                'reward15'  => Crypt::encryptString($request->reward15),

                'sp1'       => Crypt::encryptString($request->sp1),
                'sp2'       => Crypt::encryptString($request->sp2),
                'sp3'       => Crypt::encryptString($request->sp3),
                'resign'    => $resignx
            ]);
        
            alert()->toast('Data karyawan telah disimpan','success');
            if($request->status != "TLH"){
                return redirect('/employees');
            }else{
                return redirect('/employees/tlh');
            }
        } catch(\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }          
    }

    public function delete($id)
    {
        $data = Employee::find($id);
        try
        {
            $data->delete();
            alert()->toast('Data karyawan telah dihapus','warning');
            return redirect()->back();  
        }
        catch (\Exception $e)
        {
            alert()->toast('Data tidak ditemukan','error');
            return redirect()->back();
        }
    }

    public function reward_index()
    {
        $employee = Employee::all();
        return view('reward.index', compact('employee'));
    }

    public function reward_edit($id)
    {
        $data = Employee::all()->find($id);
        try
        {
            return view('reward.edit', compact('data'));
        }
        catch (\Exception $e)
        {
            alert()->toast('Data tidak ditemukan','error');
            return redirect()->back();
        }
    }

    public function reward_update(Request $request, $id)
    {       
        $employee = Employee::find($id);
        try {
            $employee->update([
                'hreward5'  => Crypt::encryptString($request->hreward5),
                'breward5'  => Crypt::encryptString($request->breward5),
                'threward5' => Crypt::encryptString($request->threward5),
                'reward5'   => Crypt::encryptString($request->reward5),
                'hreward10' => Crypt::encryptString($request->hreward10),
                'breward10' => Crypt::encryptString($request->breward10),
                'threward10'=> Crypt::encryptString($request->threward10),
                'reward10'  => Crypt::encryptString($request->reward10),
                'hreward15' => Crypt::encryptString($request->hreward15),
                'breward15' => Crypt::encryptString($request->breward15),
                'threward15'=> Crypt::encryptString($request->threward15),
                'reward15'  => Crypt::encryptString($request->reward15)
            ]);
        
            alert()->toast('Data karyawan telah disimpan','success');
            return redirect('/rewards');
        } catch(\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }          
    }

    public function punishment_index()
    {
        $employee = Employee::all();
        return view('punishment.index', compact('employee'));
    }

    public function punishment_edit($id)
    {
        $data = Employee::all()->find($id);
        try
        {
            return view('punishment.edit', compact('data'));
        }
        catch (\Exception $e)
        {
            alert()->toast('Data tidak ditemukan','error');
            return redirect()->back();
        }
    }

    public function punishment_update(Request $request, $id)
    {       
        $employee = Employee::find($id);
        try {
            $employee->update([
                'sp1'  => Crypt::encryptString($request->sp1),
                'sp2'  => Crypt::encryptString($request->sp2),
                'sp3'  => Crypt::encryptString($request->sp3),
            ]);
        
            alert()->toast('Data karyawan telah disimpan','success');
            return redirect('/punishments');
        } catch(\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }          
    }
}
