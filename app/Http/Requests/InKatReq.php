<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InKatReq extends FormRequest
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
            //
            'tahun' => 'required|numeric',
            'nilai_inflasi' => 'required|numeric',
            //'kd_bulan' => 'required',
            'kd_kategori' => 'required'

        ];
    }
}
