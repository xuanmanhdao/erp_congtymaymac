<?php

namespace App\Http\Requests\DauVao;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDauVaoRequest extends FormRequest
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
            "MaDauVao" => ['bail', 'required','string', Rule::unique('dauvao')->ignore($this->dauvao)],
            "TenSPDauVao" => ['required'],
            "Loai" => ['required'],
            "HienTrang" => ['string','nullable'],
            "MauSac" => ['string','nullable'],
            "NgayNhan" => ['date'],
            "GhiChu" => ['string','nullable'],
        ];
    }
    public function messages() : array
    {
        return [
        'unique' => 'Mã kế hoạch bị trùng',
        'required' => 'Trường này không được trống',
        'string' => 'A message is String',
        ];
    }
}
