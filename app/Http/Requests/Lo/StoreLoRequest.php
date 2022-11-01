<?php

namespace App\Http\Requests\Lo;

use Illuminate\Foundation\Http\FormRequest;

class StoreLoRequest extends FormRequest
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
           "MaLo" => ['bail', 'required','string', 'unique:lo,MaLo'],
            "TenLo" => ['required'],
            "SoLuong" => ['required','numeric'],
            "MaXuong" => ['required'],                     //,'bail','string','unique:lo,MaXuong'
            "TinhTrang" => ['string','nullable'],
        ];
    }
    public function messages() : array
    {
        return [
        'unique' => 'Mã lô bị trùng',
        'required' => 'Trường này không được trống',
        'string' => 'A message is String',
        'numeric'=> 'Nhập sai dữ liệu vui lòng nhập lại',
        ];
    }
}
