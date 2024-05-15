<?php

namespace App\Http\Requests;

use App\Models\Catatan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCatatanRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('catatan_create');
    }

    public function rules()
    {
        return [
            'identitas_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
