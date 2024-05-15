<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreCatatanRequest;
use App\Http\Requests\UpdateCatatanRequest;
use App\Http\Resources\Admin\CatatanResource;
use App\Models\Catatan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CatatanApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('catatan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CatatanResource(Catatan::with(['identitas'])->get());
    }

    public function store(StoreCatatanRequest $request)
    {
        $catatan = Catatan::create($request->all());

        return (new CatatanResource($catatan))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Catatan $catatan)
    {
        abort_if(Gate::denies('catatan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CatatanResource($catatan->load(['identitas']));
    }

    public function update(UpdateCatatanRequest $request, Catatan $catatan)
    {
        $catatan->update($request->all());

        return (new CatatanResource($catatan))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Catatan $catatan)
    {
        abort_if(Gate::denies('catatan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $catatan->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
