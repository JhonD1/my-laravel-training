<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\MassDestroyTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Role;
use App\User;
use App\Task;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            $tasks = Task::with('users')->get();

            return view('admin.tasks.index', compact( 'tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_list = User::all();

        $tasks = Task::all()->pluck('title', 'id');

        return view('admin.tasks.create', compact('tasks', 'user_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request)
    {
        $task = Task::create([
            'title'       => $request->title,
            'description' => $request->description,
            'created_by'  => $request->created_by,
            'photo'       => $request->photo]
        );

        if ($request->input('photo', false)) {
            $task->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return redirect()->route('admin.tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        $task->load('users');

        return view('admin.tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //abort_if(Gate::denies('task_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tasks = Task::with('users')->pluck('title', 'id', 'description', 'photo');
        $task->load('users');
        $user_list = User::all();

        return view('admin.tasks.edit', compact('tasks', 'task', 'user_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {

        $task->update($request->all());

        return redirect()->route('admin.tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        Task::where($task)->delete();
        $task->delete();

        return back();
    }

    public function massDestroy(MassDestroyTaskRequest $request)
    {
        Task::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function del(Request $request)
    {
        $delid = $request->input('checked');
        Task::whereIn('id', $delid)->delete();

        // return response(null, Response::HTTP_NO_CONTENT);
        return redirect()->route('admin.tasks.index');
    }
}
