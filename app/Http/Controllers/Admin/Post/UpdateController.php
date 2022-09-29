<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UpdateController extends BaseController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|string
     */
    public function __invoke(UpdateRequest $request, Post $post)
    {

        $data = $request->validated();
        $post = $this->service->update($post, $data);

        return redirect()->route('admin.post.show', compact('post'));
    }
}
