<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class Projects extends Controller
{
    public function index()
    {
        $projects = Project::where('status', false)
                            ->orderBy('created_at', 'desc')
                            ->withCount(['tasks' => function ($query) {
                              $query->where('status', false);
                            }])
                            ->get();

        return $projects->toJson();
    }

    public function display($id)
    {
        $project = Project::with(['tasks' => function ($query) {
          $query->where('status', false);
        }])->find($id);

        return $project->toJson();
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $project = Project::create($request->all());

        return response()->json('Project created!');
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $project = Project::create($request->all());

        return response()->json('Project created!');
    }

    public function setStatus(Project $project)
	{
        print_r($project);
		$project->status = 1;
		$project->update();

		return response()->json('Project updated!');
	}

	public function delete($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return response()->json(null, 204);
    }
}
