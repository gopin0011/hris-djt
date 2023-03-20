<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Document;
use App\Models\Family;
use App\Models\Log;
use App\Models\Profile;
use App\Models\Question;
use App\Models\Study;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = User::where('id',Auth::user()->id)->get();
        $a = Application::where('user_id',Auth::user()->id)->get()->count();
        $b = Profile::where('user_id',Auth::user()->id)->get()->count();
        $b1 = Family::where('user_id',Auth::user()->id)->get()->count();
        $b2 = Study::where('user_id',Auth::user()->id)->get()->count();
        $b3 = Question::where('user_id',Auth::user()->id)->get()->count();
        $c = Document::where('user_id',Auth::user()->id)->get()->count();
        if(Auth::user()->admin == 0)
        {
            return view('auth.users.index',compact('user','a','b','b1','b2','b3','c'));
        }
        else
        {
            return view('auth.users.index',compact('user'));
        }
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
        ]);
   
        User::find(auth()->user()->id)->update([
            'name'=> $request->name,
            'email'=> $request->email,
            ]);

            Log::create([
                'user' => Auth::user()->email,
                'action' => 'Change Data',
                'ip' => \Request::getClientIp(true),
                'status' => 'Change Data Success',
                'note' => Auth::user()->email . ' - data changed [Rekrutmen]'
            ]);

        alert()->toast('Data anda telah berhasil diubah.','success');
        return redirect(route('djt.home'));
    }
}
