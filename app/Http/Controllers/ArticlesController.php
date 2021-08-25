<?php

namespace App\Http\Controllers;
use App\Models\Articles;
use App\images;


use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ArticlesController extends Controller
{
    public function index()
    {
     $articles=Articles::all();
      return view('articles.add',compact('articles'));
    }

    public function store(Request $request)
    {
        $this->validation();
        if (! Auth::user())
        {
            return redirect(route('login'));
        }
        else {
            $articles = new Articles();
            $articles->title = request('title');
            $articles->body = request('body');
            $articles->excerpt = request('excerpt');

            if ($request->hasFile('file')) {
                $file = $request->file->getClientOriginalExtension();
                $filename = time() . '.' . $file;
                $path = 'images/articles/';
                $request->file->move($path, $filename);
                $articles->image = $filename;
                //$request->file('file')->store('articles', 'public');
                //$file=$request->file->hashName();
            }

            $articles->save();
            return redirect(route('write'));
        }
    }
    public function edit($id)
    {
        if (! Auth::user())
        {
           return redirect(route('login'));
        }
        else
        {

            $articles=Articles::find($id);

    return view('articles.edit',['articles'=>$articles]);
        }
    }

    public function update($id)
    {
        $this->validation();

       $articles=Articles::find($id);
        $dest ='images/articles/'.$articles->image;
        if(File::exists($dest))
        {
            File::delete($dest);
        }
        $articles->title=request('title');
        $articles->body=request('body');
        $articles->excerpt=request('excerpt');

        if(Request()->file('file')!=null)
        {
            $image= Request()->file('file');
            $file=$image->getClientOriginalExtension();
            $filename=time(). '.'.$file;
            $path='images\articles';
            $resize=Image::make($image)->resize(300,200)->save(public_path($path.'/'.$filename));



            //Request()->file->move($path,$filename);
            $articles->image=$filename;
            //$request->file('file')->store('articles', 'public');
            //$file=$request->file->hashName();
        }
        $articles->save();
        return redirect(route('write'));

    }
    public function write()
    {

        $articles=Articles::all();
        //$articles=Articles::select('body_'.LaravelLocalization::getCurrentLocale() .'as body','title_'.LaravelLocalization::getCurrentLocale().'as title')->get();
        return view('home',compact('articles'));
    }
    public function destory($id)
    {
        if (! Auth::user())
        {
            return redirect(route('login'));
        }
        else
        {
        $article=Articles::find($id);
        $dest ='images/articles/'.$article->image;
        if(File::exists($dest))
        {
            File::delete($dest);
        }
        $article->delete();
        return view('articles.delete');
        }
    }
    protected function validation()
    {
       return request()->validate([
            'title'=>'required',
            'excerpt'=>'required',
            'image'=>'mimes:jpeg,bmp,png',
            'body'=>'required'
        ]);

    }
}
