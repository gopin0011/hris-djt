<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Division;
use App\Models\Employee;
use App\Models\Overtime;
use App\Models\Unit;
use App\Models\User;
use App\Notifications\ApproveNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use \Illuminate\Support\Facades\DB;
use PDF;
use Notification;

class OvertimeController extends Controller
{
    public function index()
    {
        if(Auth::user()->admin == 8 || Auth::user()->admin == 9){
            $statspl = 0;
            $data = Overtime::where([['bisnis', Auth::user()->bisnis],['divisi', Auth::user()->divisi]])->get();
            
            $datas = Overtime::where([['hr',null],['manajer',null],['bisnis', Auth::user()->bisnis],['divisi', Auth::user()->divisi]])->get();
            $a = $datas->count();
            $b = NULL;
            
            return view('overtime.index', compact('data','statspl','a','b'));
        }else{
            $statspl = 0;
            $data = Overtime::all();

            $datas = Overtime::where([['hr',null],['manajer','diterima'],['status',null]])->get();
            $a = NULL;
            $b = $datas->count();
            
            return view('overtime.index', compact('data','statspl','a','b'));
        }
    }

    public function start()
    {
        if(Auth::user()->admin == 8 || Auth::user()->admin == 9){
            $statspl = 0;
            $data = Overtime::where([['hr',null],['manajer',null],['bisnis', Auth::user()->bisnis],['divisi', Auth::user()->divisi]])->get();
            $datas = Overtime::where([['hr',null],['manajer',null],['bisnis', Auth::user()->bisnis],['divisi', Auth::user()->divisi]])->get();
            $a = $datas->count();
            $b = NULL;
            return view('overtime.index',compact('data','statspl','a','b'));
        }else{
            $statspl = 0;
            $data = Overtime::where([['hr',null],['manajer',null]])->get();
            $datas = Overtime::where([['hr',null],['manajer','diterima'],['status',null]])->get();
            $a = NULL;
            $b = $datas->count();
            return view('overtime.index',compact('data','statspl','a','b'));
        }
    }

    public function man()
    {
        if(Auth::user()->admin == 8 || Auth::user()->admin == 9){
            $statspl = 0;
            $data = Overtime::where([['hr',null],['manajer','diterima'],['status',null],['bisnis', Auth::user()->bisnis],['divisi', Auth::user()->divisi]])->get();
            $datas = Overtime::where([['hr',null],['manajer',null],['bisnis', Auth::user()->bisnis],['divisi', Auth::user()->divisi]])->get();
            $a = $datas->count();
            $b = NULL;
            return view('overtime.index',compact('data','statspl','a','b'));
        }else{
            $statspl = 0;
            $data = Overtime::where([['hr',null],['manajer','diterima'],['status',null]])->get();
            $datas = Overtime::where([['hr',null],['manajer','diterima'],['status',null]])->get();
            $a = NULL;
            $b = $datas->count();
            return view('overtime.index',compact('data','statspl','a','b'));
        }
    }

    public function hr()
    {
        if(Auth::user()->admin == 8 || Auth::user()->admin == 9){
            $statspl = 0;
            $data = Overtime::where([['hr','diterima'],['manajer','diterima'],['status',null],['bisnis', Auth::user()->bisnis],['divisi', Auth::user()->divisi]])->get();
            $datas = Overtime::where([['hr',null],['manajer',null],['bisnis', Auth::user()->bisnis],['divisi', Auth::user()->divisi]])->get();
            $a = $datas->count();
            $b = NULL;
            return view('overtime.index',compact('data','statspl','a','b'));
        }else{
            $statspl = 0;
            $data = Overtime::where([['hr','diterima'],['manajer','diterima'],['status',null]])->get();
            $datas = Overtime::where([['hr',null],['manajer','diterima'],['status',null]])->get();
            $a = NULL;
            $b = $datas->count();
            return view('overtime.index',compact('data','statspl','a','b'));
        }
    }

    public function end()
    {
        if(Auth::user()->admin == 8 || Auth::user()->admin == 9){
            $statspl = 0;
            $data = Overtime::where([['hr','!=',null],['manajer','diterima'],['status','!=',null],['bisnis', Auth::user()->bisnis],['divisi', Auth::user()->divisi]])->get();
            $datas = Overtime::where([['hr',null],['manajer',null],['bisnis', Auth::user()->bisnis],['divisi', Auth::user()->divisi]])->get();
            $a = $datas->count();
            $b = NULL;
            return view('overtime.index',compact('data','statspl','a','b'));
        }else{
            $statspl = 1;
            $data = Overtime::where([['hr','!=',null],['manajer','diterima'],['status','!=',null]])->get();
            $datas = Overtime::where([['hr',null],['manajer','diterima'],['status',null]])->get();
            $a = NULL;
            $b = $datas->count();
            return view('overtime.index',compact('data','statspl','a','b'));
        }
    }

    public function create()
    {
        $unit = Unit::all();
        $divisi = Division::all();
        if(Auth::user()->admin == 9){
            $datas = Overtime::where([['hr',null],['manajer',null],['bisnis', Auth::user()->bisnis],['divisi', Auth::user()->divisi]])->get();
            $a = $datas->count();
            return view('overtime.create', compact('unit', 'divisi','a'));
        }elseif(Auth::user()->admin == 2 || Auth::user()->admin == 3){
            $datas = Overtime::where([['hr',null],['manajer','diterima'],['status',null]])->get();
            $b = $datas->count();
            return view('overtime.create', compact('unit', 'divisi','b'));
        }else{
            return view('overtime.create', compact('unit', 'divisi'));
        }
    }

    public function detailcreate($id)
    {
        $overtime = Overtime::where('nomor', $id)->get();
        $data = Detail::where('splid', $id)->get();
        $employee = Employee::where([['divisi', Auth::user()->divisi],['bisnis',Auth::user()->bisnis]])->get();
        $idovertime = $id;
        if(Auth::user()->admin == 9){
            $datas = Overtime::where([['hr',null],['manajer',null],['bisnis', Auth::user()->bisnis],['divisi', Auth::user()->divisi]])->get();
            $a = $datas->count();
            return view('overtime.detailcreate', compact('overtime', 'data', 'employee', 'idovertime','a'));
        }elseif(Auth::user()->admin == 2 || Auth::user()->admin == 3){
            $datas = Overtime::where([['hr',null],['manajer','diterima'],['status',null]])->get();
            $b = $datas->count();
            return view('overtime.detailcreate', compact('overtime', 'data', 'employee', 'idovertime','b'));
        }else{
            return view('overtime.detailcreate', compact('overtime', 'data', 'employee', 'idovertime'));
        }    
    }

    public function store(Request $request)
    {
        try {
             Overtime::create([
                'nomor'     => $request->nomor,
                'hari'      => $request->hari,
                'hspl'      => $request->hspl,
                'bspl'      => $request->bspl,
                'thspl'     => $request->thspl,
                'bisnis'    => $request->bisnis,
                'divisi'    => $request->divisi,
                'waktu'     => $request->waktu,
                'pemohon'   => $request->pemohon,
                'manajer'   => $request->manajer,
                'hr'        => $request->hr,
                'catatan'   => $request->catatan,
                'status'    => $request->status
            ]); 
            $id = $request->nomor;
            return redirect(route('overtimes.detailcreate', ['id' => $id]));
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function ca()
    {
        $unit = Unit::all();
        if(Auth::user()->admin == 2 || Auth::user()->admin == 3){
            $datas = Overtime::where([['hr',null],['manajer','diterima'],['status',null]])->get();
            $b = $datas->count();
            return view('overtime.ca', compact('unit','b'));
        }else{
            return view('overtime.ca', compact('unit'));
        }         
    }

    public function caprint(Request $request)
    {
        $data =  DB::table('overtimes')
        ->join('details', 'details.splid', '=', 'overtimes.nomor')
        ->where([['hspl', $request->hari],['bspl', $request->bulan],['thspl', $request->tahun],['bisnis', $request->bisnis],['hr', 'diterima'],['makan','!=','']])
        ->select('divisi as a', DB::raw("COUNT(divisi) as b"))
        ->groupBy('divisi')
        ->get();

        $datamenu =  DB::table('overtimes')
        ->join('details', 'details.splid', '=', 'overtimes.nomor')
        ->where([['hspl', $request->hari],['bspl', $request->bulan],['thspl', $request->tahun],['bisnis', $request->bisnis],['hr', 'diterima'],['makan','!=','']])
        ->select('divisi','makan', DB::raw("COUNT(makan) as jumlah"))
        ->groupBy('divisi','makan')
        ->orderBy('divisi')
        ->get();

        $bisnis = $request->bisnis;
        $hari   = $request->hari;
        $bulan  = $request->bulan;
        $tahun  = $request->tahun;
        $pdf    = PDF::loadView('overtime.caprint', compact('data','bisnis','hari','bulan','tahun','datamenu'))->setPaper('a4', 'potrait');
        return $pdf->stream();
    }

    public function edit(Request $request,$id)
    {
        $data = Overtime::find($id);
        $emailadmin = User::where([['divisi',$request->divisi],['bisnis',$request->bisnis]])->get('email')->first();
        $emailmanajer = User::where([['divisi',$request->divisi],['bisnis',$request->bisnis]])->get('email')->last();
        //$emailhr = 'triacahyaramadhan@hotmail.com';

        try {
            $data->update([
                'manajer'   => $request->manajer,
                'nmmanajer' => $request->nmmanajer,
                'hr'        => $request->hr,
                'nmhr'      => $request->nmhr,
                'status'    => $request->status,
                'catatan'   => $request->catatan,
                'waktu'   => $request->waktu,
                'hari'   => $request->hari,
                'hspl'   => $request->hspl,
                'bspl'   => $request->bspl,
                'thspl'   => $request->thspl,
            ]);

            //$user = $emailhr;

            $details = [
                'greeting'  => 'SPL ' . $request->nomor,
                'head'      => 'Surat Perintah Lembur (SPL) ini telah diproses dengan status:',
                'line1'     => 'Hari Lembur     : ' . $request->hari . ', ' . $request->hspl . ' '. $request->bspl. ' '. $request->thspl ,
                'line2'     => 'Approve Manager : ' . $request->manajer,
                'line3'     => 'Approve HR      : ' . $request->hr,
                'line4'     => 'Status SPL      : ' . $request->status,
                'line5'     => 'Catatan         : ' . $request->catatan,
                'footnote'  =>
                'Note :
                Jika SPL ditolak, maka departemen pemohon yang bersangkutan, harus membuat SPL baru.',
                'actionText' => 'Buka',
                'actionURL' => url('http://103.152.243.49/hris/login'),
                'order_id' => 102
            ];
            
            //Notification::route('mail', $user)->notify(new ApproveNotification($details));
            Notification::route('mail', $emailadmin->email)->notify(new ApproveNotification($details));
            Notification::route('mail', $emailmanajer->email)->notify(new ApproveNotification($details));

            return redirect(route('overtimes.index'));   
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edits(Request $request,$id)
    {
        $data = Overtime::find($id);
        
            $cariuser1 = User::where([['divisi',$request->divisi],['bisnis',$request->bisnis]])->get('email')->first();
            $cariuser2 = User::where([['divisi',$request->divisi],['bisnis',$request->bisnis]])->get('email')->last();
            dd($cariuser1->email,$cariuser2->email);
       
    }

    public function print($id)
    {
        $overtime = Overtime::where('nomor',$id)->get();
        $detail = Detail::where('splid',$id)->get();
        $pdf = PDF::loadView('overtime.print', compact('overtime','detail'))->setPaper('a4', 'potrait');
        return $pdf->stream();
    }

    public function insert(Request $request)
    {
        $employee = Employee::where('nik',$request->nik)->first();
        $data = Overtime::where('nomor', $request->nomor)->get();
        //$menitawal = substr($request->mulai,3,2);
        //$menitakhir = substr($request->akhir,3,2);
        //$jamawal = substr($request->mulai,0,2) * 60 + $menitawal;
        //$jamakhir = substr($request->akhir,0,2) * 60 + $menitakhir;
        $mulai = explode('.',$request->mulai);
        $akhir = explode('.',$request->akhir);

        if($akhir[0] > $mulai[0])
        {
            $menitawal = $mulai[1];
            $menitakhir = $akhir[1];
            $jamawal = $mulai[0] * 60 + $menitawal;
            $jamakhir = $akhir[0] * 60 + $menitakhir;
            $total = $jamakhir - $jamawal;
            //$total = intdiv(($jamakhir - $jamawal),60) .'.'. ($jamakhir - $jamawal)%60;
        }else{
            $menitawal = $mulai[1];
            $menitakhir = $akhir[1];
            $jamawal = (24 - $mulai[0]) * 60 - $menitawal;
            $jamakhir = $akhir[0] * 60 + $menitakhir;
            $total = $jamakhir + $jamawal;
            //$total = intdiv(($jamakhir + $jamawal),60) .'.'. ($jamakhir + $jamawal)%60;
        }
        
        try {
            if($total>= 240){
                Detail::create([
                    'splid'     => $request->nomor,
                    'nama'      => Crypt::decryptString($employee->nama),
                    'nik'       => $request->nik,
                    'pekerjaan' => $request->pekerjaan,
                    'jabatan'   => Crypt::decryptString($employee->jabatan),
                    'pekerjaan' => $request->pekerjaan,
                    'spk'       => $request->spk,
                    'nospk'     => $request->nospk,
                    'hasil'     => $request->hasil,
                    'persen'    => $request->persen,
                    'mulai'     => $request->mulai,
                    'akhir'     => $request->akhir,
                    'total'     => $total,
                    'makan'     => $request->makan
                ]);
            }else{
                Detail::create([
                    'splid'     => $request->nomor,
                    'nama'      => Crypt::decryptString($employee->nama),
                    'nik'       => $request->nik,
                    'pekerjaan' => $request->pekerjaan,
                    'jabatan'   => Crypt::decryptString($employee->jabatan),
                    'pekerjaan' => $request->pekerjaan,
                    'spk'       => $request->spk,
                    'nospk'     => $request->nospk,
                    'hasil'     => $request->hasil,
                    'persen'    => $request->persen,
                    'mulai'     => $request->mulai,
                    'akhir'     => $request->akhir,
                    'total'     => $total,
                    'makan'     => ''
                ]);
            }

            /*$otwaktu = explode('.', $request->total);
            $otjam = $otwaktu[0]*60;
            $otmenit = $otwaktu[1];
            $otjumlah = $otjam + $otmenit;

            $addwaktu = explode('.', $total);
            $addjam = $addwaktu[0]*60;
            $addmenit = $addwaktu[1];
            $addjumlah = $addjam + $addmenit;

            $waktulemburpart = $otjumlah + $addjumlah;
            $waktulembur = intdiv(($waktulemburpart),60) .'.'. ($waktulemburpart)%60;

            $totallembur = $data->total + $waktulembur;
            
            $data->update([
                'total'     => $otjumlah,
            ]);*/

            alert()->toast('Data karyawan pada SPL telah berhasil ditambahkan','success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function deletedetail($id)
    {
        $data = Detail::find($id);
        try
        {
            $data->delete();
                alert()->toast('Data karyawan pada SPL telah dihapus','warning');
                return redirect()->back();
        }
        catch (\Exception $e)
        {
            alert()->toast('Data tidak ditemukan','error');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $data = Overtime::find($id);
        $detail = Detail::where('splid', $data->nomor);
        try
        {
            $data->delete();
            $detail->delete();
                alert()->toast('SPL telah dihapus','warning');
                return redirect()->back();
        }
        catch (\Exception $e)
        {
            alert()->toast('Data tidak ditemukan','error');
            return redirect()->back();
        }
    }
}
