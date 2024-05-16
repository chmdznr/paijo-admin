@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.pengukuran.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.pengukurans.update", [$pengukuran->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="identitas_id">{{ trans('cruds.pengukuran.fields.identitas') }}</label>
                <select class="form-control select2 {{ $errors->has('identitas') ? 'is-invalid' : '' }}" name="identitas_id" id="identitas_id" required>
                    @foreach($identitas as $id => $entry)
                        <option value="{{ $id }}" {{ (old('identitas_id') ? old('identitas_id') : $pengukuran->identitas->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('identitas'))
                    <div class="invalid-feedback">
                        {{ $errors->first('identitas') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pengukuran.fields.identitas_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="berat_badan">{{ trans('cruds.pengukuran.fields.berat_badan') }}</label>
                <input class="form-control {{ $errors->has('berat_badan') ? 'is-invalid' : '' }}" type="number" name="berat_badan" id="berat_badan" value="{{ old('berat_badan', $pengukuran->berat_badan) }}" step="0.01" required>
                @if($errors->has('berat_badan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('berat_badan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pengukuran.fields.berat_badan_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tinggi_badan">{{ trans('cruds.pengukuran.fields.tinggi_badan') }}</label>
                <input class="form-control {{ $errors->has('tinggi_badan') ? 'is-invalid' : '' }}" type="number" name="tinggi_badan" id="tinggi_badan" value="{{ old('tinggi_badan', $pengukuran->tinggi_badan) }}" step="0.01" required>
                @if($errors->has('tinggi_badan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tinggi_badan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pengukuran.fields.tinggi_badan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="imt">{{ trans('cruds.pengukuran.fields.imt') }}</label>
                <input class="form-control {{ $errors->has('imt') ? 'is-invalid' : '' }}" type="number" name="imt" id="imt" value="{{ old('imt', $pengukuran->imt) }}" step="0.01">
                @if($errors->has('imt'))
                    <div class="invalid-feedback">
                        {{ $errors->first('imt') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pengukuran.fields.imt_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lingkar_perut">{{ trans('cruds.pengukuran.fields.lingkar_perut') }}</label>
                <input class="form-control {{ $errors->has('lingkar_perut') ? 'is-invalid' : '' }}" type="number" name="lingkar_perut" id="lingkar_perut" value="{{ old('lingkar_perut', $pengukuran->lingkar_perut) }}" step="0.01">
                @if($errors->has('lingkar_perut'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lingkar_perut') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pengukuran.fields.lingkar_perut_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tekanan_darah_diastole">{{ trans('cruds.pengukuran.fields.tekanan_darah_diastole') }}</label>
                <input class="form-control {{ $errors->has('tekanan_darah_diastole') ? 'is-invalid' : '' }}" type="number" name="tekanan_darah_diastole" id="tekanan_darah_diastole" value="{{ old('tekanan_darah_diastole', $pengukuran->tekanan_darah_diastole) }}" step="0.01">
                @if($errors->has('tekanan_darah_diastole'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tekanan_darah_diastole') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pengukuran.fields.tekanan_darah_diastole_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tekanan_darah_sistole">{{ trans('cruds.pengukuran.fields.tekanan_darah_sistole') }}</label>
                <input class="form-control {{ $errors->has('tekanan_darah_sistole') ? 'is-invalid' : '' }}" type="number" name="tekanan_darah_sistole" id="tekanan_darah_sistole" value="{{ old('tekanan_darah_sistole', $pengukuran->tekanan_darah_sistole) }}" step="0.01">
                @if($errors->has('tekanan_darah_sistole'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tekanan_darah_sistole') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pengukuran.fields.tekanan_darah_sistole_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="frekuensi_nafas">{{ trans('cruds.pengukuran.fields.frekuensi_nafas') }}</label>
                <input class="form-control {{ $errors->has('frekuensi_nafas') ? 'is-invalid' : '' }}" type="number" name="frekuensi_nafas" id="frekuensi_nafas" value="{{ old('frekuensi_nafas', $pengukuran->frekuensi_nafas) }}" step="1">
                @if($errors->has('frekuensi_nafas'))
                    <div class="invalid-feedback">
                        {{ $errors->first('frekuensi_nafas') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pengukuran.fields.frekuensi_nafas_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nadi">{{ trans('cruds.pengukuran.fields.nadi') }}</label>
                <input class="form-control {{ $errors->has('nadi') ? 'is-invalid' : '' }}" type="number" name="nadi" id="nadi" value="{{ old('nadi', $pengukuran->nadi) }}" step="1">
                @if($errors->has('nadi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nadi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pengukuran.fields.nadi_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kadar_gula_darah">{{ trans('cruds.pengukuran.fields.kadar_gula_darah') }}</label>
                <input class="form-control {{ $errors->has('kadar_gula_darah') ? 'is-invalid' : '' }}" type="number" name="kadar_gula_darah" id="kadar_gula_darah" value="{{ old('kadar_gula_darah', $pengukuran->kadar_gula_darah) }}" step="1">
                @if($errors->has('kadar_gula_darah'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kadar_gula_darah') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pengukuran.fields.kadar_gula_darah_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.pengukuran.fields.waktu_pengambilan_gula_darah') }}</label>
                <select class="form-control {{ $errors->has('waktu_pengambilan_gula_darah') ? 'is-invalid' : '' }}" name="waktu_pengambilan_gula_darah" id="waktu_pengambilan_gula_darah">
                    <option value disabled {{ old('waktu_pengambilan_gula_darah', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Pengukuran::WAKTU_PENGAMBILAN_GULA_DARAH_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('waktu_pengambilan_gula_darah', $pengukuran->waktu_pengambilan_gula_darah) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('waktu_pengambilan_gula_darah'))
                    <div class="invalid-feedback">
                        {{ $errors->first('waktu_pengambilan_gula_darah') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pengukuran.fields.waktu_pengambilan_gula_darah_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kolesterol_total">{{ trans('cruds.pengukuran.fields.kolesterol_total') }}</label>
                <input class="form-control {{ $errors->has('kolesterol_total') ? 'is-invalid' : '' }}" type="number" name="kolesterol_total" id="kolesterol_total" value="{{ old('kolesterol_total', $pengukuran->kolesterol_total) }}" step="1">
                @if($errors->has('kolesterol_total'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kolesterol_total') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pengukuran.fields.kolesterol_total_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kolesterol_ldl">{{ trans('cruds.pengukuran.fields.kolesterol_ldl') }}</label>
                <input class="form-control {{ $errors->has('kolesterol_ldl') ? 'is-invalid' : '' }}" type="number" name="kolesterol_ldl" id="kolesterol_ldl" value="{{ old('kolesterol_ldl', $pengukuran->kolesterol_ldl) }}" step="1">
                @if($errors->has('kolesterol_ldl'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kolesterol_ldl') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pengukuran.fields.kolesterol_ldl_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kolesterol_hdl">{{ trans('cruds.pengukuran.fields.kolesterol_hdl') }}</label>
                <input class="form-control {{ $errors->has('kolesterol_hdl') ? 'is-invalid' : '' }}" type="number" name="kolesterol_hdl" id="kolesterol_hdl" value="{{ old('kolesterol_hdl', $pengukuran->kolesterol_hdl) }}" step="1">
                @if($errors->has('kolesterol_hdl'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kolesterol_hdl') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pengukuran.fields.kolesterol_hdl_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="trigliserida">{{ trans('cruds.pengukuran.fields.trigliserida') }}</label>
                <input class="form-control {{ $errors->has('trigliserida') ? 'is-invalid' : '' }}" type="number" name="trigliserida" id="trigliserida" value="{{ old('trigliserida', $pengukuran->trigliserida) }}" step="1">
                @if($errors->has('trigliserida'))
                    <div class="invalid-feedback">
                        {{ $errors->first('trigliserida') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pengukuran.fields.trigliserida_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kadar_hb">{{ trans('cruds.pengukuran.fields.kadar_hb') }}</label>
                <input class="form-control {{ $errors->has('kadar_hb') ? 'is-invalid' : '' }}" type="number" name="kadar_hb" id="kadar_hb" value="{{ old('kadar_hb', $pengukuran->kadar_hb) }}" step="1">
                @if($errors->has('kadar_hb'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kadar_hb') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pengukuran.fields.kadar_hb_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kadar_asam_urat">{{ trans('cruds.pengukuran.fields.kadar_asam_urat') }}</label>
                <input class="form-control {{ $errors->has('kadar_asam_urat') ? 'is-invalid' : '' }}" type="number" name="kadar_asam_urat" id="kadar_asam_urat" value="{{ old('kadar_asam_urat', $pengukuran->kadar_asam_urat) }}" step="0.01">
                @if($errors->has('kadar_asam_urat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kadar_asam_urat') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pengukuran.fields.kadar_asam_urat_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.pengukuran.fields.golongan_darah') }}</label>
                <select class="form-control {{ $errors->has('golongan_darah') ? 'is-invalid' : '' }}" name="golongan_darah" id="golongan_darah">
                    <option value disabled {{ old('golongan_darah', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Pengukuran::GOLONGAN_DARAH_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('golongan_darah', $pengukuran->golongan_darah) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('golongan_darah'))
                    <div class="invalid-feedback">
                        {{ $errors->first('golongan_darah') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pengukuran.fields.golongan_darah_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hba_1_c">{{ trans('cruds.pengukuran.fields.hba_1_c') }}</label>
                <input class="form-control {{ $errors->has('hba_1_c') ? 'is-invalid' : '' }}" type="number" name="hba_1_c" id="hba_1_c" value="{{ old('hba_1_c', $pengukuran->hba_1_c) }}" step="0.01">
                @if($errors->has('hba_1_c'))
                    <div class="invalid-feedback">
                        {{ $errors->first('hba_1_c') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pengukuran.fields.hba_1_c_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kondisi_umum">{{ trans('cruds.pengukuran.fields.kondisi_umum') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('kondisi_umum') ? 'is-invalid' : '' }}" name="kondisi_umum" id="kondisi_umum">{!! old('kondisi_umum', $pengukuran->kondisi_umum) !!}</textarea>
                @if($errors->has('kondisi_umum'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kondisi_umum') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pengukuran.fields.kondisi_umum_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="keluhan_perasaan">{{ trans('cruds.pengukuran.fields.keluhan_perasaan') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('keluhan_perasaan') ? 'is-invalid' : '' }}" name="keluhan_perasaan" id="keluhan_perasaan">{!! old('keluhan_perasaan', $pengukuran->keluhan_perasaan) !!}</textarea>
                @if($errors->has('keluhan_perasaan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('keluhan_perasaan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pengukuran.fields.keluhan_perasaan_helper') }}</span>
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
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.pengukurans.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $pengukuran->id ?? 0 }}');
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