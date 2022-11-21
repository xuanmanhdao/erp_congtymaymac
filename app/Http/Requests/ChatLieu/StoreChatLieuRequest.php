<?php

namespace App\Http\Requests\ChatLieu;

use Illuminate\Foundation\Http\FormRequest;

class StoreChatLieuRequest extends FormRequest
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
            'MaChatLieu' => [
                'bail',
                'required', 
                'string', 
                'unique:chatlieu,MaChatLieu',
                'max:50',
            ],
            'TenChatLieu' => [
                'bail',
                'required', 
                'string',
                'unique:chatlieu,TenChatLieu',
                'max:255',
            ],
            'MoTaChatLieu' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'unique' => ':attribute đã tồn tại',
            'required' => ':attribute bắt buộc phải nhập',
            'string' => ':attribute phải là kiểu chữ',

            'MaChatLieu.max' => ':attribute tối đa 50 ký tự',
            'TenChatLieu.max' => ':attribute tối đa 255 ký tự',
        ];
    }

    public function attributes(): array
    {
        return [
            'MaChatLieu' => 'Mã kiểu nguyên liệu',
            'TenChatLieu' => 'Tên kiểu nguyên liệu',
            'MoTaChatLieu' => 'Mô tả kiểu nguyên liệu',
        ];
    }
}
