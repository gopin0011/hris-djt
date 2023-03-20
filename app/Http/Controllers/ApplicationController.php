<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Document;
use App\Models\Family;
use App\Models\Invcode;
use App\Models\Log;
use App\Models\Profile;
use App\Models\Question;
use App\Models\Study;
use App\Models\User;
use App\Models\Vacancy;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use \Illuminate\Support\Facades\DB;

class ApplicationController extends Controller
{
    public function index()
    {
        $data = Application::where('user_id',Auth::user()->id)->get();
        $hitung = Application::where([['user_id',Auth::user()->id],['hasil',NULL]])->get();
        $x = $hitung->count();
        $vacancy = Vacancy::where('status','1')->get();
        $a = Application::where('user_id',Auth::user()->id)->get()->count();
        $b = Profile::where('user_id',Auth::user()->id)->get()->count();
        $b1 = Family::where('user_id',Auth::user()->id)->get()->count();
        $b2 = Study::where('user_id',Auth::user()->id)->get()->count();
        $b3 = Question::where('user_id',Auth::user()->id)->get()->count();
        $c = Document::where('user_id',Auth::user()->id)->get()->count();
        return view('application.index',compact('data','vacancy','hitung','x','a','b','c','b1','b2','b3'));
    }

    public function jobedit($id)
    {
        $app=Application::find($id);
        $user=User::find($app->user_id);
        //dd($app, $user);
        return view('application.jobedit', compact('id','app','user'));
    }

    public function jobeditStore(Request $request, $id)
    {
        $data = Application::find($id);
        try {
            $data->update([
                'posisi' => Crypt::encryptString($request->posisi),
            ]);
            return redirect(route('applications.all'))->with([alert()->toast('Posisi telah diubah','success')]);
            
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request)
    {
        $caricode = Invcode::where([['code', $request->code],['email', Auth::user()->email],['loker', $request->posisi]])->first();
        if ($caricode == null){
            $statkode = '';
        }else{
            $fdate = $caricode->created_at;
            $tdate = date(now());
            $datetime1 = new DateTime($fdate);
            $datetime2 = new DateTime($tdate);
            $interval = $datetime1->diff($datetime2);
            $days = $interval->format('%a');

            if($days <= 30)
            {
                $caricode->update([
                    'status'        => $days
                ]);
                $statkode = 'Kode Diterima';
            }else{
                $caricode->update([
                    'status'        => 'kadaluarsa'
                ]);
                $statkode ='';
            }
        }

        try {
            if($request->posisialt != "")
            {
                if($statkode == 'Kode Diterima')
                {
                    Application::create([
                        'user_id'       => Auth::user()->id,
                        'posisi'        => Crypt::encryptString($request->posisi),
                        'posisialt'     => Crypt::encryptString($request->posisialt),
                        'code'          => $statkode,
                        'info'          => Crypt::encryptString($request->info),
                        'jadwalhari'    => $caricode->hari,
                        'jadwalbulan'   => $caricode->bulan,
                        'jadwaltahun'   => $caricode->tahun,
                        'jadwaljam'     => $caricode->jam,
                        'kerabat'       => Crypt::encryptString($request->kerabat)
                    ]);
    
                    alert()->toast('Daftar aplikasi telah berhasil ditambahkan','success');
                    return redirect()->back();
                }else{
                    Application::create([
                        'user_id'       => Auth::user()->id,
                        'posisi'        => Crypt::encryptString($request->posisi),
                        'posisialt'     => Crypt::encryptString($request->posisialt),
                        'code'          => $statkode,
                        'info'          => Crypt::encryptString($request->info),
                        'kerabat'       => Crypt::encryptString($request->kerabat)
                    ]);
    
                    alert()->toast('Daftar aplikasi telah berhasil ditambahkan','success');
                    return redirect()->back();
                }
            }else{
                if($statkode == 'Kode Diterima')
                {
                    Application::create([
                        'user_id'       => Auth::user()->id,
                        'posisi'        => Crypt::encryptString($request->posisi),
                        'code'          => $statkode,
                        'info'          => Crypt::encryptString($request->info),
                        'jadwalhari'    => $caricode->hari,
                        'jadwalbulan'   => $caricode->bulan,
                        'jadwaltahun'   => $caricode->tahun,
                        'jadwaljam'     => $caricode->jam,
                        'kerabat'       => Crypt::encryptString($request->kerabat)
                    ]);
                    
                    alert()->toast('Daftar aplikasi telah berhasil ditambahkan','success');
                    return redirect()->back();
                }else{
                    Application::create([
                        'user_id'       => Auth::user()->id,
                        'posisi'        => Crypt::encryptString($request->posisi),
                        'code'          => $statkode,
                        'info'          => Crypt::encryptString($request->info),
                        'kerabat'       => Crypt::encryptString($request->kerabat)
                    ]);
                    
                    alert()->toast('Daftar aplikasi telah berhasil ditambahkan','success');
                    return redirect()->back();
                }
            }
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function delete($id)
    {
        $data = Application::find($id);
        try
        {
            if($data->user_id == Auth::user()->id)
            {
                $data->delete();
                alert()->toast('Daftar aplikasi telah dihapus','warning');
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

    public function deletedev($id)
    {
        $data = Application::find($id);
        try
        {
            if(Auth::user()->admin != '0')
            {
                Log::create([
                    'user' => Auth::user()->email,
                    'action' => 'Delete Application',
                    'ip' => \Request::getClientIp(true),
                    'status' => 'Delete Application Success',
                    'note' => 'application user id - ' . $data->user_id . 'deleted - ' . Auth::user()->email .' [Rekrutmen]'
                ]);

                $data->delete();
                alert()->toast('Daftar aplikasi telah dihapus','warning');
                return redirect()->back();
            }
            else{

            }
        }
        catch (\Exception $e)
        {

        }
    }

    public function profile()
    {
        $data =  DB::table('profiles')
        ->join('users', 'users.id', '=', 'profiles.user_id')
        ->select('users.name as a','profiles.panggilan as b', 'profiles.nik as c',
        'profiles.kontak as d','users.email as e','profiles.tempatlahir as f',
        'profiles.hari as g','profiles.bulan as h','profiles.tahun as i',
        'profiles.gender as j','profiles.warganegara as k','profiles.agama as l',
        'profiles.status as m','profiles.darah as n','profiles.alamat as o','profiles.domisili as p','profiles.hobi as q','profiles.tingkat as r',
        'profiles.sekolah as s','profiles.posisi as t','profiles.perusahaan as u','profiles.referensi as v')
        ->get();
        return view('application.profile', compact('data'));
    }

    public function all(Request $request)   
    {
        /*$data =  DB::table('applications')
        ->join('users', 'users.id', '=', 'applications.user_id')
        ->join('profiles', 'profiles.user_id', '=', 'applications.user_id')
        ->select('users.name as a','applications.posisi as b', 'profiles.referensi as c', DB::raw("CONCAT(applications.jadwalhari,' ',applications.jadwalbulan,' ',applications.jadwaltahun) as d"),
        DB::raw("CONCAT(profiles.hari,' ',profiles.bulan,' ',profiles.tahun) as e"),'profiles.alamat as f','profiles.kontak as g','users.email as h','applications.disctest as i','applications.ist as j','applications.cfit as k','applications.armyalpha as l','applications.papikostik as m','applications.kreprlin as n',
        'applications.inthr as o','applications.intuser as p','applications.intmana as q','applications.hasil as r',DB::raw("CONCAT(applications.gabunghari,' ',applications.gabungbulan,' ',applications.gabungtahun) as s"),'profiles.tingkat as t','profiles.sekolah as u','profiles.posisi as v','profiles.perusahaan as w')
        ->get();
        if($request->ajax())
        {
            return datatables()->of($data)->make(true);
        }
        return view('application.all');*/

        $data =  DB::table('applications')
        ->join('users', 'users.id', '=', 'applications.user_id')
        ->join('profiles', 'profiles.user_id', '=', 'applications.user_id')
        ->join('documents', 'documents.user_id', '=', 'applications.user_id')
        ->select('applications.id as id','users.name as a','applications.posisi as b', 'applications.code as code', 'profiles.referensi as c',
        'applications.jadwalhari as d','applications.jadwalbulan as e','applications.jadwaltahun as f',
        'profiles.hari as g','profiles.bulan as h','profiles.tahun as i',
        'profiles.alamat as j','profiles.kontak as k','users.email as l',
        'applications.disctest as m','applications.ist as n','applications.cfit as o','applications.armyalpha as p','applications.papikostik as q','applications.kreprlin as r',
        'profiles.tingkat as s','profiles.sekolah as t','profiles.posisi as u','profiles.perusahaan as v',
        'applications.inthr as w','applications.intuser as x','applications.intmana as y',
        'applications.hasil as z','applications.gabunghari as a1','applications.gabungbulan as a2','applications.gabungtahun as a3','profiles.nik as a4','documents.lokasi as lokasi', 'applications.created_at as tahun')
        ->get();

        return view('application.all', compact('data'));

    }

    public function inv()   
    {
        $data =  DB::table('applications')
        ->join('users', 'users.id', '=', 'applications.user_id')
        ->join('profiles', 'profiles.user_id', '=', 'applications.user_id')
        ->join('documents', 'documents.user_id', '=', 'applications.user_id')
        ->select('applications.id as id','users.name as a','applications.posisi as b', 'applications.code as code', 'profiles.referensi as c',
        'applications.jadwalhari as d','applications.jadwalbulan as e','applications.jadwaltahun as f',
        'profiles.hari as g','profiles.bulan as h','profiles.tahun as i',
        'profiles.alamat as j','profiles.kontak as k','users.email as l',
        'applications.disctest as m','applications.ist as n','applications.cfit as o','applications.armyalpha as p','applications.papikostik as q','applications.kreprlin as r',
        'profiles.tingkat as s','profiles.sekolah as t','profiles.posisi as u','profiles.perusahaan as v',
        'applications.inthr as w','applications.intuser as x','applications.intmana as y',
        'applications.hasil as z','applications.gabunghari as a1','applications.gabungbulan as a2','applications.gabungtahun as a3','profiles.nik as a4','documents.lokasi as lokasi')
        ->where('code','Kode Diterima')
        ->get();

        return view('application.all', compact('data'));
    }

    public function app()   
    {
        $data =  DB::table('applications')
        ->join('users', 'users.id', '=', 'applications.user_id')
        ->join('profiles', 'profiles.user_id', '=', 'applications.user_id')
        ->join('documents', 'documents.user_id', '=', 'applications.user_id')
        ->select('applications.id as id','users.name as a','applications.posisi as b', 'applications.code as code', 'profiles.referensi as c',
        'applications.jadwalhari as d','applications.jadwalbulan as e','applications.jadwaltahun as f',
        'profiles.hari as g','profiles.bulan as h','profiles.tahun as i',
        'profiles.alamat as j','profiles.kontak as k','users.email as l',
        'applications.disctest as m','applications.ist as n','applications.cfit as o','applications.armyalpha as p','applications.papikostik as q','applications.kreprlin as r',
        'profiles.tingkat as s','profiles.sekolah as t','profiles.posisi as u','profiles.perusahaan as v',
        'applications.inthr as w','applications.intuser as x','applications.intmana as y',
        'applications.hasil as z','applications.gabunghari as a1','applications.gabungbulan as a2','applications.gabungtahun as a3','profiles.nik as a4','documents.lokasi as lokasi')
        ->where('code','')
        ->get();

        return view('application.all', compact('data'));
    }
}
