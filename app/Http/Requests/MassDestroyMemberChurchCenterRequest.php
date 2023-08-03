<?php

namespace App\Http\Requests;

use App\Models\MemberChurchCenter;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMemberChurchCenterRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('member_church_center_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:member_church_centers,id',
        ];
    }
}
