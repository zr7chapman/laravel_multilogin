<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller {
    public function __construct() {
        $this->middleware(['auth', 'view.switch']);     // PostControllerのインスタンスが生成する際に、auth（Authenticate）、view.switch（ViewSwitcher）の2つのミドルウエアが実行される
                                                        //「view.switch」という名前とViewSwitcher.phpの紐付けは、app/Http/Kernel.phpの$routeMiddlewareに定義されている
    }

    public function index(Request $request) {
        return view($request->view);
    }
}
