<?php

namespace App\Http\Requests;

use App\Models\MemberChurchCenter;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMemberChurchCenterRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('member_church_center_create');
    }

    public function rules()
    {
        return [
            'country_id' => [
                'required',
                'integer',
            ],
            'location' => [
                'string',
                'nullable',
            ],
        ];
    }
}
