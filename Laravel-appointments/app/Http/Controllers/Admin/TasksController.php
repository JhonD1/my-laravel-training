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
use Excel;
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
        request()->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $task = new Task();
        $imageName = request()->photo->getClientOriginalName();

        // $image = request()->file('photo');
        // $imageName = $image->getClientOriginalExtension();


        $task->title = $request->get('title');
        $task->description = $request->get('description');
        $task->created_by = $request->get('created_by');
        $task->description = $request->get('description');
        $task->photo = $imageName;
        $task->save();


        request()->photo->move(storage_path('images'), $imageName);

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

    public function excel()
    {
        $tasks = Task::with('users')->get()->toArray();

        $tasks_array[] = array('Id', 'Title', 'Description', 'Photo',
         'Created By', 'Created at', 'Updated At');

        foreach($tasks as $task){

            $tasks_array[] = array(
                'Id'            => $task->id,
                'Title'         => $task->title,
                'Description'   => $task->description,
                'Photo'         => $task->photo,
                'Created By'    => $task->users()->pluck('name')->first(),
                'Created at'    => $task->created_at,
                'Updated At'    => $task->updated_at,
            );
        }
        Excel::create('Task Data', function($excel) use($tasks_array){
            $excel->setTitle('Task Data');
            $excel->sheet('Customer Data', function($sheet){
                $sheet0->fromArray($customer_array, null, 'A1', false, false);
            });
        })->download('xlsx');

    }
}
