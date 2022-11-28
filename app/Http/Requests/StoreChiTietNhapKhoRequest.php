<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreChiTietNhapKhoRequest extends FormRequest
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
            'MaNhapKho' => [
                'bail', // khi gặp lỗi sẽ báo về luôn
                'required',
            ],
            'MaNguyenVatLieu' => [
                'bail', // khi gặp lỗi sẽ báo về luôn
                'required',
                'max:50',
                'exists:nguyenvatlieu,MaNguyenVatLieu'
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
            'MaNhapKho' => 'Mã xuất kho',
            'MaNguyenVatLieu' => 'Mã sản phẩm',
            'SoLuong' => 'Số lượng',
            'DonViTinh' => 'Đơn vị tính',
            'Gia' => 'Giá',
        ];
    }
}
