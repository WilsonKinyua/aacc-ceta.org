@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.memberChurchContact.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.member-church-contacts.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required"
                        for="member_church_center_id">{{ trans('cruds.memberChurchContact.fields.member_church_center') }}</label>
                    <select class="form-control select2 {{ $errors->has('member_church_center') ? 'is-invalid' : '' }}"
                        name="member_church_center_id" id="member_church_center_id" required>
                        @foreach ($member_church_centers as $center)
                            <option value="{{ $center->id }}"
                                {{ old('member_church_center_id') == $center->id ? 'selected' : '' }}>
                                {{ $center->country->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('member_church_center'))
                        <div class="invalid-feedback">
                            {{ $errors->first('member_church_center') }}
                        </div>
                    @endif
                    <span
                        class="help-block">{{ trans('cruds.memberChurchContact.fields.member_church_center_helper') }}</span>
                </div>
                <div class="form-group">
                    <label
                        for="member_church_name">{{ trans('cruds.memberChurchContact.fields.member_church_name') }}</label>
                    <input class="form-control {{ $errors->has('member_church_name') ? 'is-invalid' : '' }}" type="text"
                        name="member_church_name" id="member_church_name" value="{{ old('member_church_name', '') }}">
                    @if ($errors->has('member_church_name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('member_church_name') }}
                        </div>
                    @endif
                    <span
                        class="help-block">{{ trans('cruds.memberChurchContact.fields.member_church_name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="email">{{ trans('cruds.memberChurchContact.fields.email') }}</label>
                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text"
                        name="email" id="email" value="{{ old('email', '') }}">
                    @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.memberChurchContact.fields.email_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="phone_number">{{ trans('cruds.memberChurchContact.fields.phone_number') }}</label>
                    <input class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" type="text"
                        name="phone_number" id="phone_number" value="{{ old('phone_number', '') }}">
                    @if ($errors->has('phone_number'))
                        <div class="invalid-feedback">
                            {{ $errors->first('phone_number') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.memberChurchContact.fields.phone_number_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="address">{{ trans('cruds.memberChurchContact.fields.address') }}</label>
                    <textarea class="form-control ckeditor {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address"
                        id="address">{!! old('address') !!}</textarea>
                    @if ($errors->has('address'))
                        <div class="invalid-feedback">
                            {{ $errors->first('address') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.memberChurchContact.fields.address_helper') }}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            function SimpleUploadAdapter(editor) {
                editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
                    return {
                        upload: function() {
                            return loader.file
                                .then(function(file) {
                                    return new Promise(function(resolve, reject) {
                                        // Init request
                                        var xhr = new XMLHttpRequest();
                                        xhr.open('POST',
                                            '{{ route('admin.member-church-contacts.storeCKEditorImages') }}',
                                            true);
                                        xhr.setRequestHeader('x-csrf-token', window._token);
                                        xhr.setRequestHeader('Accept', 'application/json');
                                        xhr.responseType = 'json';

                                        // Init listeners
                                        var genericErrorText =
                                            `Couldn't upload file: ${ file.name }.`;
                                        xhr.addEventListener('error', function() {
                                            reject(genericErrorText)
                                        });
                                        xhr.addEventListener('abort', function() {
                                            reject()
                                        });
                                        xhr.addEventListener('load', function() {
                                            var response = xhr.response;

                                            if (!response || xhr.status !== 201) {
                                                return reject(response && response
                                                    .message ?
                                                    `${genericErrorText}\n${xhr.status} ${response.message}` :
                                                    `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`
                                                    );
                                            }

                                            $('form').append(
                                                '<input type="hidden" name="ck-media[]" value="' +
                                                response.id + '">');

                                            resolve({
                                                default: response.url
                                            });
                                        });

                                        if (xhr.upload) {
                                            xhr.upload.addEventListener('progress', function(
                                            e) {
                                                if (e.lengthComputable) {
                                                    loader.uploadTotal = e.total;
                                                    loader.uploaded = e.loaded;
                                                }
                                            });
                                        }

                                        // Send request
                                        var data = new FormData();
                                        data.append('upload', file);
                                        data.append('crud_id',
                                            '{{ $memberChurchContact->id ?? 0 }}');
                                        xhr.send(data);
                                    });
                                })
                        }
                    };
                }
            }

            var allEditors = document.querySelectorAll('.ckeditor');
            for (var i = 0; i < allEditors.length; ++i) {
                ClassicEditor.create(
                    allEditors[i], {
                        extraPlugins: [SimpleUploadAdapter]
                    }
                );
            }
        });
    </script>
@endsection
