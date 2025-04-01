<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\VersionControl;
use Illuminate\Http\Request;

class ApiTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::where('delete',false)->where('owner',1)->get();

        return response()->json([
            'code'   => 200,
            'status' => 'success',
            'tasks'  => $tasks
        ]);
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

        $task = new Task();

        $task->title = $request->title;
        $task->description = $request->description;
        $task->owner = $request->owner;
        $task->status = $request->status;

        $task->save();

        return response()->json([
            'code'   => 200,
            'status' => 'success',
            'tasks'  => $task
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        $task->load('versions');

        return response()->json([
            'code'   => 200,
            'status' => 'success',
            'tasks'  => $task
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'  => 'required|string|max:50',
            'delete' => 'boolean',
            'owner'  => 'required|integer',
            'status' => 'required|integer'
        ]);

        $versionControl = new VersionControl();
        $task = Task::find($id);

        $versionControl->task = $id;
        $versionControl->content = $task;
        $versionControl->version = now();

        $versionControl->save();

        $task->title = $request->title;
        $task->description = $request->description;
        $task->owner = $request->owner;
        $task->status = $request->status;

        $task->update();

        return response()->json([
            'code'   => 200,
            'status' => 'success',
            'tasks'  => $task
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);

        $task->delete = true;
        $task->delete_date = now();
        $task->update();

        return response()->json([
            'code'   => 200,
            'status' => 'success',
            'tasks'  => $task
        ]);
    }
}
