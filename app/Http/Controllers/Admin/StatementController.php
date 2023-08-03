<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyStatementRequest;
use App\Http\Requests\StoreStatementRequest;
use App\Http\Requests\UpdateStatementRequest;
use App\Models\Statement;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class StatementController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('statement_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $statements = Statement::with(['media'])->get();

        return view('admin.statements.index', compact('statements'));
    }

    public function create()
    {
        abort_if(Gate::denies('statement_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.statements.create');
    }

    public function store(StoreStatementRequest $request)
    {
        $statement = Statement::create($request->all());

        if ($request->input('statement_document_preview', false)) {
            $statement->addMedia(storage_path('tmp/uploads/' . basename($request->input('statement_document_preview'))))->toMediaCollection('statement_document_preview');
        }

        if ($request->input('statement_document', false)) {
            $statement->addMedia(storage_path('tmp/uploads/' . basename($request->input('statement_document'))))->toMediaCollection('statement_document');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $statement->id]);
        }

        return redirect()->route('admin.statements.index');
    }

    public function edit(Statement $statement)
    {
        abort_if(Gate::denies('statement_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.statements.edit', compact('statement'));
    }

    public function update(UpdateStatementRequest $request, Statement $statement)
    {
        $statement->update($request->all());

        if ($request->input('statement_document_preview', false)) {
            if (! $statement->statement_document_preview || $request->input('statement_document_preview') !== $statement->statement_document_preview->file_name) {
                if ($statement->statement_document_preview) {
                    $statement->statement_document_preview->delete();
                }
                $statement->addMedia(storage_path('tmp/uploads/' . basename($request->input('statement_document_preview'))))->toMediaCollection('statement_document_preview');
            }
        } elseif ($statement->statement_document_preview) {
            $statement->statement_document_preview->delete();
        }

        if ($request->input('statement_document', false)) {
            if (! $statement->statement_document || $request->input('statement_document') !== $statement->statement_document->file_name) {
                if ($statement->statement_document) {
                    $statement->statement_document->delete();
                }
                $statement->addMedia(storage_path('tmp/uploads/' . basename($request->input('statement_document'))))->toMediaCollection('statement_document');
            }
        } elseif ($statement->statement_document) {
            $statement->statement_document->delete();
        }

        return redirect()->route('admin.statements.index');
    }

    public function show(Statement $statement)
    {
        abort_if(Gate::denies('statement_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.statements.show', compact('statement'));
    }

    public function destroy(Statement $statement)
    {
        abort_if(Gate::denies('statement_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $statement->delete();

        return back();
    }

    public function massDestroy(MassDestroyStatementRequest $request)
    {
        $statements = Statement::find(request('ids'));

        foreach ($statements as $statement) {
            $statement->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('statement_create') && Gate::denies('statement_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Statement();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
