<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StorePengukuranRequest;
use App\Http\Requests\UpdatePengukuranRequest;
use App\Http\Resources\Admin\PengukuranResource;
use App\Models\Pengukuran;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PengukuranApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('pengukuran_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PengukuranResource(Pengukuran::with(['identitas'])->get());
    }

    public function store(StorePengukuranRequest $request)
    {
        $pengukuran = Pengukuran::create($request->all());

        return (new PengukuranResource($pengukuran))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Pengukuran $pengukuran)
    {
        abort_if(Gate::denies('pengukuran_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PengukuranResource($pengukuran->load(['identitas']));
    }

    public function update(UpdatePengukuranRequest $request, Pengukuran $pengukuran)
    {
        $pengukuran->update($request->all());

        return (new PengukuranResource($pengukuran))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Pengukuran $pengukuran)
    {
        abort_if(Gate::denies('pengukuran_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pengukuran->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
