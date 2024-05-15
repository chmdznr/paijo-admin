@extends('layouts.admin')
@section('content')
@can('identitum_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.identita.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.identitum.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.identitum.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Identitum">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.identitum.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.identitum.fields.nama') }}
                        </th>
                        <th>
                            {{ trans('cruds.identitum.fields.tempat_lahir') }}
                        </th>
                        <th>
                            {{ trans('cruds.identitum.fields.tanggal_lahir') }}
                        </th>
                        <th>
                            {{ trans('cruds.identitum.fields.jenis_kelamin') }}
                        </th>
                        <th>
                            {{ trans('cruds.identitum.fields.tinggi_badan') }}
                        </th>
                        <th>
                            {{ trans('cruds.identitum.fields.berat_badan') }}
                        </th>
                        <th>
                            {{ trans('cruds.identitum.fields.suku') }}
                        </th>
                        <th>
                            {{ trans('cruds.identitum.fields.riwayat_perokok') }}
                        </th>
                        <th>
                            {{ trans('cruds.identitum.fields.pekerjaan') }}
                        </th>
                        <th>
                            {{ trans('cruds.identitum.fields.nomor_hp') }}
                        </th>
                        <th>
                            {{ trans('cruds.identitum.fields.status_pernikahan') }}
                        </th>
                        <th>
                            {{ trans('cruds.identitum.fields.alamat') }}
                        </th>
                        <th>
                            {{ trans('cruds.identitum.fields.tanggal_pertama') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Identitum::JENIS_KELAMIN_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Identitum::RIWAYAT_PEROKOK_RADIO as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Identitum::STATUS_PERNIKAHAN_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($identita as $key => $identitum)
                        <tr data-entry-id="{{ $identitum->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $identitum->id ?? '' }}
                            </td>
                            <td>
                                {{ $identitum->nama ?? '' }}
                            </td>
                            <td>
                                {{ $identitum->tempat_lahir ?? '' }}
                            </td>
                            <td>
                                {{ $identitum->tanggal_lahir ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Identitum::JENIS_KELAMIN_SELECT[$identitum->jenis_kelamin] ?? '' }}
                            </td>
                            <td>
                                {{ $identitum->tinggi_badan ?? '' }}
                            </td>
                            <td>
                                {{ $identitum->berat_badan ?? '' }}
                            </td>
                            <td>
                                {{ $identitum->suku ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Identitum::RIWAYAT_PEROKOK_RADIO[$identitum->riwayat_perokok] ?? '' }}
                            </td>
                            <td>
                                {{ $identitum->pekerjaan ?? '' }}
                            </td>
                            <td>
                                {{ $identitum->nomor_hp ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Identitum::STATUS_PERNIKAHAN_SELECT[$identitum->status_pernikahan] ?? '' }}
                            </td>
                            <td>
                                {{ $identitum->alamat ?? '' }}
                            </td>
                            <td>
                                {{ $identitum->tanggal_pertama ?? '' }}
                            </td>
                            <td>
                                @can('identitum_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.identita.show', $identitum->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('identitum_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.identita.edit', $identitum->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('identitum_delete')
                                    <form action="{{ route('admin.identita.destroy', $identitum->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('identitum_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.identita.massDestroy') }}",
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
    order: [[ 2, 'asc' ]],
    pageLength: 50,
  });
  let table = $('.datatable-Identitum:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection