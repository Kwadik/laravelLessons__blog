<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;

class ShowController extends BaseController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function __invoke(Post $post)
    {
        return view('admin.post.show', compact('post'));
    }
}
