@extends('layouts.app')

@section('content')
    
        <div class="col-md-6 col-lg-6">
            <div class="card ">
                <div class="card-header text-white bg-primary">Projects<a class="float-right btn btn-primary" href="/projects/create"> Add a new Project </a></div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($projects as $project)
                        <li class="list-group-item"><a href="/projects/{{ $project->id }}">{{ $project->name }}</a></li>
                        @endforeach
                        </ul>
                </div>
            </div>    
        </div>
@endsection

 