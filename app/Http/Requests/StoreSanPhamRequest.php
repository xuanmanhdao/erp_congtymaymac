<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSanPhamRequest extends FormRequest
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
            'MaSanPham' => [
                'bail', // khi gặp lỗi sẽ báo về luôn
                'required',
                'unique:sanpham',
                'max:50',
            ],
            'TenSanPham' => [
                'bail', // khi gặp lỗi sẽ báo về luôn
                'required',
                'max:100',
            ],
            'MoTaSanPham' => [
                'bail', // khi gặp lỗi sẽ báo về luôn
                'required',
            ],
            'MaLoai' => [
                'bail', // khi gặp lỗi sẽ báo về luôn
                'required',
            ],
            'MaLoaiQuyTrinh' => [
                'bail', // khi gặp lỗi sẽ báo về luôn
                'required',
            ],
            'HinhAnh' => [
                'bail', // khi gặp lỗi sẽ báo về luôn
                'required',
                // 'array',
                // 'mimes:jpeg,png,jpg,gif,svg',
                // 'max:2048',

                // 'image',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'unique' => ':attribute đã tồn tại',
            'required' => ':attribute bắt buộc phải nhập',
            'string' => ':attribute phải là kiểu chữ',

            'MaSanPham.max' => ':attribute tối đa 50 ký tự',

            'TenSanPham.max' => ':attribute tối đa 100 ký tự',
        ];
    }

    public function attributes(): array
    {
        return [
            'MaSanPham' => 'Mã sản phẩm',
            'TenSanPham' => 'Tên sản phẩm',
            'MoTaSanPham' => 'Mô tả sản phẩm',
            'MaLoai' => 'Mã loại sản phẩm',
            'MaLoaiQuyTrinh' => 'Mã loại quy trình',
            'HinhAnh' => 'Hình ảnh',
        ];
    }
}
