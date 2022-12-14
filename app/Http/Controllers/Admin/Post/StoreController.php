<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Requests\Admin\Post\StoreRequest;

class StoreController extends BaseController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|string
     */
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();
        $this->service->store($data);

        return redirect()->route('admin.post.index');
    }
}
