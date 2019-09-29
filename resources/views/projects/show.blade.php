@extends('layouts.app')
@section('content')
    <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="col-md-9 col-lg-9 col-sm-9 pull-left">
        <div class="jumbotron bg-success">
                <div class="container">
                        <h1 class="display-3">{{ $project->name }}</h1>
                        <p class="">{{ $project->description }}</p>
                        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
                </div>
                </div>
                <div class="container">
                    <a class="btn btn-primary float-right" href="/projects/create">Add Project</a>
                    <!-- Example row of columns -->
                    <div class="row">
                      {{-- @foreach ($company->projects as $project)
                        <div class="col-md-4">
                            <h2>{{ $project->name }}</h2>
                            <p>{{ $project->description}}</p>
                            <p><a class="btn btn-secondary" href="/projects/{{ $project->id }}" role="button">View details &raquo;</a></p>
                          </div>   
                      @endforeach  --}}
                    </div>
                    <hr>
                    <form action="{{ route('comments.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="commentable_type" value="Project">
                        <input type="hidden" name="commentable_id" value="{{ $project->id }}">

                        <div class="form-group">
                            <label for="company-comment">Comment</label>
                            <textarea type="text" class="form-control" name="body" required placeholder="Enter Comment"></textarea>
                            <small id="commentHelp" class="form-text text-muted">Enter url or screenshot</small>
                        </div>

                        <div class="form-group">
                          <label for="company-comment">Proof of work done (url/Photos)</label>
                          <textarea type="text" class="form-control" name="url" required placeholder="Enter url or screenshot"></textarea>
                          <small id="commentHelp" class="form-text text-muted">Enter url or screenshot</small>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                  </div>
  </div>
    
    
    <aside class="col-sm-2 col-md-3 col-lg-3 pull-right">
            <div class="p-4">
                    <h4 class="font-italic">Options</h4>
                    <ol class="list-unstyled">
                      <li><a href="/projects/{{ $project->id }}/edit">Edit</a></li>
                      <li><a href="/projects/create">Create Projects</a></li>
                      <li><a href="/projects">View List of Projects</a></li>
                      <hr>
                      
                      @if ($project->user_id == Auth::user()->id)
                      <li>
                          <a href="#" onclick="
                            var result = confirm('Are you sure u want to delete this project');
                            if( result ) {
                              event.preventDefault();
                              document.getElementById('delete-form').submit();  
                            }">Delete</a>
                          <form id="delete-form" action="{{ route('projects.destroy', $project->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                          </form>
                      </li>    
                      @endif
                      
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
