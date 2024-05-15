@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.identitum.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.identita.update", [$identitum->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="nama">{{ trans('cruds.identitum.fields.nama') }}</label>
                <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text" name="nama" id="nama" value="{{ old('nama', $identitum->nama) }}" required>
                @if($errors->has('nama'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nama') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.identitum.fields.nama_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tempat_lahir">{{ trans('cruds.identitum.fields.tempat_lahir') }}</label>
                <input class="form-control {{ $errors->has('tempat_lahir') ? 'is-invalid' : '' }}" type="text" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir', $identitum->tempat_lahir) }}">
                @if($errors->has('tempat_lahir'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tempat_lahir') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.identitum.fields.tempat_lahir_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">{{ trans('cruds.identitum.fields.tanggal_lahir') }}</label>
                <input class="form-control date {{ $errors->has('tanggal_lahir') ? 'is-invalid' : '' }}" type="text" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir', $identitum->tanggal_lahir) }}">
                @if($errors->has('tanggal_lahir'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tanggal_lahir') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.identitum.fields.tanggal_lahir_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.identitum.fields.jenis_kelamin') }}</label>
                <select class="form-control {{ $errors->has('jenis_kelamin') ? 'is-invalid' : '' }}" name="jenis_kelamin" id="jenis_kelamin" required>
                    <option value disabled {{ old('jenis_kelamin', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Identitum::JENIS_KELAMIN_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('jenis_kelamin', $identitum->jenis_kelamin) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('jenis_kelamin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('jenis_kelamin') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.identitum.fields.jenis_kelamin_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tinggi_badan">{{ trans('cruds.identitum.fields.tinggi_badan') }}</label>
                <input class="form-control {{ $errors->has('tinggi_badan') ? 'is-invalid' : '' }}" type="number" name="tinggi_badan" id="tinggi_badan" value="{{ old('tinggi_badan', $identitum->tinggi_badan) }}" step="0.01" required>
                @if($errors->has('tinggi_badan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tinggi_badan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.identitum.fields.tinggi_badan_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="berat_badan">{{ trans('cruds.identitum.fields.berat_badan') }}</label>
                <input class="form-control {{ $errors->has('berat_badan') ? 'is-invalid' : '' }}" type="number" name="berat_badan" id="berat_badan" value="{{ old('berat_badan', $identitum->berat_badan) }}" step="0.01" required>
                @if($errors->has('berat_badan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('berat_badan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.identitum.fields.berat_badan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="suku">{{ trans('cruds.identitum.fields.suku') }}</label>
                <input class="form-control {{ $errors->has('suku') ? 'is-invalid' : '' }}" type="text" name="suku" id="suku" value="{{ old('suku', $identitum->suku) }}">
                @if($errors->has('suku'))
                    <div class="invalid-feedback">
                        {{ $errors->first('suku') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.identitum.fields.suku_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.identitum.fields.riwayat_perokok') }}</label>
                @foreach(App\Models\Identitum::RIWAYAT_PEROKOK_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('riwayat_perokok') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="riwayat_perokok_{{ $key }}" name="riwayat_perokok" value="{{ $key }}" {{ old('riwayat_perokok', $identitum->riwayat_perokok) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="riwayat_perokok_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('riwayat_perokok'))
                    <div class="invalid-feedback">
                        {{ $errors->first('riwayat_perokok') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.identitum.fields.riwayat_perokok_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pekerjaan">{{ trans('cruds.identitum.fields.pekerjaan') }}</label>
                <input class="form-control {{ $errors->has('pekerjaan') ? 'is-invalid' : '' }}" type="text" name="pekerjaan" id="pekerjaan" value="{{ old('pekerjaan', $identitum->pekerjaan) }}">
                @if($errors->has('pekerjaan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pekerjaan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.identitum.fields.pekerjaan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nomor_hp">{{ trans('cruds.identitum.fields.nomor_hp') }}</label>
                <input class="form-control {{ $errors->has('nomor_hp') ? 'is-invalid' : '' }}" type="text" name="nomor_hp" id="nomor_hp" value="{{ old('nomor_hp', $identitum->nomor_hp) }}">
                @if($errors->has('nomor_hp'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nomor_hp') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.identitum.fields.nomor_hp_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.identitum.fields.status_pernikahan') }}</label>
                <select class="form-control {{ $errors->has('status_pernikahan') ? 'is-invalid' : '' }}" name="status_pernikahan" id="status_pernikahan">
                    <option value disabled {{ old('status_pernikahan', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Identitum::STATUS_PERNIKAHAN_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status_pernikahan', $identitum->status_pernikahan) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status_pernikahan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status_pernikahan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.identitum.fields.status_pernikahan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="alamat">{{ trans('cruds.identitum.fields.alamat') }}</label>
                <textarea class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" name="alamat" id="alamat">{{ old('alamat', $identitum->alamat) }}</textarea>
                @if($errors->has('alamat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('alamat') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.identitum.fields.alamat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tanggal_pertama">{{ trans('cruds.identitum.fields.tanggal_pertama') }}</label>
                <input class="form-control date {{ $errors->has('tanggal_pertama') ? 'is-invalid' : '' }}" type="text" name="tanggal_pertama" id="tanggal_pertama" value="{{ old('tanggal_pertama', $identitum->tanggal_pertama) }}">
                @if($errors->has('tanggal_pertama'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tanggal_pertama') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.identitum.fields.tanggal_pertama_helper') }}</span>
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