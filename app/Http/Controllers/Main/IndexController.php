<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $featured_posts = Post::where('is_featured', '1')->get()->take(3);
        $ramdom_posts = Post::get()->random()->paginate(8);
        //dd($ramdom_posts);
        $popular_posts = Post::withCount('likedByUsers')->orderBy('liked_by_users_count', 'DESC')->get()->take(4);
        return view('main.index', compact(
            'featured_posts',
            'popular_posts',
            'ramdom_posts'
        ));
    }
}
