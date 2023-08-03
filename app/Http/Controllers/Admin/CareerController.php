<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCareerRequest;
use App\Http\Requests\StoreCareerRequest;
use App\Http\Requests\UpdateCareerRequest;
use App\Models\Career;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CareerController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('career_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $careers = Career::with(['media'])->get();

        return view('admin.careers.index', compact('careers'));
    }

    public function create()
    {
        abort_if(Gate::denies('career_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.careers.create');
    }

    public function store(StoreCareerRequest $request)
    {
        $career = Career::create($request->all());

        if ($request->input('career_document_preview', false)) {
            $career->addMedia(storage_path('tmp/uploads/' . basename($request->input('career_document_preview'))))->toMediaCollection('career_document_preview');
        }

        if ($request->input('career_document', false)) {
            $career->addMedia(storage_path('tmp/uploads/' . basename($request->input('career_document'))))->toMediaCollection('career_document');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $career->id]);
        }

        return redirect()->route('admin.careers.index');
    }

    public function edit(Career $career)
    {
        abort_if(Gate::denies('career_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.careers.edit', compact('career'));
    }

    public function update(UpdateCareerRequest $request, Career $career)
    {
        $career->update($request->all());

        if ($request->input('career_document_preview', false)) {
            if (! $career->career_document_preview || $request->input('career_document_preview') !== $career->career_document_preview->file_name) {
                if ($career->career_document_preview) {
                    $career->career_document_preview->delete();
                }
                $career->addMedia(storage_path('tmp/uploads/' . basename($request->input('career_document_preview'))))->toMediaCollection('career_document_preview');
            }
        } elseif ($career->career_document_preview) {
            $career->career_document_preview->delete();
        }

        if ($request->input('career_document', false)) {
            if (! $career->career_document || $request->input('career_document') !== $career->career_document->file_name) {
                if ($career->career_document) {
                    $career->career_document->delete();
                }
                $career->addMedia(storage_path('tmp/uploads/' . basename($request->input('career_document'))))->toMediaCollection('career_document');
            }
        } elseif ($career->career_document) {
            $career->career_document->delete();
        }

        return redirect()->route('admin.careers.index');
    }

    public function show(Career $career)
    {
        abort_if(Gate::denies('career_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.careers.show', compact('career'));
    }

    public function destroy(Career $career)
    {
        abort_if(Gate::denies('career_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $career->delete();

        return back();
    }

    public function massDestroy(MassDestroyCareerRequest $request)
    {
        $careers = Career::find(request('ids'));

        foreach ($careers as $career) {
            $career->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('career_create') && Gate::denies('career_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Career();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
