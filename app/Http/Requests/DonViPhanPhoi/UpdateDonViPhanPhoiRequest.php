<?php

namespace App\Http\Requests\DonViPhanPhoi;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDonViPhanPhoiRequest extends FormRequest
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
            "MaDonViPhanPhoi" => ['bail', 'required','string', Rule::unique('donviphanphoi')->ignore($this->donviphanphoi)],
            "TenDonViPhanPhoi" => ['required'],
            "DiaChi" => ['required'],
            "SoDienThoai" => ['numeric', 'digits:10'],
            "Fax" => ['numeric'],
             "Email" => ['required','email'],
        ];
    }
    public function messages() : array
    {
        return [
        'unique' => 'Mã Đơn vị phân phối bị trùng.',
        'required' => 'Trường này không được trống.',
        'alpha_num'=>'Dữ liệu nhập phải là số.',
        'email' => 'Dữ liệu nhập phải là địa chỉ email.',
      ' numeric' => 'Ký tự phải là số',
        ];
    }
}
