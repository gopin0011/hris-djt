<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Office;
use App\Models\Punishment;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use PDF;

class PunishmentController extends Controller
{
    public function index()
    {
        $data = Punishment::all();
        return view('punishment.index', compact('data'));
    }

    public function create()
    {
        $employee = Employee::all();
        $hari = Carbon::now()->format('l');
        if($hari == "Sunday"){
            $namahari = "Minggu";
        }elseif($hari == "Monday"){
            $namahari = "Senin";
        }elseif($hari == "Tuesday"){
            $namahari = "Selasa";
        }elseif($hari == "Wednesday"){
            $namahari = "Rabu";
        }elseif($hari == "Thursday"){
            $namahari = "Kamis";
        }elseif($hari == "Friday"){
            $namahari = "Jumat";
        }elseif($hari == "Saturday"){
            $namahari = "Sabtu";
        }
        $office = Office::find(1);
        return view('punishment.create', compact('employee','namahari','office'));
    }

    public function store(Request $request)
    {
        $data = Employee::where('nik', $request->nik)->first();
        if($data->bisnis == 'Alat Peraga'){
            $nomorbisnis = 'ALP';
        }else{
            $nomorbisnis = 'LGN';
        }

        if($request->bulan == '1'){
            $nomorbulan = 'I';
            $namabulan = 'Januari';
        }elseif($request->bulan == '2'){
            $nomorbulan = 'II';
            $namabulan = 'Februari';
        }elseif($request->bulan == '3'){
            $nomorbulan = 'III';
            $namabulan = 'Maret';
        }elseif($request->bulan == '4'){
            $nomorbulan = 'IV';
            $namabulan = 'April';
        }elseif($request->bulan == '5'){
            $nomorbulan = 'V';
            $namabulan = 'Mei';
        }elseif($request->bulan == '6'){
            $nomorbulan = 'VI';
            $namabulan = 'Juni';
        }elseif($request->bulan == '7'){
            $nomorbulan = 'VII';
            $namabulan = 'Juli';
        }elseif($request->bulan == '8'){
            $nomorbulan = 'VIII';
            $namabulan = 'Agustus';
        }elseif($request->bulan == '9'){
            $nomorbulan = 'IX';
            $namabulan = 'September';
        }elseif($request->bulan == '10'){
            $nomorbulan = 'X';
            $namabulan = 'Oktober';
        }elseif($request->bulan == '11'){
            $nomorbulan = 'XI';
            $namabulan = 'November';
        }elseif($request->bulan == '12'){
            $nomorbulan = 'XII';
            $namabulan = 'Desember';
        }

        $nomorsp = $request->nomor . '/HRD/DJT-' . $nomorbisnis . '/' . $request->jenis . '/' . $nomorbulan . '/' . $request->tahun;
        try {
            Punishment::create([
                'nomor'     => $nomorsp, //001/HRD/DJT-ALP/SP2/I/21
                'nik'       => $request->nik,
                'nama'      => Crypt::decryptString($data->nama),
                'bisnis'    => $data->bisnis,
                'divisi'    => $data->divisi,
                'jabatan'   => Crypt::decryptString($data->jabatan),
                'namahari'  => $request->namahari,
                'hari'      => $request->hari,
                'bulan'     => $namabulan,
                'tahun'     => $request->tahun,
                'jenis'     => $request->jenis,
                'alasan'    => $request->alasan,
                'hr'        => $request->hr,
                'direktur'  => $request->direktur,
                'atasan'    => $request->atasan   
            ]);
            alert()->toast('Data pelanggaran telah berhasil ditambahkan','success');
            return redirect(route('punishments.index'));
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function delete($id)
    {
        $data = Punishment::find($id);
        $data->delete();
        alert()->toast('Data telah dihapus','warning');
        return redirect()->back();
    }

    public function print($id)
    {
        $data = Punishment::where('id',$id)->get();
        $pdf = PDF::loadView('punishment.print', compact('data'))->setPaper('a4', 'potrait');
        return $pdf->stream();
    }
}
