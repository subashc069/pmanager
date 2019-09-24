@extends('layout')

@section('content')
    <h1>Edit content</h1>

    <form action="/projects/{{ $project->id}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="field">
                <label class="label" for="title">Title</label>
                <div class="control">
                    <input type="text" class="input" name="title" placeholder="Title" value="{{$project->title}}" required>
                </div>
        </div>

        <div class="field">
                <label class="label" for="description">Description</label>
                <div class="control">
                    <textarea name="description"  cols="30" rows="10" required>{{$project->description}}</textarea>
                </div>
        </div>
        <div class="field">
                <div class="conrol">
                    <button type="submit">Update Project</button>
                </div>
        </div>
        <div>
                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>    
                @endif
                
            </div>
        
    </form>
    <form action="/projects/{{ $project->id }}" method="POST">
    @csrf
    @method('DELETE')
        <div>
            <button type="submit">Delete</button>
        </div>
    </form>
    
@endsection