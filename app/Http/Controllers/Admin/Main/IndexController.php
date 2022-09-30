<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
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
            'usersCount' => User::all()->count(),
            'tagsCount' => Tag::all()->count(),
            'categoriesCount' => Category::all()->count(),
            'postsCount' => Post::all()->count(),
        ];

        return view('admin.main.index', compact('data'));
    }
}
