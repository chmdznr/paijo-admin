<?php

namespace App\Http\Requests;

use App\Models\Catatan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCatatanRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('catatan_edit');
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
