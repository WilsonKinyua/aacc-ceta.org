<?php

namespace App\Http\Requests;

use App\Models\MemberChurchContact;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMemberChurchContactRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('member_church_contact_edit');
    }

    public function rules()
    {
        return [
            'member_church_center_id' => [
                'required',
                'integer',
            ],
            'member_church_name' => [
                'string',
                'nullable',
            ],
            'email' => [
                'string',
                'nullable',
            ],
            'phone_number' => [
                'string',
                'nullable',
            ],
        ];
    }
}
