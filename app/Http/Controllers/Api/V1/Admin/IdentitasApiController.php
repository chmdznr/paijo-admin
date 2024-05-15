<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIdentitumRequest;
use App\Http\Requests\UpdateIdentitumRequest;
use App\Http\Resources\Admin\IdentitumResource;
use App\Models\Identitum;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IdentitasApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('identitum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new IdentitumResource(Identitum::all());
    }

    public function store(StoreIdentitumRequest $request)
    {
        $identitum = Identitum::create($request->all());

        return (new IdentitumResource($identitum))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Identitum $identitum)
    {
        abort_if(Gate::denies('identitum_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new IdentitumResource($identitum);
    }

    public function update(UpdateIdentitumRequest $request, Identitum $identitum)
    {
        $identitum->update($request->all());

        return (new IdentitumResource($identitum))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Identitum $identitum)
    {
        abort_if(Gate::denies('identitum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $identitum->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
