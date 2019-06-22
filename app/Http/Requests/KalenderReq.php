<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KalenderReq extends FormRequest
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
            'besar_inflasi' => 'required|numeric',
            'kd_bulan' => 'required'
        ];
    }
}
