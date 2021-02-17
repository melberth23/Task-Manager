<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class Tasks extends Controller
{
    public function save(Request $request)
    {
        $validatedData = $request->validate(['title' => 'required']);

        $task = Task::create([
          'title' => $validatedData['title'],
          'project_id' => $request->project_id,
        ]);

        return $task->toJson();
    }

    public function setStatus(Task $task)
	{
        print_r($task);
		$task->status = 1;
		$task->update();

		return response()->json('Task updated!');
	}

	public function delete($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return response()->json(null, 204);
    }
}
