<?php

namespace App\Http\Requests;

use App\Models\Statement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyStatementRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('statement_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:statements,id',
        ];
    }
}
