<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            'MaNhanVien' => [
                'bail', // khi gặp lỗi sẽ báo về luôn
                'required',
                'string'
            ],
            'MatKhau' => [
                'bail', // khi gặp lỗi sẽ báo về luôn
                'required',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute bắt buộc phải nhập',
            'numeric' => ':attribute phải là định dạng số',
            'max' => ':attribute đã quá số lượng cho phép',
            'min' => ':attribute số lượng quá ít',
            'unique' => ':attribute đã tồn tại',
            'string' =>':attribute ký tự không hợp lệ'

        ];
    }

    public function attributes(): array
    {
        return [
            'MaNhanVien' => 'Mã nhân viên',
            'MatKhau' => 'Mật khẩu',
        ];
    }
}
