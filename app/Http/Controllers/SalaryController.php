<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Division;
use App\Models\Employee;
use App\Models\Office;
use App\Models\Profile;
use App\Models\Salary;
use App\Models\Study;
use App\Models\Unit;
use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function index()
    {
        $data = Salary::all();
        return view('salary.index',compact('data'));
    }

    public function create($id)
    {
        $data = Employee::find($id);
        $unit = Unit::all();
        $divisi = Division::all();
        $loker = Vacancy::all();
        $office = Office::find(1);
        return view('salary.create',compact('data','unit','divisi','loker','office'));
    }

    public function delete($id)
    {
        $data = Salary::find($id);
        $data->delete();
        alert()->toast('Data perubahan gaji telah dihapus','warning');
        return redirect(route('salaries.index'));
    }
}
