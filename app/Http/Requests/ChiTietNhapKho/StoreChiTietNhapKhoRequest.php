<?php

namespace App\Http\Requests\ChiTietNhapKho;

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
           "MaNhapKho" => ['required'],   //MÃ TĂNG DẦN
            "MaNguyenVatLieu" => ['required'],
            "SoLuong" => ['required','numeric'],
            "DonViTinh" => ['required','string'],
            "ThanhTien" => ['required','numeric'],
           
        ];
    }
    public function messages() : array
    {
        return [
        'unique' => 'Mã Đơn vị phân phối bị trùng.',
        'required' => 'Trường này không được trống.',
        'string' => 'A message is String',
        // 'alpha_num'=>'Dữ liệu nhập phải là số.',
        // 'email' => 'Dữ liệu nhập phải là địa chỉ email.',
        'numeric' => 'Ký tự phải là số',
        ];
    }
}
