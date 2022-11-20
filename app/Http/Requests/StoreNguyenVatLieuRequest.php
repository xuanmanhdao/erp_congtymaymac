<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNguyenVatLieuRequest extends FormRequest
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
            'MaNguyenVatLieu' =>['bail','required','string','unique:nguyenvatlieu,MaNguyenVatLieu'],
            'TenNguyenVatLieu' =>['required','string'],
            'MaChatLieu' => ['required'],
            'SoLuong' => ['required','numeric'],
            'DonViTinh' => ['required','string'],
            'MaXuong' => ['required'],
            'MaDonViPhanPhoi' => ['required'],
        ];
    }
}
