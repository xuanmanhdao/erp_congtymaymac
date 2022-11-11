<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateNhanVienRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
           "MaNhanVien" => ['bail','string', Rule::unique('nhanvien')->ignore($this->nhanvien)],
            "TenNhanVien" => ['required'],
            "NgaySinh" => ['required'],
            "CanCuocCongDan" => ['numeric','required'],
            "GioiTinh" => ['required'],
             "DiaChi" => ['required'],
             "Email" => ['email','required'],
             "SoDienThoai" => ['numeric','required','digits:10'],
             "MaChucVu" => ['bail','string'],
              "MaXuong" => ['bail','string'],
        ];
    }
    public function messages() : array
    {
        return [
        'unique' => 'Mã Đơn vị phân phối bị trùng.',
        'required' => 'Trường này không được trống.',
        'string' => 'A message is String',
        // 'alpha_num'=>'Dữ liệu nhập phải là số.',
        'email' => 'Dữ liệu nhập phải là địa chỉ email.',
        'numeric' => 'Ký tự phải là số',
        ];
    }
}
