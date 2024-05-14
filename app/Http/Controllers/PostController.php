<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
      public function index($id){
        $posts = Post::where('user_id',$id)->get();

        return response()->json([
           'data'=> $posts
        ]);
      }

      public function store(Request $request){
        $id = auth()->user();
           Post::create([
             'title'=>$request->title,
             'description'=>$request->description,
             'user_id'=>$id->id,
           ]);

           return response()->json([
              'status'=>$id->id
           ]);
      }
}
