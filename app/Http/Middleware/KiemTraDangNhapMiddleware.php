<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;

class KiemTraDangNhapMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (
            session()->get('Quyen') === 0 ||
            session()->get('Quyen') === 1 ||
            session()->get('Quyen') === 1 ||
            session()->get('Quyen') === 5
        ) {
            return $next($request);
        } else if (session()->get('Quyen') === 10) {
            return redirect()->route('dangnhap')->with('error', 'Tài khoản của bạn đã bị khóa!');
        } else {
            return redirect()->route('dangnhap')->with('error', 'Tài khoản có quyền không hợp lệ! Vui lòng đăng nhập lại!');
            // throw new Exception("Bạn không đủ quyền để thực hiện thao tác này");
        }
    }
}
