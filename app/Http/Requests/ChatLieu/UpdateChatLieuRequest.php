<?php

namespace App\Http\Requests\ChatLieu;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateChatLieuRequest extends FormRequest
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
            'MaChatLieu' => ['required', 'string', Rule::unique('chatlieu')->ignore($this->chatlieu)],
            'TenChatLieu' => ['required', 'string'],
            'MoTaChatLieu' => ['nullable'],
        ];
    }
}
