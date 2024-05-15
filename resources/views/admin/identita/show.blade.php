@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.identitum.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.identita.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.identitum.fields.id') }}
                        </th>
                        <td>
                            {{ $identitum->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.identitum.fields.nama') }}
                        </th>
                        <td>
                            {{ $identitum->nama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.identitum.fields.tempat_lahir') }}
                        </th>
                        <td>
                            {{ $identitum->tempat_lahir }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.identitum.fields.tanggal_lahir') }}
                        </th>
                        <td>
                            {{ $identitum->tanggal_lahir }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.identitum.fields.jenis_kelamin') }}
                        </th>
                        <td>
                            {{ App\Models\Identitum::JENIS_KELAMIN_SELECT[$identitum->jenis_kelamin] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.identitum.fields.tinggi_badan') }}
                        </th>
                        <td>
                            {{ $identitum->tinggi_badan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.identitum.fields.berat_badan') }}
                        </th>
                        <td>
                            {{ $identitum->berat_badan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.identitum.fields.suku') }}
                        </th>
                        <td>
                            {{ $identitum->suku }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.identitum.fields.riwayat_perokok') }}
                        </th>
                        <td>
                            {{ App\Models\Identitum::RIWAYAT_PEROKOK_RADIO[$identitum->riwayat_perokok] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.identitum.fields.pekerjaan') }}
                        </th>
                        <td>
                            {{ $identitum->pekerjaan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.identitum.fields.nomor_hp') }}
                        </th>
                        <td>
                            {{ $identitum->nomor_hp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.identitum.fields.status_pernikahan') }}
                        </th>
                        <td>
                            {{ App\Models\Identitum::STATUS_PERNIKAHAN_SELECT[$identitum->status_pernikahan] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.identitum.fields.alamat') }}
                        </th>
                        <td>
                            {{ $identitum->alamat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.identitum.fields.tanggal_pertama') }}
                        </th>
                        <td>
                            {{ $identitum->tanggal_pertama }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.identita.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#identitas_pengukurans" role="tab" data-toggle="tab">
                {{ trans('cruds.pengukuran.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#identitas_catatans" role="tab" data-toggle="tab">
                {{ trans('cruds.catatan.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="identitas_pengukurans">
            @includeIf('admin.identita.relationships.identitasPengukurans', ['pengukurans' => $identitum->identitasPengukurans])
        </div>
        <div class="tab-pane" role="tabpanel" id="identitas_catatans">
            @includeIf('admin.identita.relationships.identitasCatatans', ['catatans' => $identitum->identitasCatatans])
        </div>
    </div>
</div>

@endsection