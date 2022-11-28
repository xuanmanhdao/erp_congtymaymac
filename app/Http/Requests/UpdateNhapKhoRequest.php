<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'MaNhapKho' => [
                'bail', // khi gặp lỗi sẽ báo về luôn
                'required',
                'exists:nhapkho,MaNhapKho',
                'max:50',
            ],
            'ThoiGianNhap' => [
                'bail', // khi gặp lỗi sẽ báo về luôn
                'required',
                'max:100',
            ],
            'GhiChu' => [
                'bail',
                'required',
            ],
            'MaNhanVien' => [
                'bail',
                'required',
                'exists:nhanvien,MaNhanVien',

            ],
            'MaDonViPhanPhoi' => [
                'bail',
                'required',
                'exists:donviphanphoi,MaDonViPhanPhoi',
            ],
        ];
    }
    public function messages(): array
    {
        return [
            'unique' => ':attribute đã tồn tại',
            'required' => ':attribute bắt buộc phải nhập',
            'string' => ':attribute phải là kiểu chữ',
            'exists' => ':attribute không tồn tại trong kho dữ liệu',
            'MaNhapKho.max' => ':attribute tối đa 20 ký tự',
            'ThoiGianNhap.max' => ':attribute tối đa 50 ký tự',
        ];
    }

    public function attributes(): array
    {
        return [
            'MaNhapKho' => 'Mã nhập sản phẩm',
            'ThoiGianNhap' => 'Thời gian nhập sản phẩm',
            'GhiChu' => 'Ghi chú',
            'MaNhanVien' => 'Mã nhân viên',
            'MaDonViPhanPhoi' => 'Mã xưởng',
        ];
    }
}
