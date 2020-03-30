@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.task.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.tasks.update", [$task->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">{{ trans('cruds.task.fields.title') }}</label>
                <input type="title" id="title" name="title" class="form-control" value="{{ old('title', isset($task) ? $task->title : '') }}">
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.task.fields.title_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">{{ trans('cruds.task.fields.description') }}</label>
                <input type="text" id="description" name="description" class="form-control" value="{{ old('description', isset($task) ? $task->description : '') }}">
                @if($errors->has('description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.task.fields.description_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
                <label for="photo">{{ trans('cruds.task.fields.photo') }}</label>
                <div class="needsclick dropzone" id="photo-dropzone">

                </div>
                @if($errors->has('photo'))
                    <em class="invalid-feedback">
                        {{ $errors->first('photo') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.task.fields.photo_helper') }}
                </p>
            </div>

             <div class="form-group {{ $errors->has('users') ? 'has-error' : '' }}">
              <select class="form-control" id='user_id' name = "created_by" required>
                @foreach ($user_list as $user)
                  <option value="{{ $user->id }}" {{ (in_array($name ?? '', old('name', [])) || isset($user->name)) ? 'selected' : '' }}>{{$user->name}}</option>
                @endforeach
                @if($errors->has('user_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('user_id') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.task.fields.created_by_helper') }}
                </p>
              </select>
            </div>

            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection
