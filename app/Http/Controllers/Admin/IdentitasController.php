<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyIdentitumRequest;
use App\Http\Requests\StoreIdentitumRequest;
use App\Http\Requests\UpdateIdentitumRequest;
use App\Models\Identitum;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IdentitasController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('identitum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $identita = Identitum::all();

        return view('admin.identita.index', compact('identita'));
    }

    public function create()
    {
        abort_if(Gate::denies('identitum_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.identita.create');
    }

    public function store(StoreIdentitumRequest $request)
    {
        $identitum = Identitum::create($request->all());

        return redirect()->route('admin.identita.index');
    }

    public function edit(Identitum $identitum)
    {
        abort_if(Gate::denies('identitum_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.identita.edit', compact('identitum'));
    }

    public function update(UpdateIdentitumRequest $request, Identitum $identitum)
    {
        $identitum->update($request->all());

        return redirect()->route('admin.identita.index');
    }

    public function show(Identitum $identitum)
    {
        abort_if(Gate::denies('identitum_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $identitum->load('identitasPengukurans', 'identitasCatatans');

        return view('admin.identita.show', compact('identitum'));
    }

    public function destroy(Identitum $identitum)
    {
        abort_if(Gate::denies('identitum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $identitum->delete();

        return back();
    }

    public function massDestroy(MassDestroyIdentitumRequest $request)
    {
        $identita = Identitum::find(request('ids'));

        foreach ($identita as $identitum) {
            $identitum->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
