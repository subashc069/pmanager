@extends('layouts.app')
@section('content')
    <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="col-md-9 col-lg-9 col-sm-9 pull-left">
        <div class="jumbotron">
                <div class="container">
                        <h1 class="display-3">{{ $company->name }}</h1>
                        <p class="">{{ $company->description }}</p>
                        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
                </div>
                </div>
                <div class="container">
                    <a class="btn btn-primary float-right" href="/projects/create/{{ $company->id }}">Add project</a>
                <!-- Example row of columns -->
                <div class="row">
                   @foreach ($company->projects as $project)
                    <div class="col-md-4">
                        <h2>{{ $project->name }}</h2>
                        <p>{{ $project->description}}</p>
                        <p><a class="btn btn-secondary" href="/projects/{{ $project->id }}" role="button">View details &raquo;</a></p>
                      </div>   
                   @endforeach 
                </div>
                <hr>
            </div>
  </div>
    
    
    <aside class="col-sm-2 col-md-3 col-lg-3 pull-right">
            <div class="p-4">
                    <h4 class="font-italic">Options</h4>
                    <ol class="list-unstyled">
                      <li><a href="/companies/{{ $company->id }}/edit">Edit</a></li>
                      <li><a href="/companies/create ">Create Companies</a></li>
                      <li><a href="/companies">View List of Companies</a></li>
                      <li><a href="/projects/create/{{ $company->id }}">Add Projects</a></li>
                      <hr>
                      <li>
                          <a href="#" onclick="
                            var result = confirm('Are you sure u want to delete this project');
                            if( result ) {
                              event.preventDefault();
                              document.getElementById('delete-form').submit();  
                            }">Delete</a>
                          <form id="delete-form" action="{{ route('companies.destroy', $company->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                          </form>
                        </li>
                      <li><a href="#">Add Member</a></li>
                    </ol>
                  </div>
      
            {{-- <div class="p-4">
              <h4 class="font-italic">Members</h4>
              <ol class="list-unstyled mb-0">
                <li><a href="#">March 2014</a></li>
              </ol>
            </div>
      
            <div class="p-4">
              <h4 class="font-italic">Elsewhere</h4>
              <ol class="list-unstyled">
                <li><a href="#">GitHub</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Facebook</a></li>
              </ol>
            </div> --}}
          </aside>
@endsection
