@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.career.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.careers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.career.fields.id') }}
                        </th>
                        <td>
                            {{ $career->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.career.fields.career_document_preview') }}
                        </th>
                        <td>
                            @if($career->career_document_preview)
                                <a href="{{ $career->career_document_preview->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $career->career_document_preview->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.career.fields.career_document') }}
                        </th>
                        <td>
                            @if($career->career_document)
                                <a href="{{ $career->career_document->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.careers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection