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
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
  
class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $a = Application::where('user_id',Auth::user()->id)->get()->count();
        $b = Profile::where('user_id',Auth::user()->id)->get()->count();
        $b1 = Family::where('user_id',Auth::user()->id)->get()->count();
        $b2 = Study::where('user_id',Auth::user()->id)->get()->count();
        $b3 = Question::where('user_id',Auth::user()->id)->get()->count();
        $c = Document::where('user_id',Auth::user()->id)->get()->count();
        if(Auth::user()->admin == 0)
        {
            return view('auth.passwords.index',compact('a','b','b1','b2','b3','c'));
        }
        else
        {
            return view('auth.passwords.index');
        }
        
    } 
   
    public function store(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        Log::create([
            'user' => Auth::user()->email,
            'action' => 'Change Password',
            'ip' => \Request::getClientIp(true),
            'status' => 'Change Password Success',
            'note' => Auth::user()->email . ' - password changed [Rekrutmen]'
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        alert()->toast('Password anda telah berhasil diubah.','success');
        return redirect(route('djt.home'));
    }
}