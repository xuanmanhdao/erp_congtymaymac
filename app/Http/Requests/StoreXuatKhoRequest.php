<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreXuatKhoRequest extends FormRequest
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
            'MaXuatKho' => [
                'bail', // khi gặp lỗi sẽ báo về luôn
                'required',
                'unique:xuatkho',
                'max:50',
            ],
            'ThoiGianXuat' => [
                'bail', // khi gặp lỗi sẽ báo về luôn
                'required',
                'max:100',
            ],
            // 'TongGia' => [
            //     'bail',
            //     'required',
            // ],
            'GhiChu' => [
                'bail',
                'required',
            ],
            'MaNhanVien' => [
                'bail',
                'required',
            ],
            'MaXuong' => [
                'bail',
                'required',
            ],
        ];
    }
    public function messages(): array
    {
        return [
            'unique' => ':attribute đã tồn tại',
            'required' => ':attribute bắt buộc phải nhập',
            'string' => ':attribute phải là kiểu chữ',

            'MaXuatKho.max' => ':attribute tối đa 20 ký tự',

            'ThoiGianXuat.max' => ':attribute tối đa 50 ký tự',
        ];
    }

    public function attributes(): array
    {
        return [
            'MaXuatKho' => 'Mã nhập sản phẩm',
            'ThoiGianXuat' => 'Thời gian nhập sản phẩm',
            // 'TongGia' => 'Mã màu',
            'GhiChu' => 'Ghi chú',
            'MaNhanVien' => 'Mã nhân viên',
            'MaXuong' => 'Mã xưởng',
        ];
    }
}
