@extends('layouts.admin')
@section('content')
    @can('member_church_contact_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.member-church-contacts.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.memberChurchContact.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.memberChurchContact.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-MemberChurchContact">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.memberChurchContact.fields.member_church_center') }}
                            </th>
                            <th>
                                {{ trans('cruds.memberChurchContact.fields.email') }}
                            </th>
                            <th>
                                {{ trans('cruds.memberChurchContact.fields.phone_number') }}
                            </th>
                            <th>
                                {{ trans('cruds.memberChurchContact.fields.created_at') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($memberChurchContacts as $key => $memberChurchContact)
                            <tr data-entry-id="{{ $memberChurchContact->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $memberChurchContact->member_church_center->country->name ?? '' }}
                                </td>
                                <td>
                                    {{ $memberChurchContact->email ?? '' }}
                                </td>
                                <td>
                                    {{ $memberChurchContact->phone_number ?? '' }}
                                </td>
                                <td>
                                    {{ $memberChurchContact->created_at ?? '' }}
                                </td>
                                <td>
                                    @can('member_church_contact_show')
                                        <a class="btn btn-xs btn-primary"
                                            href="{{ route('admin.member-church-contacts.show', $memberChurchContact->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('member_church_contact_edit')
                                        <a class="btn btn-xs btn-info"
                                            href="{{ route('admin.member-church-contacts.edit', $memberChurchContact->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('member_church_contact_delete')
                                        <form
                                            action="{{ route('admin.member-church-contacts.destroy', $memberChurchContact->id) }}"
                                            method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                            style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger"
                                                value="{{ trans('global.delete') }}">
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
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('member_church_contact_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.member-church-contacts.massDestroy') }}",
                    className: 'btn-danger',
                    action: function(e, dt, node, config) {
                        var ids = $.map(dt.rows({
                            selected: true
                        }).nodes(), function(entry) {
                            return $(entry).data('entry-id')
                        });

                        if (ids.length === 0) {
                            alert('{{ trans('global.datatables.zero_selected') }}')

                            return
                        }

                        if (confirm('{{ trans('global.areYouSure') }}')) {
                            $.ajax({
                                    headers: {
                                        'x-csrf-token': _token
                                    },
                                    method: 'POST',
                                    url: config.url,
                                    data: {
                                        ids: ids,
                                        _method: 'DELETE'
                                    }
                                })
                                .done(function() {
                                    location.reload()
                                })
                        }
                    }
                }
                dtButtons.push(deleteButton)
            @endcan

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [
                    [4, 'desc']
                ],
                pageLength: 100,
            });
            let table = $('.datatable-MemberChurchContact:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
@endsection
