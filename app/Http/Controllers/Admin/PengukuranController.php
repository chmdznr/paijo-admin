<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPengukuranRequest;
use App\Http\Requests\StorePengukuranRequest;
use App\Http\Requests\UpdatePengukuranRequest;
use App\Models\Identitum;
use App\Models\Pengukuran;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PengukuranController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('pengukuran_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pengukurans = Pengukuran::with(['identitas'])->get();

        $identita = Identitum::get();

        return view('admin.pengukurans.index', compact('identita', 'pengukurans'));
    }

    public function create()
    {
        abort_if(Gate::denies('pengukuran_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $identitas = Identitum::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.pengukurans.create', compact('identitas'));
    }

    public function store(StorePengukuranRequest $request)
    {
        $pengukuran = Pengukuran::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $pengukuran->id]);
        }

        return redirect()->route('admin.pengukurans.index');
    }

    public function edit(Pengukuran $pengukuran)
    {
        abort_if(Gate::denies('pengukuran_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $identitas = Identitum::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pengukuran->load('identitas');

        return view('admin.pengukurans.edit', compact('identitas', 'pengukuran'));
    }

    public function update(UpdatePengukuranRequest $request, Pengukuran $pengukuran)
    {
        $pengukuran->update($request->all());

        return redirect()->route('admin.pengukurans.index');
    }

    public function show(Pengukuran $pengukuran)
    {
        abort_if(Gate::denies('pengukuran_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pengukuran->load('identitas');

        return view('admin.pengukurans.show', compact('pengukuran'));
    }

    public function destroy(Pengukuran $pengukuran)
    {
        abort_if(Gate::denies('pengukuran_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pengukuran->delete();

        return back();
    }

    public function massDestroy(MassDestroyPengukuranRequest $request)
    {
        $pengukurans = Pengukuran::find(request('ids'));

        foreach ($pengukurans as $pengukuran) {
            $pengukuran->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('pengukuran_create') && Gate::denies('pengukuran_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Pengukuran();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
