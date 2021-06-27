@extends('layouts.admin')
@section('content')
    @can('questionsoption_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.questionsoptions.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.questionsoption.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.questionsoption.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Questionsoption">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.questionsoption.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.questionsoption.fields.question') }}
                            </th>
                            <th>
                                {{ trans('cruds.questionsoption.fields.option_text') }}
                            </th>
                            <th>
                                {{ trans('cruds.questionsoption.fields.correct') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($questionsoptions as $key => $questionsoption)
                            <tr data-entry-id="{{ $questionsoption->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $questionsoption->id ?? '' }}
                                </td>
                                <td>
                                    {{ $questionsoption->question->question ?? '' }}
                                </td>
                                <td>
                                    {{ $questionsoption->option_text ?? '' }}
                                </td>
                                <td>
                                    <span style="display:none">{{ $questionsoption->correct ?? '' }}</span>
                                    <input type="checkbox" disabled="disabled"
                                        {{ $questionsoption->correct ? 'checked' : '' }}>
                                </td>
                                <td>
                                    @can('questionsoption_show')
                                        <a class="btn btn-xs btn-primary"
                                            href="{{ route('admin.questionsoptions.show', $questionsoption->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('questionsoption_edit')
                                        <a class="btn btn-xs btn-info"
                                            href="{{ route('admin.questionsoptions.edit', $questionsoption->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('questionsoption_delete')
                                        <form action="{{ route('admin.questionsoptions.destroy', $questionsoption->id) }}"
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
            @can('questionsoption_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.questionsoptions.massDestroy') }}",
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
                order: [
                    [1, 'desc']
                ],
                pageLength: 100,
            });
            let table = $('.datatable-Questionsoption:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
@endsection
