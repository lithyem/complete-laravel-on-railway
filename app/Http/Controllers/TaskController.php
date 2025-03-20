<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    //

	public function index()
    {
        //
		//dd("ok");
		$tasks = \App\Models\Task::all();
		return view('tasks.index', compact('tasks'));
    }

	public function add(Request $request)
	{
		//
		//dd($request->all());

		$request->validate([
            'title' => 'required|string|min:3|max:255'
        ]);

		$task = new \App\Models\Task;
		//dd($task);
		$task->title = $request->input('title');
		//$task->status = $request->input('status');
		$task->save();
		return redirect()->route('tasks.index')->with('success', 'Task added successfully!');
	}

	public function delete($id)
	{
		//
		//dd($id);
		$task = \App\Models\Task::find($id);
		if ($task) {
			$task->delete();
			return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
		} else {
			return redirect()->route('tasks.index')->with('error', 'Task not found!');
		}
	}
}
