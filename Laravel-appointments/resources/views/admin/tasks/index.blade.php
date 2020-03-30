@extends('layouts.admin')
@section('content')
@can('employee_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            {{-- Add task button --}}
            <a class="btn btn-success" href="{{ route("admin.tasks.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.task.title_singular') }}
            </a>

            {{-- delete button --}}
            <a style="margin-right:20px;" class="btn btn-danger" href="{{ route("admin.tasks.del") }}">Delete
            </a>

        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.task.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Employee">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.task.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.task.fields.title') }}
                    </th>
                    <th>
                        {{ trans('cruds.task.fields.description') }}
                    </th>
                    <th>
                        {{ trans('cruds.task.fields.photo') }}
                    </th>
                    <th>
                        {{ trans('cruds.task.fields.created_by') }}
                    </th>
                    <th>
                        {{ trans('cruds.task.fields.created_at') }}
                    </th>
                    <th>
                        {{ trans('cruds.task.fields.updated_at') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
            <tbody>
              @foreach($tasks as $task)
                <tr>
                  <td>
                    <form method="post" action="{{ route('admin.tasks.destroy', $task->id) }}">
                      {!! csrf_field() !!}
                      <div class="checkbox">
                        <input type="checkbox" name="checked[]" value="{{$task->id}}"><label>{{$task->name}}</label>
                      </div>

                      </td>
                      <td>
                        {{$task->id}}
                      </td>
                      <td>
                        {{$task->title}}
                      </td>
                      <td>
                        {{$task->description}}
                      </td>
                      <td>
                        {{$task->photo}}
                      </td>
                      <td>
                        {{$task->users()->pluck('name')->first()}}
                      </td>
                      <td>
                        {{$task->created_at}}
                      </td>
                      <td>
                        {{$task->updated_at}}
                      </td>
                      <td>

                        {{-- View button --}}
                        <a class="btn btn-xs btn-primary" href="{{ route('admin.tasks.show', $task->id) }}">
                            {{ trans('global.view') }}
                        </a>

                        {{-- Edit Button --}}
                        <a class="btn btn-xs btn-info" href="{{ route('admin.tasks.edit', $task->id) }}">
                            {{ trans('global.edit') }}
                        </a>

                        {{-- Delete Button --}}
                        <form action="{{ route('admin.tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                        </form>
                      </td>

                  </td>
                </tr>
              @endforeach
                <button class="btn btn-danger" type="submit">Del</button>

              {{-- </form> --}}
            </tbody>
        </table>


    </div>
</div>
@endsection

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('role_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.roles.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Role:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
