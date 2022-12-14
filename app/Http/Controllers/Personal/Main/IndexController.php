<?php

namespace App\Http\Controllers\Personal\Main;

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
        $data = [
            'likedCount' => auth()->user()->likedPosts->count(),
            'commentsCount' => auth()->user()->comments->count(),
        ];

        return view('personal.main.index', compact('data'));
    }
}
