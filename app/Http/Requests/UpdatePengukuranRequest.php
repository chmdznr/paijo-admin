<?php

namespace App\Http\Requests;

use App\Models\Pengukuran;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePengukuranRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pengukuran_edit');
    }

    public function rules()
    {
        return [
            'identitas_id' => [
                'required',
                'integer',
            ],
            'berat_badan' => [
                'numeric',
                'required',
            ],
            'tinggi_badan' => [
                'numeric',
                'required',
            ],
            'imt' => [
                'numeric',
            ],
            'lingkar_perut' => [
                'numeric',
            ],
            'tekanan_darah_diastole' => [
                'numeric',
            ],
            'tekanan_darah_sistole' => [
                'numeric',
            ],
            'frekuensi_nafas' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'nadi' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'kadar_gula_darah' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'kolesterol_total' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'kolesterol_ldl' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'kolesterol_hdl' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'trigliserida' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'kadar_hb' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'kadar_asam_urat' => [
                'numeric',
            ],
            'hba_1_c' => [
                'numeric',
            ],
        ];
    }
}
