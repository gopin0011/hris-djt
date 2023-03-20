<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Doc;
use App\Models\Document;
use App\Models\Family;
use App\Models\Profile;
use App\Models\Question;
use App\Models\Study;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class FamilyController extends Controller
{
    public function index()
    {
        $suami = $istri = $ayah = $ibu = NULL;

        $data = Family::where('user_id',Auth::user()->id)->get();
        $mate = Profile::where('user_id',Auth::user()->id)->get();

        for($i=0;$i<$data->count();$i++)
        {
            if(Crypt::decryptString($data[$i]->status) == 'Ayah')
            {
                $ayah = Family::where('id',$data[$i]->id)->get();
            }     

            if(Crypt::decryptString($data[$i]->status) == 'Ibu')
            {
                $ibu = Family::where('id',$data[$i]->id)->get();
            } 

            if(Crypt::decryptString($data[$i]->status) == 'Suami')
            {
                $suami = Family::where('id',$data[$i]->id)->get();
            } 

            if(Crypt::decryptString($data[$i]->status) == 'Istri')
            {
                $istri = Family::where('id',$data[$i]->id)->get();
            } 
        }

        if(($ayah == NULL)&&($ibu == NULL)&&($suami == NULL)&&($istri == NULL)){
            $data = Family::where('user_id',Auth::user()->id)->get();
        }else if(($ayah != NULL)&&($ibu == NULL)&&($suami == NULL)&&($istri == NULL)){
            $data = Family::where([['user_id',Auth::user()->id],['id','!=',$ayah[0]->id]])->get();
        }else if(($ayah != NULL)&&($ibu != NULL)&&($suami == NULL)&&($istri == NULL)){
            $data = Family::where([['user_id',Auth::user()->id],['id','!=',$ayah[0]->id],['id','!=',$ibu[0]->id]])->get();
        }else if(($ayah != NULL)&&($ibu != NULL)&&($suami != NULL)&&($istri == NULL)){
            $data = Family::where([['user_id',Auth::user()->id],['id','!=',$ayah[0]->id],['id','!=',$ibu[0]->id],['id','!=',$suami[0]->id]])->get();
        }else if(($ayah != NULL)&&($ibu != NULL)&&($suami == NULL)&&($istri != NULL)){
            $data = Family::where([['user_id',Auth::user()->id],['id','!=',$ayah[0]->id],['id','!=',$ibu[0]->id],['id','!=',$istri[0]->id]])->get();
        }
        
        $a = Application::where('user_id',Auth::user()->id)->get()->count();
        $b = Profile::where('user_id',Auth::user()->id)->get()->count();
        $b1 = Family::where('user_id',Auth::user()->id)->get()->count();
        $b2 = Study::where('user_id',Auth::user()->id)->get()->count();
        $b3 = Question::where('user_id',Auth::user()->id)->get()->count();
        $c = Document::where('user_id',Auth::user()->id)->get()->count();
        return view('family.index',compact('ayah','ibu','suami','istri','mate','data','a','b','c','b1','b2','b3'));
    }

    public function updatedad(Request $request)
    {
        if(Auth::user()->admin == 0)
        {
            $data = Family::where('user_id',Auth::user()->id)->get();
        }else{
            $data = Family::where('user_id',$request->usid)->get();
        }
        
        $count = 0;
        for($i=0;$i<$data->count();$i++)
        {
            if(Crypt::decryptString($data[$i]->status) == 'Ayah')
            {
                $ayah = Family::where('id',$data[$i]->id)->get();
                $count = $ayah->count();
            }     
        }

        if($count != 0)
        {
            $family = Family::find($ayah[0]->id);
            try {
                $family->update([
                    'nama'          => Crypt::encryptString($request->nama),
                    'ttl'           => Crypt::encryptString($request->ttl),
                    'pendidikan'    => Crypt::encryptString($request->pendidikan),
                    'pekerjaan'     => Crypt::encryptString($request->pekerjaan)
                ]);
                alert()->toast('Data telah diubah','success');
                return redirect()->back();
            } catch (\Exception $e) {
                return redirect()->back()->with(['error' => $e->getMessage()]);
            }
        }else{
            try {
                if(Auth::user()->admin == 0)
                {
                    Family::create([
                        'user_id'       => Auth::user()->id,
                        'nama'          => Crypt::encryptString($request->nama),
                        'status'        => Crypt::encryptString('Ayah'),
                        'gender'        => Crypt::encryptString('Pria'),
                        'ttl'           => Crypt::encryptString($request->ttl),
                        'pendidikan'    => Crypt::encryptString($request->pendidikan),
                        'pekerjaan'     => Crypt::encryptString($request->pekerjaan)
                    ]);
                }else{
                    Family::create([
                        'user_id'       => $request->usid,
                        'nama'          => Crypt::encryptString($request->nama),
                        'status'        => Crypt::encryptString('Ayah'),
                        'gender'        => Crypt::encryptString('Pria'),
                        'ttl'           => Crypt::encryptString($request->ttl),
                        'pendidikan'    => Crypt::encryptString($request->pendidikan),
                        'pekerjaan'     => Crypt::encryptString($request->pekerjaan)
                    ]);
                }
               
                alert()->toast('Data keluarga telah berhasil ditambahkan','success');
                return redirect()->back();
            } catch (\Exception $e) {
                return redirect()->back()->with(['error' => $e->getMessage()]);
            }
        }   
    }

    public function updatemom(Request $request)
    {
        if(Auth::user()->admin == 0)
        {
            $data = Family::where('user_id',Auth::user()->id)->get();
        }else{
            $data = Family::where('user_id',$request->usid)->get();
        }
        $count = 0;
        for($i=0;$i<$data->count();$i++)
        {
            if(Crypt::decryptString($data[$i]->status) == 'Ibu')
            {
                $ibu = Family::where('id',$data[$i]->id)->get();
                $count = $ibu->count();
            }     
        }

        if($count != 0)
        {
            $family = Family::find($ibu[0]->id);
            try {
                $family->update([
                    'nama'          => Crypt::encryptString($request->nama),
                    'ttl'           => Crypt::encryptString($request->ttl),
                    'pendidikan'    => Crypt::encryptString($request->pendidikan),
                    'pekerjaan'     => Crypt::encryptString($request->pekerjaan)
                ]);
                alert()->toast('Data telah diubah','success');
                return redirect()->back();
            } catch (\Exception $e) {
                return redirect()->back()->with(['error' => $e->getMessage()]);
            }
        }else{
            try {
                if(Auth::user()->admin == 0)
                {
                    Family::create([
                        'user_id'       => Auth::user()->id,
                        'nama'          => Crypt::encryptString($request->nama),
                        'status'        => Crypt::encryptString('Ibu'),
                        'gender'        => Crypt::encryptString('Wanita'),
                        'ttl'           => Crypt::encryptString($request->ttl),
                        'pendidikan'    => Crypt::encryptString($request->pendidikan),
                        'pekerjaan'     => Crypt::encryptString($request->pekerjaan)
                    ]);
                }else{
                    Family::create([
                        'user_id'       => $request->usid,
                        'nama'          => Crypt::encryptString($request->nama),
                        'status'        => Crypt::encryptString('Ibu'),
                        'gender'        => Crypt::encryptString('Wanita'),
                        'ttl'           => Crypt::encryptString($request->ttl),
                        'pendidikan'    => Crypt::encryptString($request->pendidikan),
                        'pekerjaan'     => Crypt::encryptString($request->pekerjaan)
                    ]);
                }

                alert()->toast('Data keluarga telah berhasil ditambahkan','success');
                return redirect()->back();
            } catch (\Exception $e) {
                return redirect()->back()->with(['error' => $e->getMessage()]);
            }
        }   
    }

    public function updatemate(Request $request)
    {
        if(Auth::user()->admin == 0)
        {
            $mate = Profile::where('user_id',Auth::user()->id)->get();
        }else{
            $mate = Profile::where('user_id',$request->usid)->get();
        }
        
        if(Crypt::decryptString($mate[0]->gender) == 'Pria'){
            if(Auth::user()->admin == 0)
            {
                $data = Family::where('user_id',Auth::user()->id)->get();
            }else{
                $data = Family::where('user_id',$request->usid)->get();
            }
            $count = 0;
            for($i=0;$i<$data->count();$i++){
                if(Crypt::decryptString($data[$i]->status) == 'Istri')
                {
                    $istri = Family::where('id',$data[$i]->id)->get();
                    $count = $istri->count();
                }     
            }
    
            if($count != 0){
                $family = Family::find($istri[0]->id);
                try {
                    $family->update([
                        'nama'          => Crypt::encryptString($request->nama),
                        'ttl'           => Crypt::encryptString($request->ttl),
                        'pendidikan'    => Crypt::encryptString($request->pendidikan),
                        'pekerjaan'     => Crypt::encryptString($request->pekerjaan)
                    ]);
                    alert()->toast('Data telah diubah','success');
                    return redirect()->back();
                } catch (\Exception $e) {
                    return redirect()->back()->with(['error' => $e->getMessage()]);
                }
            }else{
                try {
                    if(Auth::user()->admin == 0)
                    {
                        Family::create([
                            'user_id'       => Auth::user()->id,
                            'nama'          => Crypt::encryptString($request->nama),
                            'status'        => Crypt::encryptString('Istri'),
                            'gender'        => Crypt::encryptString('Wanita'),
                            'ttl'           => Crypt::encryptString($request->ttl),
                            'pendidikan'    => Crypt::encryptString($request->pendidikan),
                            'pekerjaan'     => Crypt::encryptString($request->pekerjaan)
                        ]);
                    }else{
                        Family::create([
                            'user_id'       => $request->usid,
                            'nama'          => Crypt::encryptString($request->nama),
                            'status'        => Crypt::encryptString('Istri'),
                            'gender'        => Crypt::encryptString('Wanita'),
                            'ttl'           => Crypt::encryptString($request->ttl),
                            'pendidikan'    => Crypt::encryptString($request->pendidikan),
                            'pekerjaan'     => Crypt::encryptString($request->pekerjaan)
                        ]);
                    }
                    alert()->toast('Data keluarga telah berhasil ditambahkan','success');
                    return redirect()->back();
                } catch (\Exception $e) {
                    return redirect()->back()->with(['error' => $e->getMessage()]);
                }
            }   
        }else{
            if(Auth::user()->admin == 0)
            {
                $data = Family::where('user_id',Auth::user()->id)->get();
            }else{
                $data = Family::where('user_id',$request->usid)->get();
            }
            $count = 0;
            for($i=0;$i<$data->count();$i++){
                if(Crypt::decryptString($data[$i]->status) == 'Suami')
                {
                    $suami = Family::where('id',$data[$i]->id)->get();
                    $count = $suami->count();
                }     
            }
    
            if($count != 0){
                $family = Family::find($suami[0]->id);
                try {
                    $family->update([
                        'nama'          => Crypt::encryptString($request->nama),
                        'ttl'           => Crypt::encryptString($request->ttl),
                        'pendidikan'    => Crypt::encryptString($request->pendidikan),
                        'pekerjaan'     => Crypt::encryptString($request->pekerjaan)
                    ]);
                    alert()->toast('Data telah diubah','success');
                    return redirect()->back();
                } catch (\Exception $e) {
                    return redirect()->back()->with(['error' => $e->getMessage()]);
                }
            }else{
                try {
                    if(Auth::user()->admin == 0)
                    {
                        Family::create([
                            'user_id'       => Auth::user()->id,
                            'nama'          => Crypt::encryptString($request->nama),
                            'status'        => Crypt::encryptString('Suami'),
                            'gender'        => Crypt::encryptString('Pria'),
                            'ttl'           => Crypt::encryptString($request->ttl),
                            'pendidikan'    => Crypt::encryptString($request->pendidikan),
                            'pekerjaan'     => Crypt::encryptString($request->pekerjaan)
                        ]);
                    }else{
                        Family::create([
                            'user_id'       => $request->usid,
                            'nama'          => Crypt::encryptString($request->nama),
                            'status'        => Crypt::encryptString('Suami'),
                            'gender'        => Crypt::encryptString('Pria'),
                            'ttl'           => Crypt::encryptString($request->ttl),
                            'pendidikan'    => Crypt::encryptString($request->pendidikan),
                            'pekerjaan'     => Crypt::encryptString($request->pekerjaan)
                        ]);
                    }

                    alert()->toast('Data keluarga telah berhasil ditambahkan','success');
                    return redirect()->back();
                } catch (\Exception $e) {
                    return redirect()->back()->with(['error' => $e->getMessage()]);
                }
            }   
        }   
    }

    public function update(Request $request)
    {
        if(Auth::user()->admin == 0)
        {
            try {
                Family::create([
                    'user_id'       => Auth::user()->id,
                    'nama'          => Crypt::encryptString($request->nama),
                    'status'        => Crypt::encryptString($request->status),
                    'gender'        => Crypt::encryptString($request->gender),
                    'ttl'           => Crypt::encryptString($request->ttl),
                    'pendidikan'    => Crypt::encryptString($request->pendidikan),
                    'pekerjaan'     => Crypt::encryptString($request->pekerjaan)
                ]);
                alert()->toast('Data keluarga telah berhasil ditambahkan','success');
                return redirect()->back();
            } catch (\Exception $e) {
                return redirect()->back()->with(['error' => $e->getMessage()]);
            }
        }else{
            try {
                Family::create([
                    'user_id'       => $request->usid,
                    'nama'          => Crypt::encryptString($request->nama),
                    'status'        => Crypt::encryptString($request->status),
                    'gender'        => Crypt::encryptString($request->gender),
                    'ttl'           => Crypt::encryptString($request->ttl),
                    'pendidikan'    => Crypt::encryptString($request->pendidikan),
                    'pekerjaan'     => Crypt::encryptString($request->pekerjaan)
                ]);
                alert()->toast('Data keluarga telah berhasil ditambahkan','success');
                return redirect()->back();
            } catch (\Exception $e) {
                return redirect()->back()->with(['error' => $e->getMessage()]);
            }
        }


    }

    public function delete($id)
    {
        $data = Family::find($id);
        try
        {
            if($data->user_id == Auth::user()->id)
            {
                $data->delete();
                alert()->toast('Data keluarga telah dihapus','warning');
                return redirect()->back();
            }elseif(Auth::user()->admin == 2 || Auth::user()->admin == 3){
                $data->delete();
                alert()->toast('Data keluarga telah dihapus','warning');
                return redirect()->back();
            }
            else{
                alert()->toast('Data tidak ditemukan','error');
                return redirect()->back();
            }
        }
        catch (\Exception $e)
        {
            alert()->toast('Data tidak ditemukan','error');
            return redirect()->back();
        }
    }
}
