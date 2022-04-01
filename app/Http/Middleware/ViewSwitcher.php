<?php

namespace App\Http\Middleware;

use Closure;

class ViewSwitcher {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        // ゲートのisAdminの結果がtrueだったら管理者用画面、falseだったら一般用画面の文字列をセットする
        // ゲートはapp/Providers/AuthServiceProvider.phpのboot()の中に定義されている
        if (\Gate::allows('isAdmin', \Auth::user())) {
            $view = 'posts.admin_index';
        } else {
            $view = 'posts.general_index';
        }

        $request->merge(['view' => $view]);     // 「view」という名前のキーでビュー名の文字列をRequestに追加する

        return $next($request);                 // ルーティングで指定していされたコントローラのアクションが呼び出される
    }
}
