<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Document;
use App\Models\Family;
use App\Models\Profile;
use App\Models\Question;
use App\Models\Study;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Notifications\InvitationNotification;
use App\Notifications\RekrutmenNotification;
use Notification;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index()
    {
        if((Auth::user()->admin == 2)||(Auth::user()->admin == 3))
        {
            return view('switch.index');
        }
        elseif((Auth::user()->admin == 1)||(Auth::user()->admin == 11))
        {       
            return view('admin');
        }
        else
        {
            $a = Application::where('user_id',Auth::user()->id)->get()->count();
            $b = Profile::where('user_id',Auth::user()->id)->get()->count();
            $b1 = Family::where('user_id',Auth::user()->id)->get()->count();
            $b2 = Study::where('user_id',Auth::user()->id)->get()->count();
            $b3 = Question::where('user_id',Auth::user()->id)->get()->count();
            $c = Document::where('user_id',Auth::user()->id)->get()->count();
            return view('user', compact('a','b','c','b1','b2','b3'));
        }
    }

    public function sendNotification()
    {
        $user = User::first();

        $details = [
            'greeting' => 'Selamat',
            'body' => 'Anda telah mendapatkan jadwal interview, segera cek akun Rekrutmen anda.',
            'thanks' => 'Terima kasih',
            'actionText' => 'Lihat Jadwal',
            'actionURL' => url('http://localhost:8000/applications'),
            'order_id' => 101
        ];
        Notification::send($user, new RekrutmenNotification($details));

        dd('done');
    }

    public function sendInvitation()
    {
        $user = User::first();

        $details = [
            'greeting' => 'Selamat',
            'body' => 'Anda telah mendapatkan jadwal interview, segera cek akun Rekrutmen anda.',
            'thanks' => 'Terima kasih',
            'actionText' => 'Lihat Jadwal',
            'actionURL' => url('http://localhost:8000/applications'),
            'order_id' => 102
        ];
        Notification::send($user, new InvitationNotification($details));

        dd('done');
    }
}
