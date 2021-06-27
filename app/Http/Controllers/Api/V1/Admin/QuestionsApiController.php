<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuestionsoptionRequest;
use App\Http\Requests\UpdateQuestionsoptionRequest;
use App\Http\Resources\Admin\QuestionsoptionResource;
use App\Models\Questionsoption;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QuestionsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('questionsoption_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new QuestionsoptionResource(Questionsoption::with(['question'])->get());
    }

    public function store(StoreQuestionsoptionRequest $request)
    {
        $questionsoption = Questionsoption::create($request->all());

        return (new QuestionsoptionResource($questionsoption))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Questionsoption $questionsoption)
    {
        abort_if(Gate::denies('questionsoption_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new QuestionsoptionResource($questionsoption->load(['question']));
    }

    public function update(UpdateQuestionsoptionRequest $request, Questionsoption $questionsoption)
    {
        $questionsoption->update($request->all());

        return (new QuestionsoptionResource($questionsoption))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Questionsoption $questionsoption)
    {
        abort_if(Gate::denies('questionsoption_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questionsoption->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}