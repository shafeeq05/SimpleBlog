<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class TandC extends Controller
{
    public static function getTag($id=null){


        return view("Tag&control.tag");

    }
    public static function getCat($id=null){

        return view("Tag&control.cate");
    }
    public static function postTag(Request $request, $id=null){

        $tag = $request->all();
        dd($tag);
        $validator = Validator::make($tag, [
            'name' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        unset($tag['_tocken']);
        $articles = Articles::updateOrCreate(["id"=>$id],$tag);
            if($articles){
            return redirect()->route("home");
            }
            else{dd($articles);
            }

        return redirect("Tag&control.tag");

    }
    public static function postCat(Request $request,$id=null){
        $tag = $request->all();
        dd($tag);
        $validator = Validator::make($tag, [
            'name' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        unset($tag['_tocken']);
        $articles = Articles::updateOrCreate(["id"=>$id],$tag);
            if($articles){
            return redirect()->route("home");
            }
            else{dd($articles);
            }


        return view("Tag&control.cate");
    }
}
