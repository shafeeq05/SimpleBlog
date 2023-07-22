<?php

namespace App\Http\Controllers;

use App\Models\Tags;
use App\Models\Categories;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class TandC extends Controller
{
    public static function getTag($id=null){

        $tag = Tags::find($id);
        if($id){

            $data = ["tag"=>$tag,'entry'=>"Edit"];
        }else{
            $data = ["tag"=>$tag,'entry'=>"Add"];
        }
        // dd($data["tag"]);
        return view("Tag.tag")->with('data',$data);

    }
    public static function getCat($id=null){
        $category = Categories::find($id);
        if($id){
        $data = ['category'=>$category,'entry'=>'Edit'];
        }else{
            $data = ['category'=>$category,'entry'=>'Add'];
        }

        return view("Categories.cate")->with('data',$data);

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
            // return view ("Tag.alltags")->with('data',$tag);
            return redirect()->back()->with('alert', 'data added');

            }
            else{dd($articles);
            }

        return redirect()->route("home");

    }
    public static function postCat(Request $request,$id=null){
        $category = $request->all();
        // dd($tag);
        $validator = Validator::make($category, [
            'name' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $articles = Categories::updateOrCreate(["id"=>$id],$category);
            if($articles){
            return redirect()->back()->with('alert', 'data added');
            }
            else{dd($articles);
            }


        return view("Tag.cate");
    }

     public function allTags(){
        $alltags = Tags::get();

        return view("Tag.alltags")->with('data',$alltags);
     }
     public function allCategory(){
        $category = Categories::get();

        return view("Categories.allcategory")->with('data',$category);
     }

     public static function deleteTag($id){

        if($id){

        $tag = Tags::find($id);
        $tag->delete();
        $tag = Tags::get();
        return redirect()->back();
        // return redirect()->route("tag");

        }

    }
    public static function deleteCat($id){

        if($id){

        $categorie = Categories::find($id);
        $categorie->delete();
        $categorie = Tags::get();
        return redirect()->back();

        // return view ("Categories.cate")->with('data',$categorie);
        // return redirect()->route("tag");

        }

    }

}
