<?php

namespace App\Http\Requests;

use App\Models\Trik;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTrikRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('trik_edit');
    }

    public function rules()
    {
        return [
            'judul' => [
                'string',
                'max:256',
                'required',
            ],
            'isi' => [
                'required',
            ],
        ];
    }
}
