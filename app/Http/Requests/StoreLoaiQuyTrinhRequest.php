<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLoaiQuyTrinhRequest extends FormRequest
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
            'MaLoaiQuyTrinh' =>['bail','required','string','unique:loaiquytrinh,MaLoaiQuyTrinh'],
            // 'MaNguyenVatLieu' => ['required'],
            'NguyenVatLieu' => ['required'],
            'TenQuyTrinh' =>['required','string'],
            'MoTaQuyTrinh' => ['required','string'],
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
