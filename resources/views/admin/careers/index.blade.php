@extends('layouts.admin')
@section('content')
@can('career_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.careers.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.career.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.career.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Career">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.career.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.career.fields.career_document_preview') }}
                        </th>
                        <th>
                            {{ trans('cruds.career.fields.career_document') }}
                        </th>
                        <th>
                            {{ trans('cruds.career.fields.created_at') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($careers as $key => $career)
                        <tr data-entry-id="{{ $career->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $career->id ?? '' }}
                            </td>
                            <td>
                                @if($career->career_document_preview)
                                    <a href="{{ $career->career_document_preview->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $career->career_document_preview->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($career->career_document)
                                    <a href="{{ $career->career_document->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $career->created_at ?? '' }}
                            </td>
                            <td>
                                @can('career_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.careers.show', $career->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('career_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.careers.edit', $career->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('career_delete')
                                    <form action="{{ route('admin.careers.destroy', $career->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('career_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.careers.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Career:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection