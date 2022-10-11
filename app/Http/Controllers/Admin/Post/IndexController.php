<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class IndexController extends BaseController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $posts = array_key_exists('featured', $request->toArray()) ? Post::where('is_featured', '1')->get() : Post::all();
        return view('admin.post.index', compact('posts'));
    }
}
