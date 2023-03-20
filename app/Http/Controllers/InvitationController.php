<?php

namespace App\Http\Controllers;

use App\Models\Invcode;
use App\Models\Invitation;
use App\Models\Vacancy;
use App\Notifications\InvitationNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Notification;
use Illuminate\Support\Str;

class InvitationController extends Controller
{
   
    public function index()
    {
        $data = Invitation::all();
        $vacancy = Vacancy::where('status','1')->get();
        return view('invitation.index',compact('data','vacancy'));
    }

    public function update(Request $request)
    {
        try {
            Invitation::create([
                'nama'      => Crypt::encryptString($request->nama),
                'email'     => Crypt::encryptString($request->email),
                'posisi'    => $request->posisi,
                'namahari'  => $request->namahari,
                'hari'      => $request->hari,
                'bulan'     => $request->bulan,
                'tahun'     => $request->tahun,
                'jam'       => $request->jam,
                'pic'       => $request->pic,
                'jenis'     => $request->jenis,
            ]);
            
            $invcode = Str::random(5);
            Invcode::create([
                'code'      => $invcode,
                'email'     => $request->email,
                'loker'     => $request->posisi,
                'namahari'  => $request->namahari,
                'hari'      => $request->hari,
                'bulan'     => $request->bulan,
                'tahun'     => $request->tahun,
                'jam'       => $request->jam,
                'status'    => '',
            ]);
            $user = $request->email;

            if($request->jenis == "Offline")
            {
                $details = [
                    'greeting'  => 'Kepada, ' . $request->nama,
                    'head'      => 'Bersama ini kami, PT. Dwida Jaya Tama, bermaksud mengundang Ibu/Bapak untuk mengikuti proses interview untuk posisi ' . $request->posisi . ' yang akan dilaksanakan pada:',
                    'line1'     => 'Hari      : '. $request->namahari . ', ' . $request->hari . ' ' . $request->bulan . ' ' . $request->tahun . '',
                    'line2'     => 'Pukul     : '. $request->jam . ' WIB s/d Selesai',
                    'line3'     => 'Tempat    : PT Dwida Jaya Tama ',
                    'line4'     => 'Alamat    : Jl. Pemuda No. 4 Kel. Padurenan, Kec. Gunung Sindur, Bogor',
                    'line5'     => 'Telepon   : (0251) 8619700 / 8619600 ',
                    'line6'     => 'Bertemu   : '. $request->pic,
                    'line7'     => 'INVITATION CODE : '. $invcode,
                    'thanks'    => 'Besar harapan kami atas kehadiran ' . $request->nama . ' di perusahaan kami.',
                    'footnote'  =>
                    'Catatan : Buat akun pelamar dan ikuti tata cara pendaftarannya. Masukkan INVITATION CODE pada saat memilih lowongan pekerjaan.',
                    'actionText' => 'Buat akun',
                    'actionURL' => url('https://bit.ly/djt-registration'),
                    'order_id' => 102
                ];
            }
            else
            {
                $details = [
                    'greeting'  => 'Kepada, ' . $request->nama,
                    'head'      => 'Bersama ini kami, PT. Dwida Jaya Tama, bermaksud mengundang Ibu/Bapak untuk mengikuti proses interview online via Zoom untuk posisi ' . $request->posisi . ' yang akan dilaksanakan pada:',
                    'line1'     => 'Hari      : '. $request->namahari . ', ' . $request->hari . ' ' . $request->bulan . ' ' . $request->tahun . '',
                    'line2'     => 'Pukul     : '. $request->jam . ' WIB s/d Selesai',
                    'line3'     => 'Media     : Zoom ',
                    'line4'     => 'Link      : link akan dikirimkan via WhatsApp ',
                    'line5'     => ' ',
                    'line6'     => ' ',
                    'line7'     => 'INVITATION CODE : '. $invcode,
                    'thanks'    => ' ',
                    'footnote'  =>
                    'Catatan : Buat akun pelamar dan ikuti tata cara pendaftarannya. Masukkan INVITATION CODE pada saat memilih lowongan pekerjaan.',
                    'actionText' => 'Buat akun',
                    'actionURL' => url('https://bit.ly/djt-registration'),
                    'order_id' => 102
                ];
            }

            
            Notification::route('mail', $user)->notify(new InvitationNotification($details));
            Notification::route('mail', "noreplay.djt@gmail.com")->notify(new InvitationNotification($details));

            alert()->toast('Undangan telah dikirim','success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function delete($id)
    {
        $data = Invitation::find($id);
        try
        {
            $data->delete();
            alert()->toast('Undangan telah dihapus','warning');
            return redirect()->back();
        }
        catch (\Exception $e)
        {
            alert()->toast('Data tidak ditemukan','error');
            return redirect()->back();
        }
    }
}
