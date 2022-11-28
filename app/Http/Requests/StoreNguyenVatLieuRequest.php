<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNguyenVatLieuRequest extends FormRequest
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
            'MaNguyenVatLieu' => [
                'bail', // khi gặp lỗi sẽ báo về luôn
                'required',
                'unique:nguyenvatlieu',
                'max:50',
            ],
            'TenNguyenVatLieu' => [
                'bail', // khi gặp lỗi sẽ báo về luôn
                'required',
                'max:100',
                'unique:nguyenvatlieu,TenNguyenVatLieu',
            ],
            'MoTaNguyenVatLieu' => [
                'bail', // khi gặp lỗi sẽ báo về luôn
                'required',
            ],
            'MaChatLieu' => [
                'bail', // khi gặp lỗi sẽ báo về luôn
                'required',
                'exists:chatlieu,MaChatLieu'
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'unique' => ':attribute đã tồn tại',
            'required' => ':attribute bắt buộc phải nhập',
            'string' => ':attribute phải là kiểu chữ',
            'exists' => ':attribute không tồn tại',
            'MaNguyenVatLieu.max' => ':attribute tối đa 50 ký tự',

            'TenNguyenVatLieu.max' => ':attribute tối đa 100 ký tự',
        ];
    }

    public function attributes(): array
    {
        return [
            'MaNguyenVatLieu' => 'Mã nguyên vật liệu',
            'TenNguyenVatLieu' => 'Tên nguyên vật liệu',
            'MoTaNguyenVatLieu' => 'Mô tả nguyên vật liệu',
            'MaChatLieu' => 'Mã kiểu nguyên vật liệu',
        ];
    }
}
