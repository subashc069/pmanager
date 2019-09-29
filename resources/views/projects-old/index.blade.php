@extends('layout')

@section('content')
    <h1>Projects</h1>
    <ul>
        @foreach ($projects as $project)
            
            <li>
                <a href="/projects/{{$project->id}}">{{$project->title}}</a>
            </li>
        @endforeach
    </ul>
    <div>
        <a href="/projects/create">Create Project</a>
    </div>
@endsection
    
