@extends('layouts.app')

@section('content')

 <!-- Main jumbotron for a primary marketing message or call to action -->
 <div class="col-md-9 col-lg-9 col-sm-9 pull-left">
    <h1>Create new Project</h1>
    <div class="row col-md-12 col-lg-12 col-sm-12" style="background: white; margin:10px">
      
      <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="companyName">Name *</label>
          <input type="text" class="form-control"  name="name"  placeholder="Enter the name of the project" required>
          <small id="nameHelp" class="form-text text-muted">Enter the  new project</small>
        </div>

        @if ($companies == null)
            <input type="hidden" name="company_id" value= "{{ $company_id }}" >
        @endif
        @if ($companies != null)
        <div class="form-group">
          <label for="companySelect">Select Company</label>
            <select class="custom-select" name="company_id">
              @foreach ($companies as $company)
                  <option value="{{ $company->id}}"> {{$company->name}} </option>    
              @endforeach
            </select>    
        </div>
        @endif

        <div class="form-group">
          <label for="description">Description</label>
          <textarea type="text" class="form-control" name="description" required placeholder="Write about your project"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>      
 </div>
 <aside class="col-sm-2 col-md-3 col-lg-3 pull-right">
        <div class="p-4">
                <h4 class="font-italic">Options</h4>
                <ol class="list-unstyled">
                  <li><a href="/projects">My Projects</a></li>
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