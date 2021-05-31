<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Article;
use Carbon\Carbon;
use Validator,Str,Config,Image;

class FishingReportController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('isFisherman');
    }

    public function index(){

        $fishing_report_cabos= Article::orderBy('id','desc')->paginate(6);
        
        return view('panel.fishing-report.index',compact('fishing_report_cabos'));

    }

    public function create(){
        
        return view('panel.fishing-report.create');
    }

    // ############  --STORE POST!!!--  ###############
    public function store(Request $request){

        $request['date']=Carbon::now()->toFormattedDateString();

        $rules=[
            'title'=> 'required',
            'img'=>'mimes:jpeg,bmp,png|max:91872749',
            'content'=>'required',
            'date'=>'required'
        ];

        $messages=[
            'title.required'=>'Las palabras clave son requeridas.',
            'img.required'=>'La imagen destacada es requerida.',
            'img.mimes'=>'El archivo que cargaste no es una imagen valida.',
            'img.max'=>'El archivo que cargaste es muy grande',
            'content.required'=>'El contenido es requerido',
            'date.required'=>'Hubo un error al registrar la fecha, porfavor intenta de nuevo.'
        ];

        $validator= Validator::make($request->all(), $rules,$messages);


        if($validator->fails()){
            return back()->withErrors($validator)->with('message','se ha producido un error.')->with('typealert','danger')->withInput();
        }else{

            $path= '/'.date('Y-m-d');
            $fileExt= trim($request->img->getClientOriginalExtension());
            $uploadPath=Config::get('filesystems.disks.uploads.root');
            $name=Str::slug(str_replace($fileExt,'',$request->img->getClientOriginalName()));
    
            $fileName= rand(1,999).'-'.$name.'.'.$fileExt;
            $file_file=$uploadPath.'/'.$path.'/'.$fileName;
            // dd($file_file);
            $request['thumbnail']=$fileName;
            $request['thumbnail_path']=date('Y-m-d');

            if($article=Article::create($request->all())){
                if($request->hasFile('img')){
                    $fl=$request->img->storeAs($path, $fileName, 'uploads');
                    $full=$request->img->storeAs($path, $fileName, 'fullimg');
                    $img= Image::make($file_file);
                    $img->fit(288,256,function($constraint){
                        $constraint->upsize();
                    });
                    $img->save();
                }
            }
        }
        return redirect('/admin')->with('message','Fishing report: '.$article->title.' se ha creado!')->with('typealert','success')->with('display','d-flex');
    }

    
    public function edit($id)
    {
        $article=Article::findOrFail($id);
        $content= $article->content;

        return view('panel.fishing-report.edit',compact('article','content'));
    }
    // ############  --UPDATE POST!!!--  ###############
    public function update(Request $request, $id){

        $article=Article::findOrFail($id);
        $request['date']=Carbon::now()->toFormattedDateString();

        $rules=[
            'title'=> 'required',
            'img'=>'mimes:jpeg,bmp,png|max:91872749',
            'content'=>'required',
            'date'=>'required'
        ];

        $messages=[
            'title.required'=>'Las palabras clave son requeridas.',
            'img.required'=>'La imagen destacada es requerida.',
            'img.mimes'=>'El archivo que cargaste no es una imagen valida.',
            'img.max'=>'El archivo que cargaste es muy grande',
            'content.required'=>'El contenido es requerido',
            'date.required'=>'Hubo un error al registrar la fecha, porfavor intenta de nuevo.'
        ];

        $validator= Validator::make($request->all(), $rules,$messages);

        if($validator->fails()){
            return back()->withErrors($validator)->with('message','se ha producido un error.')->with('typealert','danger')->withInput();
        }else{

           if(empty($request->img)){
               // No se guarda ninguna imagen (se queda la que estaba ya que ahi si es obligatorio al crear un post)
           }else{
               //Aca si guardamos porque el usuario si relleno el campo
            $path= '/'.date('Y-m-d');
            $fileExt= trim($request->img->getClientOriginalExtension());
            $uploadPath=Config::get('filesystems.disks.uploads.root');
            $name=Str::slug(str_replace($fileExt,'',$request->img->getClientOriginalName()));
    
            $fileName= rand(1,999).'-'.$name.'.'.$fileExt;
            $file_file=$uploadPath.'/'.$path.'/'.$fileName;
    
            $request['thumbnail']=$fileName;
            $request['thumbnail_path']=date('Y-m-d');

            if($article->update($request->all())){
                if($request->hasFile('img')){
                    $fl=$request->img->storeAs($path, $fileName, 'uploads');
                    $full=$request->img->storeAs($path, $fileName, 'fullimg');
                    $img= Image::make($file_file);
                    $img->fit(288,256,function($constraint){
                        $constraint->upsize();
                    });
                    $img->save();
                }
            }
           }
        }
        $updated= $article->update($request->all());
        if($updated){
            return redirect('/admin')->with('message',$article->title.' se ha editado!')->with('typealert','success')->with('display','d-flex');
        }
    }

    public function destroy($id)
    {
        $article=Article::findOrFail($id);
        $title=$article->title.' '.$article->date;
        $article->delete();
        return back()->with('message','Fishing '.$title. ' report eliminado!')->with('typealert','danger')->with('display','d-flex');
    }

}