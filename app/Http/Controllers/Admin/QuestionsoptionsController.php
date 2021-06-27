<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyQuestionsoptionRequest;
use App\Http\Requests\StoreQuestionsoptionRequest;
use App\Http\Requests\UpdateQuestionsoptionRequest;
use App\Models\Question;
use App\Models\Questionsoption;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QuestionsoptionsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('questionsoption_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questionsoptions = Questionsoption::with(['question'])->get();

        return view('admin.questionsoptions.index', compact('questionsoptions'));
    }

    public function create()
    {
        abort_if(Gate::denies('questionsoption_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questions = Question::all()->pluck('question', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.questionsoptions.create', compact('questions'));
    }

    public function store(StoreQuestionsoptionRequest $request)
    {
        $questionsoption = Questionsoption::create($request->all());

        return redirect()->route('admin.questionsoptions.index');
    }

    public function edit(Questionsoption $questionsoption)
    {
        abort_if(Gate::denies('questionsoption_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questions = Question::all()->pluck('question', 'id')->prepend(trans('global.pleaseSelect'), '');

        $questionsoption->load('question');

        return view('admin.questionsoptions.edit', compact('questions', 'questionsoption'));
    }

    public function update(UpdateQuestionsoptionRequest $request, Questionsoption $questionsoption)
    {
        $questionsoption->update($request->all());

        return redirect()->route('admin.questionsoptions.index');
    }

    public function show(Questionsoption $questionsoption)
    {
        abort_if(Gate::denies('questionsoption_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questionsoption->load('question');

        return view('admin.questionsoptions.show', compact('questionsoption'));
    }

    public function destroy(Questionsoption $questionsoption)
    {
        abort_if(Gate::denies('questionsoption_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questionsoption->delete();

        return back();
    }

    public function massDestroy(MassDestroyQuestionsoptionRequest $request)
    {
        Questionsoption::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}