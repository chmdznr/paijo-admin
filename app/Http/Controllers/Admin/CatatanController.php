<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCatatanRequest;
use App\Http\Requests\StoreCatatanRequest;
use App\Http\Requests\UpdateCatatanRequest;
use App\Models\Catatan;
use App\Models\Identitum;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CatatanController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('catatan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $catatans = Catatan::with(['identitas'])->get();

        $identita = Identitum::get();

        return view('admin.catatans.index', compact('catatans', 'identita'));
    }

    public function create()
    {
        abort_if(Gate::denies('catatan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $identitas = Identitum::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.catatans.create', compact('identitas'));
    }

    public function store(StoreCatatanRequest $request)
    {
        $catatan = Catatan::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $catatan->id]);
        }

        return redirect()->route('admin.catatans.index');
    }

    public function edit(Catatan $catatan)
    {
        abort_if(Gate::denies('catatan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $identitas = Identitum::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $catatan->load('identitas');

        return view('admin.catatans.edit', compact('catatan', 'identitas'));
    }

    public function update(UpdateCatatanRequest $request, Catatan $catatan)
    {
        $catatan->update($request->all());

        return redirect()->route('admin.catatans.index');
    }

    public function show(Catatan $catatan)
    {
        abort_if(Gate::denies('catatan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $catatan->load('identitas');

        return view('admin.catatans.show', compact('catatan'));
    }

    public function destroy(Catatan $catatan)
    {
        abort_if(Gate::denies('catatan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $catatan->delete();

        return back();
    }

    public function massDestroy(MassDestroyCatatanRequest $request)
    {
        $catatans = Catatan::find(request('ids'));

        foreach ($catatans as $catatan) {
            $catatan->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('catatan_create') && Gate::denies('catatan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Catatan();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
