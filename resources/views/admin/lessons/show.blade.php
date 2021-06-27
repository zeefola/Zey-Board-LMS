@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.lesson.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.lessons.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.lesson.fields.id') }}
                            </th>
                            <td>
                                {{ $lesson->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.lesson.fields.course') }}
                            </th>
                            <td>
                                {{ $lesson->course->title ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.lesson.fields.title') }}
                            </th>
                            <td>
                                {{ $lesson->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.lesson.fields.slug') }}
                            </th>
                            <td>
                                {{ $lesson->slug }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.lesson.fields.lesson_image') }}
                            </th>
                            <td>
                                @if ($lesson->lesson_image)
                                    <a href="{{ $lesson->lesson_image->getUrl() }}" target="_blank"
                                        style="display: inline-block">
                                        <img src="{{ $lesson->lesson_image->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.lesson.fields.short_text') }}
                            </th>
                            <td>
                                {{ $lesson->short_text }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.lesson.fields.full_text') }}
                            </th>
                            <td>
                                {{ $lesson->full_text }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.lesson.fields.position') }}
                            </th>
                            <td>
                                {{ $lesson->position }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.lesson.fields.downloadable_files') }}
                            </th>
                            <td>
                                @foreach ($lesson->downloadable_files as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.lesson.fields.free_lesson') }}
                            </th>
                            <td>
                                <input type="checkbox" disabled="disabled" {{ $lesson->free_lesson ? 'checked' : '' }}>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.lesson.fields.published') }}
                            </th>
                            <td>
                                <input type="checkbox" disabled="disabled" {{ $lesson->published ? 'checked' : '' }}>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.lessons.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>



@endsection
