<?php

namespace App\Http\Requests\VatTu;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateVatTuRequest extends FormRequest
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
            "MaVatTu" => ['bail', 'required','string', Rule::unique('vattu')->ignore($this->vattu)],
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
        'unique' => 'Mã xưởng bị trùng',
        'required' => 'Trường này không được trống',
        'string' => 'A message is String',
        'numeric' => 'Ký tự phải là số',
        ];
    }
}
