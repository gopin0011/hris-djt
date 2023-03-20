<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SwitchController extends Controller
{
    public function rekrutmen()
    {
        return view('switch.rekrutmen');
    }

    public function emp()
    {
        return view('switch.emp');
    }

    public function overtime()
    {
        return redirect(route('overtimes.index'));
    }
}
