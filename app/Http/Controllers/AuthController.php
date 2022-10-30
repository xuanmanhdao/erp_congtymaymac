<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Throwable;

class AuthController extends Controller
{
    //
    public function dangNhap()
    {
        return view('QuanLyKho.auth.login');
    }

    public function duyetDangNhap(AuthRequest $request)
    {
        try {
            // dd($request);
            $taiKhoan = TaiKhoan::query()
                ->where('MaNhanVien', '=', $request->post('MaNhanVien'))
                ->where('MatKhau', '=', $request->post('MatKhau'))
                ->first();
            // dd($taiKhoan);  
            if ($taiKhoan === null) {
                return redirect()->route('dangnhap')->with('error', 'Đăng nhập thất bại! Kiểm tra lại tài khoản hoặc mật khẩu!');
            } else {
                // dd($taiKhoan);
                // put sẽ ghi đè lên nếu nó tồn tại rồi
                session()->put('MaGiangVien', $taiKhoan->MaNhanVien);
                session()->put('Quyen', $taiKhoan->Quyen);
                if (session()->get('Quyen') === 0) {
                    return redirect()->route('sanpham.index');
                } else if (session()->get('Quyen') === 1 || session()->get('Quyen') === 2) {
                    return redirect()->route('dangnhap');
                } else {
                    return redirect()->route('dangnhap');
                }
            }
        } catch (Throwable $e) {
            return redirect()->route('dangnhap')->with('error', 'Đăng nhập thất bại! Kiểm tra lại tài khoản hoặc mật khẩu!');
        }
    }
}
