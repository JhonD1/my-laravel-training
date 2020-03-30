@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.task.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.task.fields.id') }}
                        </th>
                        <td>
                            {{ $task->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.task.fields.title') }}
                        </th>
                        <td>
                            {{ $task->title}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.task.fields.description') }}
                        </th>
                        <td>
                            {{ $task->description }}
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.task.fields.photo') }}
                        </th>
                        <td>
                            {{ $task->photo }}
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.task.fields.created_by') }}
                        </th>
                        <td>
                            {{ $task->users()->pluck('name')->first() }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.task.fields.created_at') }}
                        </th>
                        <td>
                            {{ $task->created_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.task.fields.updated_at') }}
                        </th>
                        <td>
                            {{ $task->updated_at }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>

    </div>
</div>
@endsection
