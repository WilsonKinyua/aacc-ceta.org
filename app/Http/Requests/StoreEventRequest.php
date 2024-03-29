<?php

namespace App\Http\Requests;

use App\Models\Event;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEventRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('event_create');
    }

    public function rules()
    {
        return [
            'when' => [
                'string',
                'required',
            ],
            'title' => [
                'string',
                'required',
                'unique:events',
            ],
            'location' => [
                'string',
                'nullable',
            ],
        ];
    }
}
