<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyMemberChurchContactRequest;
use App\Http\Requests\StoreMemberChurchContactRequest;
use App\Http\Requests\UpdateMemberChurchContactRequest;
use App\Models\MemberChurchCenter;
use App\Models\MemberChurchContact;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class MemberChurchContactController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('member_church_contact_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $memberChurchContacts = MemberChurchContact::with(['member_church_center'])->get();

        return view('admin.memberChurchContacts.index', compact('memberChurchContacts'));
    }

    public function create()
    {
        abort_if(Gate::denies('member_church_contact_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $member_church_centers = MemberChurchCenter::pluck('location', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.memberChurchContacts.create', compact('member_church_centers'));
    }

    public function store(StoreMemberChurchContactRequest $request)
    {
        $memberChurchContact = MemberChurchContact::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $memberChurchContact->id]);
        }

        return redirect()->route('admin.member-church-contacts.index');
    }

    public function edit(MemberChurchContact $memberChurchContact)
    {
        abort_if(Gate::denies('member_church_contact_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $member_church_centers = MemberChurchCenter::pluck('location', 'id')->prepend(trans('global.pleaseSelect'), '');

        $memberChurchContact->load('member_church_center');

        return view('admin.memberChurchContacts.edit', compact('memberChurchContact', 'member_church_centers'));
    }

    public function update(UpdateMemberChurchContactRequest $request, MemberChurchContact $memberChurchContact)
    {
        $memberChurchContact->update($request->all());

        return redirect()->route('admin.member-church-contacts.index');
    }

    public function show(MemberChurchContact $memberChurchContact)
    {
        abort_if(Gate::denies('member_church_contact_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $memberChurchContact->load('member_church_center');

        return view('admin.memberChurchContacts.show', compact('memberChurchContact'));
    }

    public function destroy(MemberChurchContact $memberChurchContact)
    {
        abort_if(Gate::denies('member_church_contact_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $memberChurchContact->delete();

        return back();
    }

    public function massDestroy(MassDestroyMemberChurchContactRequest $request)
    {
        $memberChurchContacts = MemberChurchContact::find(request('ids'));

        foreach ($memberChurchContacts as $memberChurchContact) {
            $memberChurchContact->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('member_church_contact_create') && Gate::denies('member_church_contact_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new MemberChurchContact();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
