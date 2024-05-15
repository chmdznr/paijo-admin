<?php

namespace App\Http\Requests;

use App\Models\Trik;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTrikRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('trik_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:triks,id',
        ];
    }
}
