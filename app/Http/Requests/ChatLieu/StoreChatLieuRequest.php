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
            'MaChatLieu' => ['required', 'string', 'unique:chatlieu,MaChatLieu'],
            'TenChatLieu' => ['required', 'string'],
            'MoTaChatLieu' => ['nullable'],
        ];
    }
}
