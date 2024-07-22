<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class PostLikesController extends Controller
{
    public function store(Post $post){
        $post->likes()->create([
            'user_id' => auth()->user()->id
        ]);

        return back();
    }

    public function destroy(Post $post){
        $post->likes()->where('user_id',auth()->user()->id)->delete();

        return back();
    }
}
