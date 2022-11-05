<?php

namespace App\Http\Requests\Xuong;

use Illuminate\Foundation\Http\FormRequest;

class StoreXuongRequest extends FormRequest
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
            "MaXuong" => ['bail', 'required','string', 'unique:xuong,MaXuong'],
            "DiaChi" => ['required'],
            "TenXuong" => ['required'],
            "MoTaXuong" => ['required','nullable'],
            
        ];
    }
    public function messages() : array
    {
        return [
        'unique' => 'Mã xưởng bị trùng',
        'required' => 'Trường này không được trống',
        'string' => 'A message is String',
        ];
    }
}
