<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response|string
     */
    public function __invoke(Request $request)
    {
        $posts = auth()->user()->likedPosts;

        return view('personal.liked.index', compact('posts'));
    }
}
