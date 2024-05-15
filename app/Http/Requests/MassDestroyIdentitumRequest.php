<?php

namespace App\Http\Requests;

use App\Models\Identitum;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyIdentitumRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('identitum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:identita,id',
        ];
    }
}
