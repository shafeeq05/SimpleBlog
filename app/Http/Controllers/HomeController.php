<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Categories;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $articles = Articles::orderBy('created_at', 'desc')->get();

        return view('home')->with('data',$articles);
    }
    public function create($id=null){

        $tags = Tags::get();
        $category = Categories::get();
        $article = Articles::find($id);

        $data = ["tag"=>$tags,"cat"=>$category,"article"=>$article];



        return view("Article.create")->with('data',$data,);
    }

    public function store(Request $request,$id=null){
        try {
            $content = $request->all();

        $validator = Validator::make($content, [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'category'=>'required|string|max:255',
            'tag'=>'required|string|max:255',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'

            // More validation rules...
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // dd($request->all());

        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');

        //             $path = Storage::disk('img')->put('images/', $image);
        //             dd($path);}

            unset($content['_token']);

            // dd($content);
            $articles = Articles::updateOrCreate(["id"=>$id],$content);
            if($articles){
            return redirect()->route("home");
            }
            else{dd($articles);
            }

        } catch (\Throwable $th) {
            Log::debug($th);
        }



    }

    public function delete($id){

        if($id){

        $article = Articles::find($id);
        $article->delete();
        $msg = '<script>alert ("deleted")</script>';

        return view("home",compact('msg'));
        }
        $msg = '<script>alert ("delete faild")</script>';
        return view("home",compact('msg'));



    }
}
