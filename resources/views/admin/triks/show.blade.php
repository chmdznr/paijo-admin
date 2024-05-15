@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.trik.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.triks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.trik.fields.id') }}
                        </th>
                        <td>
                            {{ $trik->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trik.fields.judul') }}
                        </th>
                        <td>
                            {{ $trik->judul }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trik.fields.isi') }}
                        </th>
                        <td>
                            {!! $trik->isi !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.triks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection