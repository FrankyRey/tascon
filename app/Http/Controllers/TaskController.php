<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Status;
use App\Models\VersionControl;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::where('delete',false)->where('owner',1)->get();

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = Status::all();

        return view('tasks.create', ['status' => $status]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'  => 'required|string|max:50',
            'delete' => 'boolean',
            'owner'  => 'required|integer',
            'status' => 'required|integer'
        ]);

        try {
            Task::create($request->all());
            return redirect()->route('tasks.index')->with('success', 'Tarea creada exitosamente.');
        } catch (QueryException $e) {
            return redirect()->route('tasks.create')->with('error', 'Operation failed: ' . $e->errorInfo);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        $versions = VersionControl::where('task',$task->id)->orderBy('version', 'DESC')->get();

        return view('tasks.show', ['versions' => $versions], compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $status = Status::all();
        return view('tasks.edit', ['status' => $status], compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title'  => 'required|string|max:50',
            'delete' => 'boolean',
            'owner'  => 'required|integer',
            'status' => 'required|integer'
        ]);

        $versionControl = new VersionControl();

        $versionControl->task = $task->id;
        $versionControl->content = $task;
        $versionControl->version = now();

        $versionControl->save();

        $task->update($request->all());
        return redirect()->route('tasks.index')->with('success', 'Tarea actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete = true;
        $task->delete_date = now();
        $task->update();

        return redirect()->route('tasks.index')->with('success', 'Tarea eliminada exitosamente.');
    }
}
