<?php

namespace App\Http\Requests;

use App\Models\Statement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreStatementRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('statement_create');
    }

    public function rules()
    {
        return [
            'statement_document_preview' => [
                'required',
            ],
            'statement_document' => [
                'required',
            ],
        ];
    }
}
