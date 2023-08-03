<?php

namespace App\Http\Requests;

use App\Models\MemberChurchCenter;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMemberChurchCenterRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('member_church_center_edit');
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
