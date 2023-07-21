<?php

namespace App\Http\Controllers;

use App\Models\Tags;
use App\Models\Articles;
use App\Models\Categories;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class TandC extends Controller
{
    public static function getTag($id=null){

        $tag = Tags::find($id);
        return view("Tag&control.tag")->with('data',$tag);

    }
    public static function getCat($id=null){

        return view("Tag&control.cate");
    }
    public static function postTag(Request $request, $id=null){

        $tag = $request->all();
        // dd($tag);
        $validator = Validator::make($tag, [
            'name' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $articles = Tags::updateOrCreate(["id"=>$id],$tag);
            if($articles){
                $tag = Tags::get();
            return view ("Tag&control.alltags")->with('data',$tag);
            // return redirect()->route("Tag&control.alltags");

            }
            else{dd($articles);
            }

        return redirect()->route("Tag&control.tag");

    }
    public static function postCat(Request $request,$id=null){
        $tag = $request->all();
        // dd($tag);
        $validator = Validator::make($tag, [
            'name' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $articles = Categories::updateOrCreate(["id"=>$id],$tag);
            if($articles){
            return redirect()->route("home");
            }
            else{dd($articles);
            }


        return view("Tag&control.cate");
    }

     public function allTags(){
        $alltags = Tags::get();

        return view("Tag&control.alltags")->with('data',$alltags);
     }

     public function delete($id){

        if($id){

        $tag = Tags::find($id);
        $tag->delete();
        $tag = Tags::get();
        return view ("Tag&control.alltags")->with('data',$tag);

        }




    }

}
