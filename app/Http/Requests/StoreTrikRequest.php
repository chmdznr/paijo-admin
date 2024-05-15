<?php

namespace App\Http\Requests;

use App\Models\Trik;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTrikRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('trik_create');
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
