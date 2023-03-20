<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\Auth\ForgotPasswordController;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PrintContoller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PsychotestController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ReferenceController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\StudyController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\DocController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\SwitchController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\OvertimeController;
use App\Http\Controllers\PrivilegeController;
use App\Http\Controllers\PunishmentController;
use App\Http\Controllers\SalaryController;
use App\Models\DetailOvertime;
use App\Models\Log;
use Illuminate\Support\Facades\Password;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'web'], function()
{
    Route::auth();
});

Route::group(['middleware' => ['web','auth']], function()
{
    //Home
    Route::get('/home', function(){
        return redirect('/');
    })->name('djt.home');

    Route::get('/', function(){
        if(Auth::user()->admin == 0)
        {
            alert()->success('Selamat datang ', 'anda telah berhasil login');
            return view('user');
        }
        elseif(Auth::user()->admin == 1)
        {
            alert()->success('Selamat datang ', 'anda telah berhasil login');
            return view('admin');
        }
        else
        {
            alert()->success('Selamat datang ', 'anda telah berhasil login');
            return view('switch.index');
        }
    });
    
   //Editor
   Route::group(['prefix' => 'editor'], function(){
    Route::get('/', [EditController::class, 'index'])->name('editor.index');
    Route::get('/family/{id}', [EditController::class, 'family'])->name('editor.family');
    Route::get('/study/{id}', [EditController::class, 'study'])->name('editor.study');
    Route::get('/reference/{id}', [EditController::class, 'reference'])->name('editor.reference');
    Route::get('/career/{id}', [EditController::class, 'career'])->name('editor.career');
    Route::get('/career-create/{id}', [EditController::class, 'careercreate'])->name('editor.careercreate');
    Route::get('/career-edit/{id}', [EditController::class, 'careeredit'])->name('editor.careeredit');
    Route::get('/account/{id}', [EditController::class, 'account'])->name('editor.account');
    Route::post('/account/{id}', [EditController::class, 'update'])->name('editor.update');
    Route::get('/delete/{id}', [EditController::class, 'delete'])->name('editor.delete');
   });

    //Employee
    Route::group(['prefix' => 'employees'], function(){
        Route::get('/', [EmployeeController::class, 'index'])->name('employees.index');
        Route::get('/staffalper', [EmployeeController::class, 'staffalper'])->name('employees.staffalper');
        Route::get('/stafflegano', [EmployeeController::class, 'stafflegano'])->name('employees.stafflegano');
        Route::get('/tlh', [EmployeeController::class, 'indextlh'])->name('employees.index-tlh');
        Route::get('/tlhalper', [EmployeeController::class, 'tlhalper'])->name('employees.tlhalper');
        Route::get('/tlhlegano', [EmployeeController::class, 'tlhlegano'])->name('employees.tlhlegano');
        Route::get('/resign', [EmployeeController::class, 'resign'])->name('employees.resign');
        Route::get('/resignalper', [EmployeeController::class, 'resignalper'])->name('employees.resignalper');
        Route::get('/resignlegano', [EmployeeController::class, 'resign'])->name('employees.resignlegano');
        Route::get('/resigntlh', [EmployeeController::class, 'resigntlh'])->name('employees.resigntlh');
        Route::get('/resigntlhalper', [EmployeeController::class, 'resigntlhalper'])->name('employees.resigntlhalper');
        Route::get('/resigntlhlegano', [EmployeeController::class, 'resigntlhlegano'])->name('employees.resigntlhlegano');
        Route::get('/basic', [EmployeeController::class, 'basic'])->name('employees.basic');
        Route::get('/job', [EmployeeController::class, 'job'])->name('employees.job');
        Route::get('/finance', [EmployeeController::class, 'finance'])->name('employees.finance');
        Route::get('/study', [EmployeeController::class, 'study'])->name('employees.study');
        Route::get('/reward', [EmployeeController::class, 'reward'])->name('employees.reward');
        Route::get('/punishment', [EmployeeController::class, 'punishment'])->name('employees.punishment');
        Route::get('/kpi', [EmployeeController::class, 'kpi'])->name('employees.kpi');
        Route::get('/create', [EmployeeController::class, 'create'])->name('employees.create');
        Route::post('/store', [EmployeeController::class, 'store'])->name('employees.store');
        Route::get('/{id}', [EmployeeController::class, 'edit'])->name('employees.edit');
        Route::post('/{id}', [EmployeeController::class, 'update'])->name('employees.update');
        Route::get('/{id}/delete', [EmployeeController::class, 'delete'])->name('employees.delete');
    });

    //Salary
    Route::group(['prefix' => 'salaries'], function(){
        Route::get('/', [SalaryController::class, 'index'])->name('salaries.index');
        Route::get('/create/{id}', [SalaryController::class, 'create'])->name('salaries.create');
        Route::post('/store', [SalaryController::class, 'store'])->name('salaries.store');
        Route::get('/{id}', [SalaryController::class, 'edit'])->name('salaries.edit');
        Route::post('/{id}', [SalaryController::class, 'update'])->name('salaries.update');
        Route::get('/{id}/delete', [SalaryController::class, 'delete'])->name('salaries.delete');
    });

    //Reward
    Route::group(['prefix' => 'rewards'], function(){
        Route::get('/', [EmployeeController::class, 'reward_index'])->name('rewards.index');
        Route::get('/{id}', [EmployeeController::class, 'reward_edit'])->name('rewards.edit');
        Route::post('/{id}', [EmployeeController::class, 'reward_update'])->name('rewards.update');
    });

    //Punishments
    Route::group(['prefix' => 'punishments'], function(){
        Route::get('/', [PunishmentController::class, 'index'])->name('punishments.index');
        Route::get('/create', [PunishmentController::class, 'create'])->name('punishments.create');
        Route::post('/', [PunishmentController::class, 'store'])->name('punishments.store');
        Route::get('/delete/{id}', [PunishmentController::class, 'delete'])->name('punishments.delete');
        Route::get('/print/{id}', [PunishmentController::class, 'print'])->name('punishments.print');
    });

    //Office
    Route::group(['prefix' => 'offices'], function(){
        Route::get('/', [OfficeController::class, 'update'])->name('offices.update');
        Route::post('/store', [OfficeController::class, 'store'])->name('offices.store');
    });

    //Log
    Route::group(['prefix' => 'logs'], function(){
        Route::get('/', [LogController::class, 'index'])->name('logs.index');
    });

    //Privilege
    Route::get('/users/privilege',[PrivilegeController::class, 'privilege'])->name('users.privilege');
    Route::get('/users/change-privilege/{id}',[PrivilegeController::class, 'changeprivilege'])->name('users.changeprivilege');
    Route::post('/users/change-privilege/{id}',[PrivilegeController::class, 'updateprivilege'])->name('users.updateprivilege');

    //Switch
    Route::get('/rekrutmen', [SwitchController::class, 'rekrutmen'])->name('switch.rekrutmen');
    Route::get('/emp', [SwitchController::class, 'emp'])->name('switch.emp');
    Route::get('/overtime', [SwitchController::class, 'overtime'])->name('switch.overtime');

    //Doc
    Route::group(['prefix' => 'docs'], function() {
        Route::get('/', [DocController::class, 'index'])->name('docs.index');   
        Route::get('/list', [DocController::class, 'user'])->name('docs.user');   
        Route::post('/process', [DocController::class, 'process'])->name('docs.process');   
        Route::get('/delete/{id}', [DocController::class, 'delete'])->name('docs.delete');
    });

    //Document
    Route::group(['prefix' => 'documents'], function() {
        Route::get('/', [DocumentController::class, 'index'])->name('documents.index');   
        Route::post('/process', [DocumentController::class, 'process'])->name('documents.process');    
        Route::get('/delete/{id}', [DocumentController::class, 'delete'])->name('documents.delete');    
        Route::get('/all', [DocumentController::class, 'all'])->name('documents.all');
    });
   
    //Contract
     Route::group(['prefix' => 'contracts'], function() {
        Route::get('/', [ContractController::class, 'all'])->name('contracts.all'); 
         Route::get('/all', [ContractController::class, 'index'])->name('contracts.index');   
         Route::get('/create/{id}/{idcon}', [ContractController::class, 'create'])->name('contracts.create');   
         Route::get('/ext', [ContractController::class, 'ext'])->name('contracts.ext');   
         Route::post('/store',[ContractController::class, 'store'])->name('contracts.store');
         Route::get('/{id}/show',[ContractController::class, 'print'])->name('contracts.print'); 
         Route::get('/{id}/showext',[ContractController::class, 'printext'])->name('contracts.printext'); 
         Route::get('/{id}/delete',[ContractController::class, 'delete'])->name('contracts.delete'); 
         Route::get('/{id}/deleteext',[ContractController::class, 'deleteext'])->name('contracts.deleteext'); 
         Route::post('/ekstensi', [ContractController::class, 'ekstensi'])->name('contracts.ekstensi'); 
         Route::get('/tlh', [ContractController::class, 'tlh'])->name('contracts.tlh'); 
    });

    //Overtime
    Route::group(['prefix' => 'overtimes'], function() {
        Route::post('/store', [OvertimeController::class, 'store'])->name('overtimes.store');   
        Route::post('/detailcreate/{id}', [OvertimeController::class, 'insert'])->name('overtimes.insert');   
        Route::get('/', [OvertimeController::class, 'index'])->name('overtimes.index');   
        Route::get('/create', [OvertimeController::class, 'create'])->name('overtimes.create');   
        Route::get('/detailcreate/{id}', [OvertimeController::class, 'detailcreate'])->name('overtimes.detailcreate');   
        Route::get('/manager-app', [OvertimeController::class, 'man'])->name('overtimes.man');   
        Route::get('/hr-app', [OvertimeController::class, 'hr'])->name('overtimes.hr');   
        Route::get('/end', [OvertimeController::class, 'end'])->name('overtimes.end');   
        Route::get('/all', [OvertimeController::class, 'start'])->name('overtimes.start');   
        Route::get('/{id}/deletedetail', [OvertimeController::class, 'deletedetail'])->name('overtimes.deletedetail');
        Route::get('/{id}/delete', [OvertimeController::class, 'delete'])->name('overtimes.delete');
        Route::post('/{id}/edit', [OvertimeController::class, 'edit'])->name('overtimes.edit');
        Route::get('/print/{id}', [OvertimeController::class, 'print'])->name('overtimes.print');
        Route::get('/ca/create', [OvertimeController::class, 'ca'])->name('overtimes.ca');
        Route::post('/ca/print', [OvertimeController::class, 'caprint'])->name('overtimes.caprint');
    });

    //Invitation
    Route::group(['prefix' => 'invitations'], function() {
        Route::post('/', [InvitationController::class, 'update'])->name('invitations.update');
        Route::get('/{id}/delete', [InvitationController::class, 'delete'])->name('invitations.delete');
        Route::get('/', [InvitationController::class, 'index'])->name('invitations.index');    
    });

    //Notification
    Route::get('/setting-date/send', [HomeController::class, 'sendNotification'])->name('settingdate.notif');
    Route::get('/inivitation/send', [HomeController::class, 'sendInvitation'])->name('invitation.notif');
    Route::get('/approve/send', [HomeController::class, 'sendApprove'])->name('approve.notif');

    //Interview
    Route::get('/interview/preschedule',[InterviewController::class, 'preschedule'])->name('interview.preschedule');
    Route::get('/interview/setschedule/{id}',[InterviewController::class, 'setschedule'])->name('interview.setschedule');
    Route::get('/interview/reschedule/{id}',[InterviewController::class, 'reschedule'])->name('interview.reschedule');
    Route::post('/interview/setschedule/{id}',[InterviewController::class, 'storeschedule'])->name('interview.storeschedule');
    Route::get('/interview/resetschedule/{id}',[InterviewController::class, 'resetschedule'])->name('interview.resetschedule');
    Route::post('/interview/resetschedule/{id}',[InterviewController::class, 'postresetschedule'])->name('interview.postresetschedule');
    Route::get('/interview/schedule',[InterviewController::class, 'schedule'])->name('interview.schedule');
    Route::get('/interview/list',[InterviewController::class, 'list'])->name('interview.list');
    Route::get('/interview/keep',[InterviewController::class, 'keep'])->name('interview.keep');
    Route::get('/interview/test/{id}',[InterviewController::class, 'test'])->name('interview.test');
    Route::post('/interview/test/{id}',[InterviewController::class, 'storetest'])->name('interview.storetest');
    Route::get('/interview/test/',[InterviewController::class, 'caripelamar'])->name('caripelamar');
    Route::get('/interview/list-today',[InterviewController::class, 'listtoday'])->name('interview.listtoday');

    //Psychotest
    Route::get('/psychotest/list',[PsychotestController::class, 'list'])->name('psychotest.list');
    Route::get('/psychotest/list-today',[PsychotestController::class, 'listtoday'])->name('psychotest.listtoday');
    Route::get('/psychotest/test/{id}',[PsychotestController::class, 'test'])->name('psychotest.test');
    Route::post('/psychotest/test/{id}',[PsychotestController::class, 'storetest'])->name('psychotest.storetest');

    //Result
    Route::get('/results/list', [ResultController::class,'list'])->name('results.list');
    Route::get('/results/test/{id}',[ResultController::class, 'test'])->name('results.test');
    Route::post('/results/test/{id}',[ResultController::class, 'store'])->name('results.store');

    //Family
    Route::group(['prefix' => 'families'], function() {
        Route::post('/{id}', [FamilyController::class, 'update'])->name('families.update');
        Route::post('/updatedad/{id}', [FamilyController::class, 'updatedad'])->name('families.updatedad');
        Route::post('/updatemom/{id}', [FamilyController::class, 'updatemom'])->name('families.updatemom');
        Route::post('/updatemate/{id}', [FamilyController::class, 'updatemate'])->name('families.updatemate');
        Route::get('/{id}/delete', [FamilyController::class, 'delete'])->name('families.delete');
        Route::get('/', [FamilyController::class, 'index'])->name('families.index');    
    });

    //Study
    Route::group(['prefix' => 'studies'], function() {
        Route::post('/{id}', [StudyController::class, 'update'])->name('studies.update');
        Route::get('/{id}/delete', [StudyController::class, 'delete'])->name('studies.delete');
        Route::get('/', [StudyController::class, 'index'])->name('studies.index');    
    });
    
    //Training
    Route::group(['prefix' => 'trainings'], function() {
        Route::post('/{id}', [TrainingController::class, 'update'])->name('trainings.update');
        Route::get('/{id}/delete', [TrainingController::class, 'delete'])->name('trainings.delete');
        Route::get('/', [TrainingController::class, 'index'])->name('trainings.index');    
    });
    
    //Language
    Route::group(['prefix' => 'languages'], function() {
        Route::post('/{id}', [LanguageController::class, 'update'])->name('languages.update');
        Route::get('/{id}/delete', [LanguageController::class, 'delete'])->name('languages.delete');
        Route::get('/', [LanguageController::class, 'index'])->name('languages.index');    
    });

    //Socials
    Route::group(['prefix' => 'socials'], function() {
        Route::post('/{id}', [SocialController::class, 'update'])->name('socials.update');
        Route::get('/{id}/delete', [SocialController::class, 'delete'])->name('socials.delete');
        Route::get('/', [SocialController::class, 'index'])->name('socials.index');    
    });

    //Reference
    Route::group(['prefix' => 'references'], function() {
        Route::post('/{id}', [ReferenceController::class, 'update'])->name('references.update');
        Route::get('/{id}/delete', [ReferenceController::class, 'delete'])->name('references.delete');
        Route::get('/', [ReferenceController::class, 'index'])->name('references.index');    
    });

    //Career
    Route::group(['prefix' => 'careers'], function() {
        Route::get('/create', [CareerController::class, 'create'])->name('careers.create');
        Route::post('/', [CareerController::class, 'store'])->name('careers.store');
        Route::get('/{id}', [CareerController::class, 'edit'])->name('careers.edit');
        Route::post('/{id}', [CareerController::class, 'update'])->name('careers.update');
        Route::get('/{id}/delete', [CareerController::class, 'delete'])->name('careers.delete');
        Route::get('/', [CareerController::class, 'index'])->name('careers.index');    
    });

    //Profile
    Route::resource('profiles', ProfileController::class);

    //Question
    Route::resource('questions', QuestionController::class);

    //Application
    Route::group(['prefix' => 'applications'], function() {
        Route::post('/{id}', [ApplicationController::class, 'update'])->name('applications.update');
        Route::get('/{id}/delete', [ApplicationController::class, 'delete'])->name('applications.delete');
        Route::get('/{id}/deletedev', [ApplicationController::class, 'deletedev'])->name('applications.deletedev');
        Route::get('/', [ApplicationController::class, 'index'])->name('applications.index');    
        Route::get('/all', [ApplicationController::class, 'all'])->name('applications.all');    
        Route::get('/inv', [ApplicationController::class, 'inv'])->name('applications.inv');    
        Route::get('/app', [ApplicationController::class, 'app'])->name('applications.app');    
        Route::get('/profile', [ApplicationController::class, 'profile'])->name('applications.profile');    
        Route::get('/job-edit/{id}', [ApplicationController::class, 'jobedit'])->name('job-edit');  
        Route::post('/job-edit/{id}', [ApplicationController::class, 'jobeditStore'])->name('job-edit.store'); 
    });
    
    //Print
    Route::group(['prefix' => 'prints'], function(){
        Route::get('/applicant/{id}',[PrintContoller::class, 'applicant'])->name('prints.applicant');
        Route::get('/applicantdev/{id}',[PrintContoller::class, 'applicantdev'])->name('prints.applicantdev');
        Route::get('/appcomp/{id}',[PrintContoller::class, 'appcomp'])->name('prints.appcomp');
    });

    //Vacancy
    Route::group(['prefix' => 'vacancies'], function() {
        Route::get('/create', [VacancyController::class, 'create'])->name('vacancies.create');
        Route::get('/list', [VacancyController::class, 'list'])->name('vacancies.list');    
        Route::post('/', [VacancyController::class, 'store'])->name('vacancies.store');
        Route::get('/{id}', [VacancyController::class, 'edit'])->name('vacancies.edit');
        Route::post('/{id}', [VacancyController::class, 'update'])->name('vacancies.update');
        Route::get('/{id}/delete', [VacancyController::class, 'delete'])->name('vacancies.delete');
        Route::get('/', [VacancyController::class, 'index'])->name('vacancies.index');    
    });

    //Unit
    Route::group(['prefix' => 'units'], function() {
        Route::post('/', [UnitController::class, 'update'])->name('units.update');
        Route::get('/{id}/delete', [UnitController::class, 'delete'])->name('units.delete');
        Route::get('/', [UnitController::class, 'index'])->name('units.index');    
    });

    //Division
    Route::group(['prefix' => 'divisions'], function() {
        Route::post('/', [DivisionController::class, 'update'])->name('divisions.update');
        Route::get('/{id}/delete', [DivisionController::class, 'delete'])->name('divisions.delete');
        Route::get('/', [DivisionController::class, 'index'])->name('divisions.index');    
    });

    //Check
    Route::group(['prefix' => 'checks'], function() {
        Route::get('/', [CheckController::class, 'index'])->name('checks.index');
    });

    //Dashboard
    Route::get('/dashboard', function(){
        if(Auth::user()->admin == 0)
        {
            return view('user');
        }
        else
        {
            return view('admin');
        }
    });

    Route::get('/logout',function(){

        Log::create([
            'user' => Auth::user()->email,
            'action' => 'Logout',
            'ip' => \Request::getClientIp(true),
            'status' => 'Logout Success',
            'note' => Auth::user()->email . ' - logged out [Rekrutmen]'
        ]);

        Auth::logout();
        alert()->info('Sampai jumpa', 'anda telah berhasil logout');
        return redirect('/login');
    })->name('auth.logout');
});

Auth::routes(['verify' => true]);

Route::get('/', [HomeController::class, 'index'])->name('home'); 

//forgot-password
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware(['guest'])->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );
    if($status)
    {    return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
    }
})->middleware(['guest'])->name('password.email');

//edit-account
Route::get('edit-account', [UserController::class, 'index'])->name('edit.index');
Route::post('edit-account', [UserController::class, 'store'])->name('edit.account');

//change-password
Route::get('change-password', [ChangePasswordController::class, 'index'])->name('change.index');
Route::post('change-password', [ChangePasswordController::class, 'store'])->name('change.password');
