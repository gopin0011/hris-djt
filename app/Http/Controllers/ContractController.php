<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Contract;
use App\Models\Division;
use App\Models\Employee;
use App\Models\Log;
use App\Models\Office;
use App\Models\Profile;
use App\Models\Salary;
use App\Models\Study;
use App\Models\User;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use PDF;

class ContractController extends Controller
{
    public function index()
    {
        $data = Contract::where('status','0')->get();
        return view('contract.index',compact('data'));
    }

    public function tlh()
    {
        $data = Contract::where('status','2')->get();
        return view('contract.tlh',compact('data'));
    }

    public function all()
    {
        $data = Contract::where('status','1')->get();
        return view('contract.all',compact('data'));
    }

    public function create($id, $idcon)
    {
        $unit           = Unit::all();
        $user           = User::find($id);
        $study          = Study::where('user_id', $id)->get();
        $application    = Application::where('id', $idcon)->get();
        $divisi         = Division::all();
        $profile        = Profile::where('user_id',$user->id)->first();
        $office         = Office::find(1);
        //$gabungbulan = Application::where('id', $idcon)->get("gabungbulan");
        //return view('contract.create',compact('user','study','application','gabungbulan'));
        return view('contract.create',compact('user','study','application','unit', 'profile', 'divisi','office'));
    }

    public function ext()
    {
        $unit           = Unit::all();
        $divisi         = Division::all();
        return view('contract.extention',compact('unit', 'divisi'));
    }

    public function store(Request $request)
    {
        $kontrak = Contract::where([['awalkontraktahun',$request->awalkontraktahun],['kantor', $request->kantor]])->get();
        $jumlahkontrak = $kontrak->count();
        $nomorawal = $jumlahkontrak + 1;

        /*if($request->code == ""){
            if($nomorawal < 10){
                $x = '00' . $nomorawal;
            }elseif($nomorawal < 100){
                $x = '0' . $nomorawal;
            }elseif($nomorawal < 1000){
                $x = $nomorawal;
            }
    
            if($request->kantor == "Alat Peraga"){
                $nomorkontrak = $x.$request->nomortengah."ALP".$request->nomorakhir;
            }else{
                $nomorkontrak = $x.$request->nomortengah."LGN".$request->nomorakhir;
            }
        }else{*/
            if($request->kantor == "Alat Peraga"){
                $nomorkontrak = $request->code.$request->nomortengah."ALP".$request->nomorakhir;
            }else{
                $nomorkontrak = $request->code.$request->nomortengah."LGN".$request->nomorakhir;
            }
        //}


        try {
            Employee::create([
                'nik'               => $request->nik,
                'nama'              => Crypt::encryptString($request->nama),
                'kk'                => Crypt::encryptString($request->kk),
                'ktp'               => Crypt::encryptString($request->ktp),
                'npwp'              => Crypt::encryptString($request->npwp),
                'gender'            => Crypt::encryptString($request->gender),
                'agama'             => Crypt::encryptString($request->agama),
                'tmlahir'           => Crypt::encryptString($request->tempatlahir),
                'hlahir'            => Crypt::encryptString($request->hlahir),
                'blahir'            => Crypt::encryptString($request->blahir),
                'thahir'            => Crypt::encryptString($request->thlahir),
                'alamat'            => Crypt::encryptString($request->alamat),
                'bisnis'            => $request->kantor,
                'divisi'            => $request->divisi,
                'jabatan'           => $request->posisi,
                'status'            => 'Kontrak',
                'hakhir'            => $request->akhirkontrakhari,
                'bakhir'            => $request->akhirkontrakbulan,
                'thakhir'           => $request->akhirkontraktahun,
                'hjoin'             => $request->awalkontrakhari,
                'bjoin'             => $request->awalkontrakbulan,
                'thjoin'            => $request->awalkontraktahun,
                'pendidikan'        => Crypt::encryptString($request->tingkat),
                'gaji'              => Crypt::encryptString($request->jabatan + $request->gapok + $request->kinerja + $request->pulsa + $request->makan + $request->transport),
                'sekolah'           => $request->universitas,
                'prodi'             => $request->jurusan,
                'ijazah'            => Crypt::encryptString($request->ijazah),
                'email'             => Crypt::encryptString($request->email),
                'sertifikat'        => $request->sertifikat,
                
            ]);

            Contract::create([
                'user_id'           => $request->user_id,
                'status'            => '0',
                'nomor'             => Crypt::encryptString($nomorkontrak),
                'nama'              => Crypt::encryptString($request->nama),
                'kantor'            => $request->kantor,
                'posisi'            => $request->posisi,
                'awalkontrakhari'   => $request->awalkontrakhari,
                'awalkontrakbulan'  => $request->awalkontrakbulan,
                'awalkontraktahun'  => $request->awalkontraktahun,
                'akhirkontrakhari'  => $request->akhirkontrakhari,
                'akhirkontrakbulan' => $request->akhirkontrakbulan,
                'akhirkontraktahun' => $request->akhirkontraktahun,
                'durasi'            => $request->durasi,
                'ijazah'            => Crypt::encryptString($request->ijazah),
                'nim'               => Crypt::encryptString($request->nim),
                'jurusan'           => $request->jurusan,
                'lulus'             => $request->lulus,
                'universitas'       => $request->universitas,
                'gapok'             => Crypt::encryptString($request->gapok),
                'jabatan'           => Crypt::encryptString($request->jabatan),
                'kinerja'           => Crypt::encryptString($request->kinerja),
                'pulsa'             => Crypt::encryptString($request->pulsa),
                'makan'             => Crypt::encryptString($request->makan),
                'transport'         => Crypt::encryptString($request->transport),
                'direktur'          => $request->direktur
            ]);

            alert()->toast('Kontrak baru telah dibuat','success');
            return redirect(route('contracts.index'));
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
        
    }

    public function ekstensi(Request $request)
    {
        if($request->bkpi == "Januari"){
            $bulan = "I";
        }elseif($request->bkpi == "Februari"){
            $bulan = "II";
        }elseif($request->bkpi == "Maret"){
            $bulan = "III";
        }elseif($request->bkpi == "April"){
            $bulan = "IV";
        }elseif($request->bkpi == "Mei"){
            $bulan = "V";
        }elseif($request->bkpi == "Juni"){
            $bulan = "VI";
        }elseif($request->bkpi == "Juli"){
            $bulan = "VII";
        }elseif($request->bkpi == "Agustus"){
            $bulan = "VIII";
        }elseif($request->bkpi == "September"){
            $bulan = "IX";
        }elseif($request->bkpi == "Oktober"){
            $bulan = "X";
        }elseif($request->bkpi == "November"){
            $bulan = "XI";
        }elseif($request->bkpi == "Desember"){
            $bulan = "XII";
        }

        if($request->durasi == "Tetap"){
            $status = "Tetap";
        }else{
            $status = "Kontrak";
        }

        $kontrak = Contract::where([['awalkontrakbulan',$request->bkpi],['awalkontraktahun',$request->thkpi],['kantor', $request->kantor]])->get();
        $jumlahkontrak = $kontrak->count();
        $nomorawal = $jumlahkontrak + 1;

        if($nomorawal < 10){
            $x = '00' . $nomorawal;
        }elseif($nomorawal < 100){
            $x = '0' . $nomorawal;
        }elseif($nomorawal < 1000){
            $x = $nomorawal;
        }

        $nomorakhir = '/'.$bulan.'/'.$request->thkpi;

        if($request->kantor == "Alat Peraga"){
            $nomorkontrak = $x.$request->nomortengah."ALP".$nomorakhir;
        }else{
            $nomorkontrak = $x.$request->nomortengah."LGN".$nomorakhir;
        }

        if($request->durasi == "TLH"){
            $statuskontrak = '2';
        }else{
            $statuskontrak = '1';
        }

        try {
            if($request->durasi == "Tetap"){
                if($request->kpi != ''){
                    Salary::create([
                        'nik'      => $request->nik,
                        'nama'     => Crypt::encryptString($request->nama),
                        'kpi'      => Crypt::encryptString($request->kpi),
                        'pkpi'     => Crypt::encryptString($request->pkpi),
                        'nominal'  => Crypt::encryptString($request->nominal),
                        'hkpi'     => Crypt::encryptString($request->hkpi),
                        'bkpi'     => Crypt::encryptString($request->bkpi),
                        'thkpi'    => Crypt::encryptString($request->thkpi),
                    ]);
                }

                Contract::create([
                    'user_id'           => $request->id,
                    'status'            => $statuskontrak,
                    'nomor'             => Crypt::encryptString($nomorkontrak),
                    'nama'              => Crypt::encryptString($request->nama),
                    'kantor'            => $request->kantor,
                    'posisi'            => Crypt::encryptString($request->posisi),
                    'awalkontrakhari'   => $request->hkpi,
                    'awalkontrakbulan'  => $request->bkpi,
                    'awalkontraktahun'  => $request->thkpi,
                    'akhirkontrakhari'  => "",
                    'akhirkontrakbulan' => "",
                    'akhirkontraktahun' => "",
                    'durasi'            => $request->durasi,
                    'ijazah'            => Crypt::encryptString($request->ijazah),
                    'nim'               => Crypt::encryptString($request->nim),
                    'jurusan'           => Crypt::encryptString($request->prodi),
                    'lulus'             => Crypt::encryptString($request->lulus),
                    'universitas'       => Crypt::encryptString($request->sekolah),
                    'gapok'             => Crypt::encryptString($request->gapok),
                    'jabatan'           => Crypt::encryptString($request->jabatan),
                    'kinerja'           => Crypt::encryptString($request->kinerja),
                    'pulsa'             => Crypt::encryptString($request->pulsa),
                    'makan'             => Crypt::encryptString($request->makan),
                    'transport'         => Crypt::encryptString($request->transport),
                    'direktur'          => $request->direktur
                ]);

                $employee = Employee::where('nik',$request->nik)->first();

                $employee->update([
                    'status'    => 'Tetap',
                    'hakhir'    => "",
                    'bakhir'    => "",
                    'thakhir'   => "",
                    'masa'      => Crypt::encryptString(""),
                ]);
                
            }else{
                if($request->kpi != ''){
                    Salary::create([
                        'nik'           => $request->nik,
                        'nama'          => Crypt::encryptString($request->nama),
                        'kpi'           => Crypt::encryptString($request->kpi),
                        'pkpi'          => Crypt::encryptString($request->pkpi),
                        'nominal'       => Crypt::encryptString($request->nominal),
                        'hkpi'          => Crypt::encryptString($request->hkpi),
                        'bkpi'          => Crypt::encryptString($request->bkpi),
                        'thkpi'         => Crypt::encryptString($request->thkpi),
                    ]);
                }

                Contract::create([
                    'user_id'           => $request->id,
                    'status'            => $statuskontrak,
                    'nomor'             => Crypt::encryptString($nomorkontrak),
                    'nama'              => Crypt::encryptString($request->nama),
                    'kantor'            => $request->kantor,
                    'posisi'            => Crypt::encryptString($request->posisi),
                    'awalkontrakhari'   => $request->hkpi,
                    'awalkontrakbulan'  => $request->bkpi,
                    'awalkontraktahun'  => $request->thkpi,
                    'akhirkontrakhari'  => $request->akhirkontrakhari,
                    'akhirkontrakbulan' => $request->akhirkontrakbulan,
                    'akhirkontraktahun' => $request->akhirkontraktahun,
                    'durasi'            => $request->durasi,
                    'ijazah'            => Crypt::encryptString($request->ijazah),
                    'nim'               => Crypt::encryptString($request->nim),
                    'jurusan'           => Crypt::encryptString($request->prodi),
                    'lulus'             => Crypt::encryptString($request->lulus),
                    'universitas'       => Crypt::encryptString($request->sekolah),
                    'gapok'             => Crypt::encryptString($request->gapok),
                    'jabatan'           => Crypt::encryptString($request->jabatan),
                    'kinerja'           => Crypt::encryptString($request->kinerja),
                    'pulsa'             => Crypt::encryptString($request->pulsa),
                    'makan'             => Crypt::encryptString($request->makan),
                    'transport'         => Crypt::encryptString($request->transport),
                    'direktur'          => $request->direktur
                ]);

                $employee = Employee::where('nik',$request->nik)->first();
                if($request->durasi != 'TLH' ||$request->durasi != 'Tetap' ){
                    $employee->update([
                        'status'    => 'Kontrak',
                        'hakhir'    => $request->akhirkontrakhari,
                        'bakhir'    => $request->akhirkontrakbulan,
                        'thakhir'   => $request->akhirkontraktahun,
                        'masa'      => Crypt::encryptString($request->durasi),
                    ]);
                }else{
                    $employee->update([
                        'status'    => 'TLH',
                        'hakhir'    => $request->akhirkontrakhari,
                        'bakhir'    => $request->akhirkontrakbulan,
                        'thakhir'   => $request->akhirkontraktahun,
                    ]);
                }
            }
            
            if($request->durasi == "TLH"){
                alert()->toast('Kontrak baru telah dibuat','success');
                return redirect(route('contracts.tlh'));
            }else{
                alert()->toast('Kontrak baru telah dibuat','success');
                return redirect(route('contracts.all'));
            }
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function print($id)
    {
        $contract = Contract::where('id',$id)->get();
        //$application = Application::where([['user_id',$contract[0]->user_id],['gabunghari','!=','']])->get();
        $profile = Profile::where('user_id',$contract[0]->user_id)->get();
        $pdf = PDF::loadView('contract.print', compact('contract','profile'))->setPaper('a4', 'potrait');
        return $pdf->stream();
    }

    public function printext($id)
    {
        $detail = Contract::find($id);
        $detailprofile = Employee::where('id',$detail->user_id)->get();
        $pdf = PDF::loadView('contract.printext', compact('detail','detailprofile'))->setPaper('a4', 'potrait');
        return $pdf->stream();
    }

    public function delete($id)
    {
        $data = Contract::find($id);

        Log::create([
            'user' => Auth::user()->email,
            'action' => 'Delete Contract',
            'ip' => \Request::getClientIp(true),
            'status' => 'Delete Contract Success',
            'note' => 'contract with user id' . $data->user_id . 'deleted by ' . Auth::user()->email .' [Rekrutmen]'
        ]);
        
        $data->delete();
        alert()->toast('Kontrak telah dihapus','warning');
        return redirect(route('contracts.index'));
    }

    public function deleteext($id)
    {
        $data = Contract::find($id);

        Log::create([
            'user' => Auth::user()->email,
            'action' => 'Delete Contract',
            'ip' => \Request::getClientIp(true),
            'status' => 'Delete Contract Success',
            'note' => 'contract with user id' . $data->user_id . 'deleted by ' . Auth::user()->email .' [Rekrutmen]'
        ]);
        
        $data->delete();
        alert()->toast('Kontrak telah dihapus','warning');
        return redirect(route('contracts.all'));
    }
}
