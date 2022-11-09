<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateLoaiQuyTrinhRequest extends FormRequest
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
            "MaLoaiQuyTrinh" => ['bail', 'required','string', 
            Rule::unique('loaiquytrinh')->where(function ($query) {
                return $query->where('MaLoaiQuyTrinh', 1);
            })],
            'TenQuyTrinh' =>['required','string'],
            'MoTaQuyTrinh' => ['required','string'],
            'NguyenVatLieu' => ['required'],
        ];
    }
    public function messages() : array
    {
        return [
        'unique' => 'Mã quy trình bị trùng',
        'required' => 'Trường này không được trống',
        'string' => 'A message is String',
        ];
    }
}
