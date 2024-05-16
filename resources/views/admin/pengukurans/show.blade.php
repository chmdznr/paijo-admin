@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.pengukuran.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pengukurans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.pengukuran.fields.id') }}
                        </th>
                        <td>
                            {{ $pengukuran->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pengukuran.fields.identitas') }}
                        </th>
                        <td>
                            {{ $pengukuran->identitas->nama ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pengukuran.fields.berat_badan') }}
                        </th>
                        <td>
                            {{ $pengukuran->berat_badan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pengukuran.fields.tinggi_badan') }}
                        </th>
                        <td>
                            {{ $pengukuran->tinggi_badan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pengukuran.fields.imt') }}
                        </th>
                        <td>
                            {{ $pengukuran->imt }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pengukuran.fields.lingkar_perut') }}
                        </th>
                        <td>
                            {{ $pengukuran->lingkar_perut }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pengukuran.fields.tekanan_darah_diastole') }}
                        </th>
                        <td>
                            {{ $pengukuran->tekanan_darah_diastole }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pengukuran.fields.tekanan_darah_sistole') }}
                        </th>
                        <td>
                            {{ $pengukuran->tekanan_darah_sistole }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pengukuran.fields.frekuensi_nafas') }}
                        </th>
                        <td>
                            {{ $pengukuran->frekuensi_nafas }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pengukuran.fields.nadi') }}
                        </th>
                        <td>
                            {{ $pengukuran->nadi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pengukuran.fields.kadar_gula_darah') }}
                        </th>
                        <td>
                            {{ $pengukuran->kadar_gula_darah }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pengukuran.fields.waktu_pengambilan_gula_darah') }}
                        </th>
                        <td>
                            {{ App\Models\Pengukuran::WAKTU_PENGAMBILAN_GULA_DARAH_SELECT[$pengukuran->waktu_pengambilan_gula_darah] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pengukuran.fields.kolesterol_total') }}
                        </th>
                        <td>
                            {{ $pengukuran->kolesterol_total }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pengukuran.fields.kolesterol_ldl') }}
                        </th>
                        <td>
                            {{ $pengukuran->kolesterol_ldl }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pengukuran.fields.kolesterol_hdl') }}
                        </th>
                        <td>
                            {{ $pengukuran->kolesterol_hdl }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pengukuran.fields.trigliserida') }}
                        </th>
                        <td>
                            {{ $pengukuran->trigliserida }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pengukuran.fields.kadar_hb') }}
                        </th>
                        <td>
                            {{ $pengukuran->kadar_hb }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pengukuran.fields.kadar_asam_urat') }}
                        </th>
                        <td>
                            {{ $pengukuran->kadar_asam_urat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pengukuran.fields.golongan_darah') }}
                        </th>
                        <td>
                            {{ App\Models\Pengukuran::GOLONGAN_DARAH_SELECT[$pengukuran->golongan_darah] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pengukuran.fields.hba_1_c') }}
                        </th>
                        <td>
                            {{ $pengukuran->hba_1_c }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pengukuran.fields.kondisi_umum') }}
                        </th>
                        <td>
                            {!! $pengukuran->kondisi_umum !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pengukuran.fields.keluhan_perasaan') }}
                        </th>
                        <td>
                            {!! $pengukuran->keluhan_perasaan !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pengukurans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection