<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Application;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

class ResultController extends Controller
{
    public function list()
    {
        $data =  DB::table('applications')
        ->join('users', 'users.id', '=', 'applications.user_id')
        ->join('profiles', 'profiles.user_id', '=', 'applications.user_id')
        ->select('applications.id as id','applications.user_id as user_id', 'applications.posisi as posisi1', 'applications.posisialt as posisi2', 'users.name as name', 'applications.kerabat as referensi','applications.hasil as hasil','applications.gabunghari as hari','applications.gabungbulan as bulan','applications.gabungtahun as tahun')
        ->where('applications.jadwalhari', '<>', '')
        ->WhereNotNull('applications.jadwalhari')
        ->get();

        return view('result.list',compact('data'));
    }

    public function test($id)
    {
        $data = Application::find($id);
        $user = User::where('id',$data->user_id)->get();
        return view('result.test',compact('data','user'));
    }

    public function store(Request $request, $id)
    {
        $data = Application::find($id);
        try {
            if($request->hasil == "Diterima")
            {
                $data->update([
                    'hasil'         => Crypt::encryptString($request->hasil),
                    'gabunghari'    => Crypt::encryptString($request->gabunghari),
                    'gabungbulan'   => Crypt::encryptString($request->gabungbulan),
                    'gabungtahun'   => Crypt::encryptString($request->gabungtahun)
                ]);
            }
            else{
                $data->update([
                    'hasil'         => Crypt::encryptString($request->hasil),
                    'gabunghari'    => null,
                    'gabungbulan'   => null,
                    'gabungtahun'   => null
                ]);
            }
           
            return redirect(route('results.list'))->with([alert()->toast('Hasil interview telah ditetapkan','success')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
