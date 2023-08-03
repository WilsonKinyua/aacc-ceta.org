<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMemberChurchCenterRequest;
use App\Http\Requests\StoreMemberChurchCenterRequest;
use App\Http\Requests\UpdateMemberChurchCenterRequest;
use App\Models\Country;
use App\Models\MemberChurchCenter;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class MemberChurchCenterController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('member_church_center_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $memberChurchCenters = MemberChurchCenter::with(['country'])->get();

        return view('admin.memberChurchCenters.index', compact('memberChurchCenters'));
    }

    public function create()
    {
        abort_if(Gate::denies('member_church_center_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $countries = Country::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.memberChurchCenters.create', compact('countries'));
    }

    public function store(StoreMemberChurchCenterRequest $request)
    {
        $country = Country::find($request->country_id);
        $request->merge(['slug' => Str::slug(($country->name . " " . $request->location), '-')]);
        $memberChurchCenter = MemberChurchCenter::create($request->all());

        return redirect()->route('admin.member-church-centers.index');
    }

    public function edit(MemberChurchCenter $memberChurchCenter)
    {
        abort_if(Gate::denies('member_church_center_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $countries = Country::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $memberChurchCenter->load('country');

        return view('admin.memberChurchCenters.edit', compact('countries', 'memberChurchCenter'));
    }

    public function update(UpdateMemberChurchCenterRequest $request, MemberChurchCenter $memberChurchCenter)
    {
        $country = Country::find($request->country_id);
        $request->merge(['slug' => Str::slug(($country->name . " " . $request->location), '-')]);
        $memberChurchCenter->update($request->all());

        return redirect()->route('admin.member-church-centers.index');
    }

    public function show(MemberChurchCenter $memberChurchCenter)
    {
        abort_if(Gate::denies('member_church_center_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $memberChurchCenter->load('country', 'memberChurchCenterMemberChurchContacts');

        return view('admin.memberChurchCenters.show', compact('memberChurchCenter'));
    }

    public function destroy(MemberChurchCenter $memberChurchCenter)
    {
        abort_if(Gate::denies('member_church_center_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $memberChurchCenter->delete();

        return back();
    }

    public function massDestroy(MassDestroyMemberChurchCenterRequest $request)
    {
        $memberChurchCenters = MemberChurchCenter::find(request('ids'));

        foreach ($memberChurchCenters as $memberChurchCenter) {
            $memberChurchCenter->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
