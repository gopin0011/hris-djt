<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Document;
use App\Models\Family;
use App\Models\Profile;
use App\Models\Question;
use App\Models\Study;
use App\Models\User;
use Illuminate\Http\Request;

class CheckController extends Controller
{
    public function index()
    {
        $data = User::where('admin','0')->get();
        $document = Document::all();
        $profile = Profile::all();
        $family = Family::all();
        $study = Study::all();
        $quest = Question::all();
        $application = Application::all();
        return view('check.index',compact('data','document','profile','application','family','study','quest'));
    }
}
