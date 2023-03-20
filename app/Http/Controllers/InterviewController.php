<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Competency;
use App\Models\Profile;
use App\Models\User;
use App\Notifications\RekrutmenNotification;
use Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use \Illuminate\Support\Facades\DB;

class InterviewController extends Controller
{
    public function preschedule()
    {      
        $data =  DB::table('applications')
        ->join('users', 'users.id', '=', 'applications.user_id')
        ->join('profiles', 'profiles.user_id', '=', 'applications.user_id')
        ->select('applications.id as id','applications.posisi as posisi1', 'applications.posisialt as posisi2', 'users.name as name','profiles.kontak as kontak', 'applications.kerabat as referensi')
        ->where('applications.jadwalhari','')
        ->orWhereNull('applications.jadwalhari')
        ->get();

        return view('interview.preschedule',compact('data'));
    }

    public function setschedule($id)
    {
        $data = Application::find($id);
        $user = User::where('id',$data->user_id)->get();
        $reset = 0;
        return view('interview.setschedule',compact('data','user','reset'));
    }

    public function storeschedule(Request $request, $id)
    {
        $data = Application::find($id);
        try {
            $data->update([
                'jadwalhari'    => $request->jadwalhari,
                'jadwalbulan'   => $request->jadwalbulan,
                'jadwaltahun'   => $request->jadwaltahun
            ]);
           
            $user = User::where('id', $data->user_id)->get();

            $details = [
                'greeting' => 'Selamat',
                'body' => 'Anda telah mendapatkan jadwal interview, segera cek akun Rekrutmen anda.',
                'thanks' => 'Terima kasih',
                'actionText' => 'Lihat Jadwal',
                'actionURL' => url('http://103.152.243.49/hris/applications'),
                'order_id' => 101
            ];
            Notification::send($user, new RekrutmenNotification($details));
            return redirect(route('interview.schedule'))->with([alert()->toast('Jadwal interview telah ditetapkan','success')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function resetschedule($id)
    {
        $data = Application::find($id);
        $user = User::where('id',$data->user_id)->get();
        $reset = 1;
        return view('interview.setschedule',compact('data','user','reset'));
    }

    public function postresetschedule($id)
    {
        $data = Application::find($id);
        try {
            $data->update([
                'jadwalhari'    => null,
                'jadwalbulan'   => null,
                'jadwaltahun'   => null
            ]);
           
            return redirect(route('interview.preschedule'))->with([alert()->toast('Jadwal interview telah dikosongkan','warning')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function reschedule($id)
    {
        $data = Application::find($id);
        $user = User::where('id',$data->user_id)->get();
        return view('interview.editschedule',compact('data','user'));
    }

    public function schedule()
    {

        $data =  DB::table('applications')
        ->join('users', 'users.id', '=', 'applications.user_id')
        ->join('profiles', 'profiles.user_id', '=', 'applications.user_id')
        ->select('applications.id as id','applications.posisi as posisi1', 'applications.posisialt as posisi2', 'users.name as name','profiles.kontak as kontak', 'applications.kerabat as referensi','applications.jadwalhari as hari','applications.jadwalbulan as bulan','applications.jadwaltahun as tahun')
        ->where('applications.jadwalhari', '<>', '')
        ->WhereNotNull('applications.jadwalhari')
        ->get();

        return view('interview.schedule',compact('data'));
    }

    public function list()
    {
        $filter = 'list';
        $data =  DB::table('applications')
        ->join('users', 'users.id', '=', 'applications.user_id')
        ->join('profiles', 'profiles.user_id', '=', 'applications.user_id')
        ->select('applications.id as id','applications.posisi as posisi1',  'applications.posisialt as posisi2', 'users.name as name', 'applications.kerabat as referensi','applications.namahr as hr','applications.namauser as user','applications.namamana as mana','applications.jadwalhari as hari','applications.jadwalbulan as bulan','applications.jadwaltahun as tahun','applications.disctest as disctest','applications.ist as ist','applications.cfit as cfit','applications.armyalpha as armyalpha','applications.papikostik as papikostik','applications.kreprlin as kreprlin','applications.hasil as hasil','applications.gabunghari as haris','applications.gabungbulan as bulans','applications.gabungtahun as tahuns')
        ->where('applications.jadwalhari', '<>', '')
        ->get();
        return view('interview.list',compact('data','filter'));
    }

    public function keep()
    {
        $filter = 'keep';
        $data =  DB::table('applications')
        ->join('users', 'users.id', '=', 'applications.user_id')
        ->join('profiles', 'profiles.user_id', '=', 'applications.user_id')
        ->select('applications.id as id','applications.posisi as posisi1',  'applications.posisialt as posisi2', 'users.name as name', 'applications.kerabat as referensi','applications.namahr as hr','applications.namauser as user','applications.namamana as mana','applications.jadwalhari as hari','applications.jadwalbulan as bulan','applications.jadwaltahun as tahun','applications.disctest as disctest','applications.ist as ist','applications.cfit as cfit','applications.armyalpha as armyalpha','applications.papikostik as papikostik','applications.kreprlin as kreprlin','applications.hasil as hasil','applications.gabunghari as haris','applications.gabungbulan as bulans','applications.gabungtahun as tahuns')
        ->where('applications.jadwalhari', '<>', '')
        ->get();
        return view('interview.list',compact('data','filter'));
    }

    public function listtoday()
    {
        $filter = 'list';
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
        ->select('applications.id as id','applications.posisi as posisi1', 'applications.posisialt as posisi2', 'users.name as name', 'applications.kerabat as referensi','applications.namahr as hr','applications.namauser as user','applications.namamana as mana','applications.jadwalhari as hari','applications.jadwalbulan as bulan','applications.jadwaltahun as tahun','applications.disctest as disctest','applications.ist as ist','applications.cfit as cfit','applications.armyalpha as armyalpha','applications.papikostik as papikostik','applications.kreprlin as kreprlin','applications.hasil as hasil','applications.gabunghari as haris','applications.gabungbulan as bulans','applications.gabungtahun as tahuns')
        ->where('applications.jadwalhari', $hari)
        ->where('applications.jadwalbulan', $namabulan)
        ->where('applications.jadwaltahun', $tahun)
        ->get();

        return view('interview.list',compact('data','filter'));
    }

    public function caripelamar(Request $request)
    {
        $id = $request->q;
        $data = Application::find($id);
        $user = User::where('id',$data->user_id)->get();
        $x    = "000000000000000000000000000";

        if(Auth::user()->admin == 2 ||Auth::user()->admin == 3){
            $comp = Competency::where('user_id',$data->user_id)->first();
            if($comp->hr == null)
            {
                $x = "000000000000000000000000000";
            }else{
                $x = $comp->hr;
            }
        }elseif(Auth::user()->admin == 1){
            $comp = Competency::where('user_id',$data->user_id)->first();
            if(isset($comp->user) == 0)
            {
                $x = "000000000000000000000000000";
            }else{
                $x = $comp->user;
            }
        }

        return view('interview.test',compact('data','user','x'));
    }

    public function test($id)
    {
        $data = Application::find($id);
        $user = User::where('id',$data->user_id)->get();
        $x    = "000000000000000000000000000";

        if(Auth::user()->admin == 2 ||Auth::user()->admin == 3){
            $comp = Competency::where('user_id',$data->user_id)->first();
            if($comp){
                if($comp->hr == null)
                {
                    $x = "000000000000000000000000000";
                }else{
                    $x = $comp->hr;
                }
            }
          
        }elseif(Auth::user()->admin == 1){
            $comp = Competency::where('user_id',$data->user_id)->first();
            if($comp){
                if($comp->user == null)
                {
                    $x = "000000000000000000000000000";
                }else{
                    $x = $comp->user;
                }
            }
        }

        return view('interview.test',compact('data','user','x'));
    }

    public function storetest(Request $request, $id)
    {
        $data = Application::find($id);
        $comp = Competency::where('user_id',$data->user_id)->first();

        if(Auth::user()->admin == 2 ||Auth::user()->admin == 3)
        {
            try {
                if($comp){
                    $comp->update([
                        'hr'     => 
                            $request->c01 . $request->c02 . $request->c03 . $request->c04 . $request->c05 .
                            $request->c06 . $request->c07 . $request->c08 . $request->c09 . $request->c10 .
                            $request->c11 . $request->c12 . $request->c13 . $request->c14 . $request->c15 .
                            $request->c16 . $request->c17 . $request->c18 . $request->c19 . $request->c20 .
                            $request->c21 . $request->c22 . $request->c23 . $request->c24 . $request->c25 .
                            $request->c26 . $request->c27
                    ]);
                }else{
                    Competency::create([
                        'user_id'   => $data->user_id,
                        'hr'        => 
                            $request->c01 . $request->c02 . $request->c03 . $request->c04 . $request->c05 .
                            $request->c06 . $request->c07 . $request->c08 . $request->c09 . $request->c10 .
                            $request->c11 . $request->c12 . $request->c13 . $request->c14 . $request->c15 .
                            $request->c16 . $request->c17 . $request->c18 . $request->c19 . $request->c20 .
                            $request->c21 . $request->c22 . $request->c23 . $request->c24 . $request->c25 .
                            $request->c26 . $request->c27
                    ]);
                }
            } catch (\Exception $e) {
                return redirect()->back()->with(['error' => $e->getMessage()]);
            }
        }elseif(Auth::user()->admin == 1)
        {
            try {
                if($comp){
                    $comp->update([
                        'user'     => 
                            $request->c01 . $request->c02 . $request->c03 . $request->c04 . $request->c05 .
                            $request->c06 . $request->c07 . $request->c08 . $request->c09 . $request->c10 .
                            $request->c11 . $request->c12 . $request->c13 . $request->c14 . $request->c15 .
                            $request->c16 . $request->c17 . $request->c18 . $request->c19 . $request->c20 .
                            $request->c21 . $request->c22 . $request->c23 . $request->c24 . $request->c25 .
                            $request->c26 . $request->c27
                    ]);
                }else{
                    Competency::create([
                        'user_id'   => $data->user_id,
                        'user'      => 
                            $request->c01 . $request->c02 . $request->c03 . $request->c04 . $request->c05 .
                            $request->c06 . $request->c07 . $request->c08 . $request->c09 . $request->c10 .
                            $request->c11 . $request->c12 . $request->c13 . $request->c14 . $request->c15 .
                            $request->c16 . $request->c17 . $request->c18 . $request->c19 . $request->c20 .
                            $request->c21 . $request->c22 . $request->c23 . $request->c24 . $request->c25 .
                            $request->c26 . $request->c27
                    ]);
                }
            } catch (\Exception $e) {
                return redirect()->back()->with(['error' => $e->getMessage()]);
            }
        }

        if(Auth::user()->admin == 2 ||Auth::user()->admin == 3)
        {
            try {
                $data->update([
                    'inthr'         => Crypt::encryptString($request->inthr),
                    'namahr'        => Crypt::encryptString($request->namahr),
                    'hasil'         => Crypt::encryptString($request->hasil),
                    'gabunghari'    => Crypt::encryptString($request->gabunghari),
                    'gabungbulan'   => Crypt::encryptString($request->gabungbulan),
                    'gabungtahun'   => Crypt::encryptString($request->gabungtahun)
                ]);
               //return redirect(route('interview.list'))->with([alert()->toast('Data interview telah disimpan','success')]);
               return redirect()->with([alert()->toast('Data interview telah disimpan','success')]);   
	 } catch (\Exception $e) {
                return redirect()->back()->with(['error' => $e->getMessage()]);
            }
        }
        elseif(Auth::user()->admin == 1)
        {
            try {
                $data->update([
                    'intuser'   => Crypt::encryptString($request->intuser),
                    'namauser'  => Crypt::encryptString($request->namauser)
                ]);
               return redirect()->back()->with([alert()->toast('Data interview telah disimpan','success')]);
           
	    } catch (\Exception $e) {
                return redirect()->back()->with(['error' => $e->getMessage()]);
            }
        }
        else
        {
            try {
                $data->update([
                    'intmana'   => Crypt::encryptString($request->intmana),
                    'namamana'  => Crypt::encryptString($request->namamana)
                ]);
               
                return redirect()->back()->with([alert()->toast('Data interview telah disimpan','success')]);
            } catch (\Exception $e) {
                return redirect()->back()->with(['error' => $e->getMessage()]);
            }
        }
    }
}
