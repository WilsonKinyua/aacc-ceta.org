@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.statement.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.statements.update", [$statement->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="statement_document_preview">{{ trans('cruds.statement.fields.statement_document_preview') }}</label>
                <div class="needsclick dropzone {{ $errors->has('statement_document_preview') ? 'is-invalid' : '' }}" id="statement_document_preview-dropzone">
                </div>
                @if($errors->has('statement_document_preview'))
                    <div class="invalid-feedback">
                        {{ $errors->first('statement_document_preview') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.statement.fields.statement_document_preview_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="statement_document">{{ trans('cruds.statement.fields.statement_document') }}</label>
                <div class="needsclick dropzone {{ $errors->has('statement_document') ? 'is-invalid' : '' }}" id="statement_document-dropzone">
                </div>
                @if($errors->has('statement_document'))
                    <div class="invalid-feedback">
                        {{ $errors->first('statement_document') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.statement.fields.statement_document_helper') }}</span>
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
    Dropzone.options.statementDocumentPreviewDropzone = {
    url: '{{ route('admin.statements.storeMedia') }}',
    maxFilesize: 20, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 20,
      width: 1000,
      height: 1000
    },
    success: function (file, response) {
      $('form').find('input[name="statement_document_preview"]').remove()
      $('form').append('<input type="hidden" name="statement_document_preview" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="statement_document_preview"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($statement) && $statement->statement_document_preview)
      var file = {!! json_encode($statement->statement_document_preview) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="statement_document_preview" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
<script>
    Dropzone.options.statementDocumentDropzone = {
    url: '{{ route('admin.statements.storeMedia') }}',
    maxFilesize: 200, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 200
    },
    success: function (file, response) {
      $('form').find('input[name="statement_document"]').remove()
      $('form').append('<input type="hidden" name="statement_document" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="statement_document"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($statement) && $statement->statement_document)
      var file = {!! json_encode($statement->statement_document) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="statement_document" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection