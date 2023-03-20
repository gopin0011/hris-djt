<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Career;
use App\Models\Competency;
use App\Models\Document;
use App\Models\Family;
use App\Models\Language as ModelsLanguage;
use App\Models\Profile;
use App\Models\Question;
use App\Models\Reference;
use App\Models\Social;
use App\Models\Study;
use App\Models\Training;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use File;

class EditController extends Controller
{
    public function index()
    {
        $user = User::where('admin','0')->get();
        return view('edit.index', compact('user'));
    }

    public function family($id)
    {
        $suami = $istri = $ayah = $ibu = NULL;

        $data = Family::where('user_id',$id)->get();
        $mate = Profile::where('user_id',$id)->get();

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
            $data = Family::where('user_id',$id)->get();
        }else if(($ayah != NULL)&&($ibu == NULL)&&($suami == NULL)&&($istri == NULL)){
            $data = Family::where([['user_id',$id],['id','!=',$ayah[0]->id]])->get();
        }else if(($ayah != NULL)&&($ibu != NULL)&&($suami == NULL)&&($istri == NULL)){
            $data = Family::where([['user_id',$id],['id','!=',$ayah[0]->id],['id','!=',$ibu[0]->id]])->get();
        }else if(($ayah != NULL)&&($ibu != NULL)&&($suami != NULL)&&($istri == NULL)){
            $data = Family::where([['user_id',$id],['id','!=',$ayah[0]->id],['id','!=',$ibu[0]->id],['id','!=',$suami[0]->id]])->get();
        }else if(($ayah != NULL)&&($ibu != NULL)&&($suami == NULL)&&($istri != NULL)){
            $data = Family::where([['user_id',$id],['id','!=',$ayah[0]->id],['id','!=',$ibu[0]->id],['id','!=',$istri[0]->id]])->get();
        }

        return view('edit.family',compact('ayah','ibu','suami','istri','mate','data','id'));
    }

    public function study($id)
    {
        $data = Study::where('user_id',$id)->orderBy('id')->get();
        return view('edit.study',compact('data','id'));
    }

    public function reference($id)
    {
        $data = Reference::where('user_id',$id)->get();
        return view('edit.reference',compact('data','id'));
    }

    public function career($id)
    {
        $data = Career::where('user_id',$id)->get();
        return view('edit.career',compact('data','id'));
    }

    public function careercreate($id)
    {
        return view('edit.careercreate',compact('id'));
    }

    public function careeredit($id)
    {
        $data = Career::all()->find($id);
        return view('edit.careeredit',compact('data','id'));
    }

    public function account($id)
    {
        $data = User::all()->find($id);
        return view('edit.account',compact('data','id'));
    }

    public function update($id, Request $request)
    {
        $data = User::find($id);
        try {
            $data->update([
                'name'      => $request->name,
                'email'     => $request->email
            ]);
            alert()->toast('Data telah diubah','success');
            return redirect(route('editor.index'));
        } catch(\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        } 
    }

    public function delete($id)
    {
        $data = User::find($id);
        $app = Application::where('user_id',$id)->get();
        $car = Career::where('user_id',$id)->get();
        $com = Competency::where('user_id',$id)->get();
        $doc = Document::where('user_id',$id)->get();
        $fam = Family::where('user_id',$id)->get();
        $lan = ModelsLanguage::where('user_id',$id)->get();
        $pro = Profile::where('user_id',$id)->get();
        $que = Question::where('user_id',$id)->get();
        $ref = Reference::where('user_id',$id)->get();
        $soc = Social::where('user_id',$id)->get();
        $stu = Study::where('user_id',$id)->get();
        $tra = Training::where('user_id',$id)->get();

       try
        {
            $data->delete();
            /*$app->delete();
            $car->delete();
            $com->delete();
            $doc->delete();
            $fam->delete();
            $lan->delete();
            $pro->delete();
            $que->delete();
            $ref->delete();
            $soc->delete();
            $stu->delete();
            $tra->delete();
            File::delete($doc->file);*/
            alert()->toast('Data pelamar telah dihapus','warning');
            return redirect()->back();  
        }
        catch (\Exception $e)
        {
            alert()->toast('Data pelamar telah dihapus','warning');
            return redirect()->back();
        }
    }
}
