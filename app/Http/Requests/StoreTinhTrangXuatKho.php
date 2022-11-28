<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTinhTrangXuatKho extends FormRequest
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
           "MaXuatKho" => ['required'],   //MÃ TĂNG DẦN 'unique:xuatkho:MaXuatKho
            "TinhTrang" => ['required','string'],
            
           
        ];
    }
    public function messages() : array
    {
        return [
        'unique' => 'Mã xuất kho bị trùng.',
        'required' => 'Trường này không được trống.',
        'string' => 'A message is String',
        // 'alpha_num'=>'Dữ liệu nhập phải là số.',
        // 'email' => 'Dữ liệu nhập phải là địa chỉ email.',
       
        ];
    }
}
