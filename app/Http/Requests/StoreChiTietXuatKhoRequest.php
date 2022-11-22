<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreChiTietXuatKhoRequest extends FormRequest
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
            ],
            'MaSanPham' => [
                'bail', // khi gặp lỗi sẽ báo về luôn
                'required',
                'max:50',
            ],
            'SoLuong' => [
                'bail',
                'required',
                // 'number'
            ],
            'DonViTinh' => [
                'bail',
                'required',
            ],
            'Gia' => [
                'bail',
                'required',
                // 'number',
            ],
        ];
    }
    public function messages(): array
    {
        return [
            'unique' => ':attribute đã tồn tại',
            'required' => ':attribute bắt buộc phải nhập',
            // 'number' => ':attribute phải là kiểu số',
        ];
    }

    public function attributes(): array
    {
        return [
            'MaXuatKho' => 'Mã xuất kho',
            'MaSanPham' => 'Mã sản phẩm',
            'SoLuong' => 'Số lượng',
            'DonViTinh' => 'Đơn vị tính',
            'Gia' => 'Giá',
        ];
    }
}
