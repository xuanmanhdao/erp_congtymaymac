<?php

namespace App\Http\Requests\NhapKho;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateNhapKhoRequest extends FormRequest
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
            "MaNhapKho" => ['bail','string', Rule::unique('nhapkho')->ignore($this->nhapkho)],
            "ThoiGianNhap" => ['required'],
            "TongGia" => ['required','numeric'],
            "GhiChu" => [ 'string','nullable'],
            
             "MaDonViPhanPhoi" => ['bail','string'],
        ];
    }
    public function messages() : array
    {
        return [
        'unique' => 'Mã Đơn vị phân phối bị trùng.',
        'required' => 'Trường này không được trống.',
            // 'alpha_num'=>'Dữ liệu nhập phải là số.',
            // 'email' => 'Dữ liệu nhập phải là địa chỉ email.',
            // 'numeric' => 'Ký tự phải là số',
        'string' => 'A message is String',
          ' numeric' => 'Ký tự phải là số',
        ];
    }
}
