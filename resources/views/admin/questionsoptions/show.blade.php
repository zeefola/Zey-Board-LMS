@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.questionsoption.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.questionsoptions.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.questionsoption.fields.id') }}
                            </th>
                            <td>
                                {{ $questionsoption->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.questionsoption.fields.question') }}
                            </th>
                            <td>
                                {{ $questionsoption->question->question ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.questionsoption.fields.option_text') }}
                            </th>
                            <td>
                                {{ $questionsoption->option_text }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.questionsoption.fields.correct') }}
                            </th>
                            <td>
                                <input type="checkbox" disabled="disabled"
                                    {{ $questionsoption->correct ? 'checked' : '' }}>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.questionsoptions.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>



@endsection
