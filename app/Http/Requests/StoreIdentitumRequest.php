<?php

namespace App\Http\Requests;

use App\Models\Identitum;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreIdentitumRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('identitum_create');
    }

    public function rules()
    {
        return [
            'nama' => [
                'string',
                'min:2',
                'max:256',
                'required',
            ],
            'tempat_lahir' => [
                'string',
                'max:256',
                'nullable',
            ],
            'tanggal_lahir' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'jenis_kelamin' => [
                'required',
            ],
            'tinggi_badan' => [
                'numeric',
                'required',
            ],
            'berat_badan' => [
                'numeric',
                'required',
            ],
            'suku' => [
                'string',
                'nullable',
            ],
            'pekerjaan' => [
                'string',
                'nullable',
            ],
            'nomor_hp' => [
                'string',
                'nullable',
            ],
            'tanggal_pertama' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
