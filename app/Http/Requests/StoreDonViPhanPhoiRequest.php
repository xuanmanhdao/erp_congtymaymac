<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDonViPhanPhoiRequest extends FormRequest
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
            'MaDonViPhanPhoi' => [
                'bail',
                'required',
                'string',
                'unique:donviphanphoi,MaDonViPhanPhoi',
                'max:50',
            ],
            'TenDonViPhanPhoi' => [
                'bail',
                'required',
                'string',
                'unique:donviphanphoi,TenDonViPhanPhoi',
                'max:100',
            ],
            'DiaChi' => [
                'bail',
                'required',
                'string',
                'max:200',
            ],
            'SoDienThoai' => [
                'bail',
                'required',
                'string',
                'max:10',
            ],
            'Fax' => [
                'bail',
                'required',
                'string',
                'max:50',
            ],
            'Email' => [
                'bail',
                'required',
                'email:rfc,dns',
                'max:100'
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'unique' => ':attribute đã tồn tại',
            'required' => ':attribute bắt buộc phải nhập',
            'string' => ':attribute phải là kiểu chữ',
            'email' =>':attribute phải là định dạng email',

            'MaDonViPhanPhoi.max' => ':attribute tối đa 50 ký tự',
            'TenDonViPhanPhoi.max' => ':attribute tối đa 100 ký tự',
            'DiaChi.max' => ':attribute tối đa 200 ký tự',
            'SoDienThoai.max' => ':attribute tối đa 10 ký tự',
            'Fax.max' => ':attribute tối đa 50 ký tự',
            'Email.max' => ':attribute tối đa 100 ký tự',
        ];
    }

    public function attributes(): array
    {
        return [
            'MaDonViPhanPhoi' => 'Mã đơn vị phân phối',
            'TenDonViPhanPhoi' => 'Tên đơn vị phân phối',
            'DiaChi' => 'Địa chỉ',
            'SoDienThoai' => 'Số điện thoại',
            'Fax' => 'Fax',
            'Email' => 'Email',
        ];
    }
}
