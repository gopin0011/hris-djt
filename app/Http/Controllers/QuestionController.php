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

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Question::where('user_id',Auth::user()->id)->first();
        if($data){
            $detaildata = Question::where('user_id',Auth::user()->id)->get();
            $a = Application::where('user_id',Auth::user()->id)->get()->count();
            $b = Profile::where('user_id',Auth::user()->id)->get()->count();
            $b1 = Family::where('user_id',Auth::user()->id)->get()->count();
            $b2 = Study::where('user_id',Auth::user()->id)->get()->count();
            $b3 = Question::where('user_id',Auth::user()->id)->get()->count();
            $c = Document::where('user_id',Auth::user()->id)->get()->count();
            return view ('question.edit',compact('detaildata','a','b','c','b1','b2','b3'));
        }else{
            $a = Application::where('user_id',Auth::user()->id)->get()->count();
            $b = Profile::where('user_id',Auth::user()->id)->get()->count();
            $b1 = Family::where('user_id',Auth::user()->id)->get()->count();
            $b2 = Study::where('user_id',Auth::user()->id)->get()->count();
            $b3 = Question::where('user_id',Auth::user()->id)->get()->count();
            $c = Document::where('user_id',Auth::user()->id)->get()->count();
            return view ('question.index',compact('a','b','c','b1','b2','b3'));
        }   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Question::where('user_id',Auth::user()->id)->first();
        if($data){
            //update
            try {
                $data->update([
                    'alasan'    => $request->alasan,
                    'bidang'    => $request->bidang,
                    'rencana'   => $request->rencana,
                    'prestasi'  => $request->prestasi,
                    'lamaran'   => $request->lamaran,
                    'deskripsi' => $request->deskripsi,
                ]);
                alert()->toast('Gambaran diri anda telah diubah','success');
                return redirect(route('documents.index'));
            } catch(\Exception $e) {
                return redirect()->back()->with(['error' => $e->getMessage()]);
            }      
        }else{
            //create
            try {
                Question::create([
                    'user_id'   => Auth::user()->id,
                    'alasan'    => $request->alasan,
                    'bidang'    => $request->bidang,
                    'rencana'   => $request->rencana,
                    'prestasi'  => $request->prestasi,
                    'lamaran'   => $request->lamaran,
                    'deskripsi' => $request->deskripsi,
                ]);
                alert()->toast('Gambaran diri anda telah disimpan','success');
                return redirect(route('documents.index'));
            } catch(\Exception $e) {
                return redirect()->back()->with(['error' => $e->getMessage()]);
            }      
        }  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
