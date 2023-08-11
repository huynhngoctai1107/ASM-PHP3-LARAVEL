<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LevelMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

            $user = Auth::user() ;
            if($user->level == 2){

                return $next($request);
            }else{
                return redirect()->back()->with('error-delete-user','Tài khoản chưa có quyền chỉnh sửa hoặc xóa, Vui lòng đăng nhập vào tài khoản khác !');
            }

    }
}
