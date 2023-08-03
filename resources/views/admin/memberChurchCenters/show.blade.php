@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.memberChurchCenter.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.member-church-centers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.memberChurchCenter.fields.id') }}
                        </th>
                        <td>
                            {{ $memberChurchCenter->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.memberChurchCenter.fields.country') }}
                        </th>
                        <td>
                            {{ $memberChurchCenter->country->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.memberChurchCenter.fields.location') }}
                        </th>
                        <td>
                            {{ $memberChurchCenter->location }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.member-church-centers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#member_church_center_member_church_contacts" role="tab" data-toggle="tab">
                {{ trans('cruds.memberChurchContact.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="member_church_center_member_church_contacts">
            @includeIf('admin.memberChurchCenters.relationships.memberChurchCenterMemberChurchContacts', ['memberChurchContacts' => $memberChurchCenter->memberChurchCenterMemberChurchContacts])
        </div>
    </div>
</div>

@endsection