<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;

class StoreController extends Controller
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
        $this->firstOrCreate($data);

        return redirect()->route('admin.user.index');
    }
}
