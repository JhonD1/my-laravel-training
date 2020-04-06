@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.task.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.tasks.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">{{ trans('cruds.task.fields.title') }}</label>
                <input type="title" id="title" name="title" class="form-control" value="{{ old('title', isset($task) ? $task->users()->title : '') }}">
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
                <textarea id="description" name="description" class="form-control ">{{ old('description', isset($appointment) ? $appointment->description : '') }}</textarea>
                @if($errors->has('description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.task.fields.description_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('users') ? 'has-error' : '' }}">
                <label for="created_by">{{ trans('cruds.task.fields.created_by') }}
                <select class="form-control select2" id='user_id' name = "created_by" required>

                    @foreach ($user_list as $user)
                      <option value="{{ $user->id }}" {{ (in_array($id ?? '', old('user_id', [])) || isset($user_list)) ? 'selected' : '' }}>{{$user->name}}</option>
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

            <div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
                <label for="photo">{{ trans('cruds.task.fields.photo') }}</label><br />
                <input type="file" name="photo">
                <input type="hidden" name="_token" value="{{ csrf_token()}}">
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

           <div>
            {{-- Save button --}}
              <input style="margin:20px 20px;" class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            {{-- Return button --}}
              <a style="margin-bottom:20px 20px;" class="btn btn-default" href="{{ route('admin.tasks.index')}}">
                  {{ trans('global.back_to_list') }}
              </a>
           </div>
        </form>
    </div>
</div>
@endsection
