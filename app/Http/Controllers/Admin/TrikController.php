<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTrikRequest;
use App\Http\Requests\StoreTrikRequest;
use App\Http\Requests\UpdateTrikRequest;
use App\Models\Trik;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class TrikController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('trik_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $triks = Trik::all();

        return view('admin.triks.index', compact('triks'));
    }

    public function create()
    {
        abort_if(Gate::denies('trik_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.triks.create');
    }

    public function store(StoreTrikRequest $request)
    {
        $trik = Trik::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $trik->id]);
        }

        return redirect()->route('admin.triks.index');
    }

    public function edit(Trik $trik)
    {
        abort_if(Gate::denies('trik_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.triks.edit', compact('trik'));
    }

    public function update(UpdateTrikRequest $request, Trik $trik)
    {
        $trik->update($request->all());

        return redirect()->route('admin.triks.index');
    }

    public function show(Trik $trik)
    {
        abort_if(Gate::denies('trik_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.triks.show', compact('trik'));
    }

    public function destroy(Trik $trik)
    {
        abort_if(Gate::denies('trik_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trik->delete();

        return back();
    }

    public function massDestroy(MassDestroyTrikRequest $request)
    {
        $triks = Trik::find(request('ids'));

        foreach ($triks as $trik) {
            $trik->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('trik_create') && Gate::denies('trik_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Trik();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
