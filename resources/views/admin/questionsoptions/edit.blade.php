@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.questionsoption.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.questionsoptions.update', [$questionsoption->id]) }}"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="question_id">{{ trans('cruds.questionsoption.fields.question') }}</label>
                    <select class="form-control select2 {{ $errors->has('question') ? 'is-invalid' : '' }}"
                        name="question_id" id="question_id">
                        @foreach ($questions as $id => $entry)
                            <option value="{{ $id }}"
                                {{ (old('question_id') ? old('question_id') : $questionsoption->question->id ?? '') == $id ? 'selected' : '' }}>
                                {{ $entry }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('question'))
                        <div class="invalid-feedback">
                            {{ $errors->first('question') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.questionsoption.fields.question_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required"
                        for="option_text">{{ trans('cruds.questionsoption.fields.option_text') }}</label>
                    <input class="form-control {{ $errors->has('option_text') ? 'is-invalid' : '' }}" type="text"
                        name="option_text" id="option_text"
                        value="{{ old('option_text', $questionsoption->option_text) }}" required>
                    @if ($errors->has('option_text'))
                        <div class="invalid-feedback">
                            {{ $errors->first('option_text') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.questionsoption.fields.option_text_helper') }}</span>
                </div>
                <div class="form-group">
                    <div class="form-check {{ $errors->has('correct') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="checkbox" name="correct" id="correct" value="1"
                            {{ $questionsoption->correct || old('correct', 0) === 1 ? 'checked' : '' }} required>
                        <label class="required form-check-label"
                            for="correct">{{ trans('cruds.questionsoption.fields.correct') }}</label>
                    </div>
                    @if ($errors->has('correct'))
                        <div class="invalid-feedback">
                            {{ $errors->first('correct') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.questionsoption.fields.correct_helper') }}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>



@endsection
