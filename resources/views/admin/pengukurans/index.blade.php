@extends('layouts.admin')
@section('content')
@can('pengukuran_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.pengukurans.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.pengukuran.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.pengukuran.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Pengukuran">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.pengukuran.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.pengukuran.fields.identitas') }}
                        </th>
                        <th>
                            {{ trans('cruds.pengukuran.fields.berat_badan') }}
                        </th>
                        <th>
                            {{ trans('cruds.pengukuran.fields.tinggi_badan') }}
                        </th>
                        <th>
                            {{ trans('cruds.pengukuran.fields.imt') }}
                        </th>
                        <th>
                            {{ trans('cruds.pengukuran.fields.lingkar_perut') }}
                        </th>
                        <th>
                            {{ trans('cruds.pengukuran.fields.tekanan_darah_diastole') }}
                        </th>
                        <th>
                            {{ trans('cruds.pengukuran.fields.tekanan_darah_sistole') }}
                        </th>
                        <th>
                            {{ trans('cruds.pengukuran.fields.frekuensi_nafas') }}
                        </th>
                        <th>
                            {{ trans('cruds.pengukuran.fields.nadi') }}
                        </th>
                        <th>
                            {{ trans('cruds.pengukuran.fields.kadar_gula_darah') }}
                        </th>
                        <th>
                            {{ trans('cruds.pengukuran.fields.waktu_pengambilan_gula_darah') }}
                        </th>
                        <th>
                            {{ trans('cruds.pengukuran.fields.kolesterol_total') }}
                        </th>
                        <th>
                            {{ trans('cruds.pengukuran.fields.kolesterol_ldl') }}
                        </th>
                        <th>
                            {{ trans('cruds.pengukuran.fields.kolesterol_hdl') }}
                        </th>
                        <th>
                            {{ trans('cruds.pengukuran.fields.trigliserida') }}
                        </th>
                        <th>
                            {{ trans('cruds.pengukuran.fields.kadar_hb') }}
                        </th>
                        <th>
                            {{ trans('cruds.pengukuran.fields.kadar_asam_urat') }}
                        </th>
                        <th>
                            {{ trans('cruds.pengukuran.fields.golongan_darah') }}
                        </th>
                        <th>
                            {{ trans('cruds.pengukuran.fields.hba_1_c') }}
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
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($identita as $key => $item)
                                    <option value="{{ $item->nama }}">{{ $item->nama }}</option>
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
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
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
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Pengukuran::WAKTU_PENGAMBILAN_GULA_DARAH_SELECT as $key => $item)
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
                                @foreach(App\Models\Pengukuran::GOLONGAN_DARAH_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pengukurans as $key => $pengukuran)
                        <tr data-entry-id="{{ $pengukuran->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $pengukuran->id ?? '' }}
                            </td>
                            <td>
                                {{ $pengukuran->identitas->nama ?? '' }}
                            </td>
                            <td>
                                {{ $pengukuran->berat_badan ?? '' }}
                            </td>
                            <td>
                                {{ $pengukuran->tinggi_badan ?? '' }}
                            </td>
                            <td>
                                {{ $pengukuran->imt ?? '' }}
                            </td>
                            <td>
                                {{ $pengukuran->lingkar_perut ?? '' }}
                            </td>
                            <td>
                                {{ $pengukuran->tekanan_darah_diastole ?? '' }}
                            </td>
                            <td>
                                {{ $pengukuran->tekanan_darah_sistole ?? '' }}
                            </td>
                            <td>
                                {{ $pengukuran->frekuensi_nafas ?? '' }}
                            </td>
                            <td>
                                {{ $pengukuran->nadi ?? '' }}
                            </td>
                            <td>
                                {{ $pengukuran->kadar_gula_darah ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Pengukuran::WAKTU_PENGAMBILAN_GULA_DARAH_SELECT[$pengukuran->waktu_pengambilan_gula_darah] ?? '' }}
                            </td>
                            <td>
                                {{ $pengukuran->kolesterol_total ?? '' }}
                            </td>
                            <td>
                                {{ $pengukuran->kolesterol_ldl ?? '' }}
                            </td>
                            <td>
                                {{ $pengukuran->kolesterol_hdl ?? '' }}
                            </td>
                            <td>
                                {{ $pengukuran->trigliserida ?? '' }}
                            </td>
                            <td>
                                {{ $pengukuran->kadar_hb ?? '' }}
                            </td>
                            <td>
                                {{ $pengukuran->kadar_asam_urat ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Pengukuran::GOLONGAN_DARAH_SELECT[$pengukuran->golongan_darah] ?? '' }}
                            </td>
                            <td>
                                {{ $pengukuran->hba_1_c ?? '' }}
                            </td>
                            <td>
                                @can('pengukuran_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.pengukurans.show', $pengukuran->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('pengukuran_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.pengukurans.edit', $pengukuran->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('pengukuran_delete')
                                    <form action="{{ route('admin.pengukurans.destroy', $pengukuran->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('pengukuran_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.pengukurans.massDestroy') }}",
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
  let table = $('.datatable-Pengukuran:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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