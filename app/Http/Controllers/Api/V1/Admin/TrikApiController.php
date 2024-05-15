<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreTrikRequest;
use App\Http\Requests\UpdateTrikRequest;
use App\Http\Resources\Admin\TrikResource;
use App\Models\Trik;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrikApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('trik_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TrikResource(Trik::all());
    }

    public function store(StoreTrikRequest $request)
    {
        $trik = Trik::create($request->all());

        return (new TrikResource($trik))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Trik $trik)
    {
        abort_if(Gate::denies('trik_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TrikResource($trik);
    }

    public function update(UpdateTrikRequest $request, Trik $trik)
    {
        $trik->update($request->all());

        return (new TrikResource($trik))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Trik $trik)
    {
        abort_if(Gate::denies('trik_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trik->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
