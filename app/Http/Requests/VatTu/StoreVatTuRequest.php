<?php

namespace App\Http\Requests\VatTu;

use Illuminate\Foundation\Http\FormRequest;

class StoreVatTuRequest extends FormRequest
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
            "MaVatTu" => ['bail', 'required','string', 'unique:vattu,MaVatTu'],
            "TenVatTu" => ['required'],
            "SoLuong" => ['required','numeric'],
            "GiaVatTu" => ['required','numeric'],
            "MoTaVatTu"=> ['required'],
            "MaXuong" =>['required'],
        ];
    }
    public function messages() : array
    {
        return [
        'unique' => 'Mã vật tư bị trùng',
        'required' => 'Trường này không được trống',
        'string' => 'A message is String',
        'numeric' => 'Ký tự phải là số',
        ];
    }
}
