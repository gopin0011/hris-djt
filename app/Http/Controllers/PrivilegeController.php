<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Log;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrivilegeController extends Controller
{
    public function privilege()
    {
        $data = User::where('admin','!=','4')->get();
        return view('changeprivilege.index', compact('data'));
        
    }

    public function changeprivilege($id)
    {
        $divisi = Division::all();
        $unit = Unit::all();
        $data = User::find($id);
        return view('changeprivilege.edit', compact('data','divisi','unit'));
    }

    public function updateprivilege(Request $request, $id)
    {
        $data = User::find($id);
        try {
            $data->update([
                'admin'    => $request->admin,
                'bisnis'    => $request->unit,
                'divisi'    => $request->divisi
            ]);

            Log::create([
                'user' => Auth::user()->email,
                'action' => 'Change Privilege',
                'ip' => \Request::getClientIp(true),
                'status' => 'Change Success',
                'note' => $data->email . ' - privilege changed'
            ]);

            return redirect(route('users.privilege'))->with([alert()->toast('User level telah diubah','success')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
