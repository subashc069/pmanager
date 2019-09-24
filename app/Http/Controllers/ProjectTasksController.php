<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Project;
use App\Http\Requests\StoreProjectTaskRequest;

class ProjectTasksController extends Controller
{
    //

    public function store(StoreProjectTaskRequest $request, Project $project){

        // Task::create([
        //     'project_id' => $project->id,
        //     'description' => request('description')
        // ]);
        $attributes = $request->validated(); 
          
        $project->addTask($attributes);
        return back();
    }

    public function edit(Project $project)
    {
        # code...
        $this->authorize('update',$project);
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project)
    {
        # code...
        $this->authorize('update',$project);

        $validated = $request->validated();       
        $project->update(request(['title','description']));

        return redirect('/projects');
    }

    
}
