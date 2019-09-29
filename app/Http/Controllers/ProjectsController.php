<?php

namespace App\Http\Controllers;

use App\Project;
use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateProject;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if (Auth::check()) {
            $projects = Project::where('user_id', Auth::user()->id)->get();
            //$projects = auth()->user()->$projects;
            return view('projects.index', compact('projects'));  
        }
        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($company_id = null)
    {   
        $companies = null;
        if (!$company_id) {
            $companies = Company::where('user_id', Auth::user()->id)->get();
        }
        //return view('projects.create', ['company_id'=> $company_id]);
        return view('projects.create', compact('company_id','companies'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProject $request)
    {   
        $validated = $request->validated();
        $validated['company_id'] = $request->company_id;
        $validated['user_id'] = auth()->id();
       if (Auth::check()) {
           $project = Project::create($validated);
            if ($project) {
                return redirect()->route('projects.index')->with('success','project created successfully');
            }
       }
       return back()->withInput(); 

       //return back()->withInput()->with('errors','cannot create company for some reason'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //$company = Project::where('id', $company->id);
        return view('projects.show',compact('project')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Editprojects $request, Project $project)
    {
        $validated = $request->validated();
        //dd($validated);
        $project->update($validated);
        if($project){
            return redirect()->route('projects.show',compact('project'))->with('success','Project Edited successfully');
        }
        return back()->withInput(); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if($project->delete()){
            return redirect()->route('projects.index')->with('success','project deleted successfully');
        }

        return back()->withInput()->with('error','Project could not be deleted');
    }
}
