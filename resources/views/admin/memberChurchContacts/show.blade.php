@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.memberChurchContact.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.member-church-contacts.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.memberChurchContact.fields.id') }}
                            </th>
                            <td>
                                {{ $memberChurchContact->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.memberChurchContact.fields.member_church_center') }}
                            </th>
                            <td>
                                {{ $memberChurchContact->member_church_center->location ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.memberChurchContact.fields.member_church_name') }}
                            </th>
                            <td>
                                {{ $memberChurchContact->member_church_name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.memberChurchContact.fields.email') }}
                            </th>
                            <td>
                                {{ $memberChurchContact->email }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.memberChurchContact.fields.phone_number') }}
                            </th>
                            <td>
                                {{ $memberChurchContact->phone_number }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.memberChurchContact.fields.address') }}
                            </th>
                            <td>
                                {!! $memberChurchContact->address !!}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.member-church-contacts.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
