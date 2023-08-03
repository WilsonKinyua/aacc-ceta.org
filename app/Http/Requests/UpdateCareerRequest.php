<?php

namespace App\Http\Requests;

use App\Models\Career;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCareerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('career_edit');
    }

    public function rules()
    {
        return [
            'career_document_preview' => [
                'required',
            ],
            'career_document' => [
                'required',
            ],
        ];
    }
}
