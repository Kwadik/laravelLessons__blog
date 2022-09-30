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
        /*$data = [
            'likesCount' => User::all()->count(),
            'commentsCount' => Tag::all()->count(),
        ];*/

        return view('personal.main.index');
        //return view('personal.main.index', compact('data'));
    }
}
