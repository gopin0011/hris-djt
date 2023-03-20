<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Profile;
use App\Models\User;
use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class PsychotestController extends Controller
{
    public function list()
    {

        $data =  DB::table('applications')
        ->join('users', 'users.id', '=', 'applications.user_id')
        ->join('profiles', 'profiles.user_id', '=', 'applications.user_id')
        ->leftJoin('references', 'references.user_id', '=', 'applications.user_id')
        ->select('applications.id as id','applications.posisi as posisi1', 'applications.posisialt as posisi2', 'users.name as name', 'references.nama as referensi','applications.disctest as disctest','applications.ist as ist','applications.cfit as cfit','applications.armyalpha as armyalpha','applications.papikostik as papikostik','applications.kreprlin as kreprlin','applications.jadwalhari as hari','applications.jadwalbulan as bulan','applications.jadwaltahun as tahun')
        ->where('applications.jadwalhari', '<>', '')
        ->WhereNotNull('applications.jadwalhari')
        ->get();

        return view('psychotest.list',compact('data'));
    }

    public function test($id)
    {
        $data = Application::find($id);
        $user = User::where('id',$data->user_id)->get();
        return view('psychotest.test',compact('data','user'));
    }

    public function storetest(Request $request, $id)
    {
        $data = Application::find($id);
        try {
            $data->update([
                'disctest'  => Crypt::encryptString($request->disctest),
                'ist'       => Crypt::encryptString($request->ist),
                'cfit'      => Crypt::encryptString($request->cfit),
                'armyalpha' => Crypt::encryptString($request->armyalpha),
                'papikostik'=> Crypt::encryptString($request->papikostik),
                'kreprlin'  => Crypt::encryptString($request->kreprlin)
            ]);
           
            return redirect(route('psychotest.list'))->with([alert()->toast('Data psikotes telah disimpan','success')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function listtoday()
    {
        $hari = date(now()->format('j'));
        $bulan = date(now()->format('n'));
        if($bulan == '1')
        {
            $namabulan = 'Januari';
        }
        elseif($bulan == '2')
        {
            $namabulan = 'Februari';
        }
        elseif($bulan == '3')
        {
            $namabulan = 'Maret';
        }
        elseif($bulan == '4')
        {
            $namabulan = 'April';
        }
        elseif($bulan == '5')
        {
            $namabulan = 'Mei';
        }
        elseif($bulan == '6')
        {
            $namabulan = 'Juni';
        }
        elseif($bulan == '7')
        {
            $namabulan = 'Juli';
        }
        elseif($bulan == '8')
        {
            $namabulan = 'Agustus';
        }
        elseif($bulan == '9')
        {
            $namabulan = 'September';
        }
        elseif($bulan == '10')
        {
            $namabulan = 'Oktober';
        }
        elseif($bulan == '11')
        {
            $namabulan = 'November';
        }
        elseif($bulan == '12')
        {
            $namabulan = 'Desember';
        }
        $tahun = date(now()->format('Y'));
        $data =  DB::table('applications')
        ->join('users', 'users.id', '=', 'applications.user_id')
        ->join('profiles', 'profiles.user_id', '=', 'applications.user_id')
        ->leftJoin('references', 'references.user_id', '=', 'applications.user_id')
        ->select('applications.id as id','applications.posisi as posisi1', 'applications.posisialt as posisi2', 'users.name as name', 'references.nama as referensi','applications.disctest as disctest','applications.ist as ist','applications.cfit as cfit','applications.armyalpha as armyalpha','applications.papikostik as papikostik','applications.kreprlin as kreprlin','applications.jadwalhari as hari','applications.jadwalbulan as bulan','applications.jadwaltahun as tahun')
        ->where('applications.jadwalhari', $hari)
        ->where('applications.jadwalbulan', $namabulan)
        ->where('applications.jadwaltahun', $tahun)
        ->get();

        return view('psychotest.list',compact('data'));
    }
}
